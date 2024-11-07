<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\TMail;
use App\Models\MailList;
use Illuminate\Support\Facades\Auth;

class App extends Component {

    use WithPagination;

    public $messages = [];
    public $deleted = [];
    public $error = '';
    public $email;
    public $initial;
    public $overflow = false;
    public $appPage = true;

    protected $listeners = ['fetchMessages' => 'fetch', 'syncEmail'];

    public function mount() {
        $this->email = TMail::getEmail();
        $this->initial = false;
    }

    public function syncEmail($email) {
        $this->email = $email;
    }

    public function fetch() {
        try {
            $count = count($this->messages);
            $responses = [];
            if (config('app.settings.engine') == 'delivery' || !config('app.settings.imap.cc_check', false)) {
                $responses = [
                    'to' => TMail::getMessages($this->email, 'to', $this->deleted),
                    'cc' => [
                        'data' => [],
                        'notifications' => []
                    ]
                ];
            } else {
                $responses = [
                    'to' => TMail::getMessages($this->email, 'to', $this->deleted),
                    'cc' => TMail::getMessages($this->email, 'cc', $this->deleted)
                ];
            }
            $this->deleted = [];
            $this->messages = array_merge($responses['to']['data'], $responses['cc']['data']);

            $logList = MailList::where('email', $this->email)->pluck('mail_id')->toArray();

            foreach ($this->messages as &$mgs) {
                $mgs['isRead'] = in_array($mgs['id'],$logList);
            }

            //$this->messages = rsort($this->messages);




            $notifications = array_merge($responses['to']['notifications'], $responses['cc']['notifications']);
            if (count($notifications)) {
                if ($this->overflow == false && count($this->messages) == $count) {
                    $this->overflow = true;
                }
            } else {
                $this->overflow = false;
            }
            foreach ($notifications as $notification) {
                $this->dispatchBrowserEvent('showNewMailNotification', $notification);
            }
            if (config('app.settings.engine') != 'delivery') {
                TMail::incrementMessagesStats(count($notifications));
            }
        } catch (\Exception $e) {
            if (Auth::check() && Auth::user()->role == 7) {
                $this->error = $e->getMessage();
            } else {
                $this->error = 'Not able to connect to Mail Server';
            }
        }
        $this->dispatchBrowserEvent('stopLoader');
        $this->dispatchBrowserEvent('loadDownload');
        $this->initial = true;
    }
    

    public function delete($messageId) {
        if (config('app.settings.engine') == 'delivery') {
            Message::find($messageId)->delete();
        }
        array_push($this->deleted, $messageId);
        foreach ($this->messages as $key => $message) {
            if ($message['id'] == $messageId) {
                $directory = './tmp/attachments/' . $messageId;
                $this->rrmdir($directory);
                unset($this->messages[$key]);
            }
        }
    }

    public function render() {
        $paginatedMessages = $this->paginateArray($this->messages, 6);
        return view('themes.' . config('app.settings.theme') . '.components.app', ['messages2' => $paginatedMessages]);
    }

    private function paginateArray($items, $perPage)
    {
        $page = $this->page; // Get current page from Livewire's WithPagination trait
        $offset = ($page - 1) * $perPage;
        $paginatedItems = array_slice($items, $offset, $perPage);

        return new \Illuminate\Pagination\LengthAwarePaginator(
            $paginatedItems,
            count($items),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
    }


    public function updateView($mail_id) {
        

        $mailLog = array(
            'email' => $this->email,
            'mail_id' => $mail_id,
            'isRead' => 1,
        );
          

        MailList::updateOrCreate(
            [
                'email' => $mailLog['email'],
                'mail_id' => $mailLog['mail_id']
            ],
            $mailLog
        );
        
    }

    private function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir . DIRECTORY_SEPARATOR . $object) && !is_link($dir . "/" . $object))
                        $this->rrmdir($dir . DIRECTORY_SEPARATOR . $object);
                    else
                        unlink($dir . DIRECTORY_SEPARATOR . $object);
                }
            }
            rmdir($dir);
        }
    }
}
