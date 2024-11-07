<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Menu;
use App\Models\TMail;
use App\Models\Log;

class Nav extends Component
{

    public $menus, $current_route, $storageUsed, $storageUsedPercentage, $emailProfileName, $emails, $password, $showPassword;

    public function mount()
    {
        $this->showPassword = false;
        $this->emails = $this->emailList();
        $this->storageUsed = TMail::storage();
        $this->emailProfileName = TMail::getEmail();
        $this->password = $this->getEmailPassword($this->emailProfileName);
        $this->storageUsedPercentage = $this->storageUsed / 40 * 100;
        $this->menus = Menu::where('status', true)->where('parent_id', null)->orderBy('order')->get();
    }

    public function render()
    {
        return view('themes.' . config('app.settings.theme') . '.components.nav');
    }

    public function showPasswordToggle()
    {
        $this->showPassword = !$this->showPassword;
    }

    public function logoutEmail()
    {
        TMail::removeEmail($this->emailProfileName);
        return redirect()->route('home');
    }


    protected function emailList()
    {

        $emails = TMail::getEmails();

        $emailList = [];

        foreach ($emails as $email) {
            $emailList[] = array(
                'email' => $email,
                'emailPic' => $this->defaultProfilePhotoUrl($email),
            );
        }

        return $emailList;
    }


    public function triggerActionCreateAccount()
    {
        $this->emit('componentBTriggeredFromNav');
    }


    protected function defaultProfilePhotoUrl($email)
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($email) . '&color=7F9CF5&background=EBF4FF';
    }

    private function getEmailPassword($email)
    {
        $check = Log::where('email', $email)->first();
        if ($check) {
            return $check->password;
        }
        return true;
    }
}
