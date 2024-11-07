<?php

namespace App\Http\Livewire\Backend\Settings;

use Livewire\Component;
use App\Models\Setting;

class Mail extends Component {

    /**
     * Components State
     */
    public $state = [
        'mailName' => '',
        'mailFrom' => '',
        'mailSubject' => '',
        'mailDetails' => '',
    ];

    /**
    INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES (NULL, 'mailName', '', '2023-10-04 10:11:42', '2023-10-04 10:11:42');
    INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES (NULL, 'mailFrom', '', '2023-10-04 10:11:42', '2023-10-04 10:11:42');
    INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES (NULL, 'mailSubject', '', '2023-10-04 10:11:42', '2023-10-04 10:11:42');
    INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES (NULL, 'mailDetails', '', '2023-10-04 10:11:42', '2023-10-04 10:11:42');

     */

    public function updatedState($value) {
        $this->emit('mailUpdated', $value);
    }

    public function mount() {
        $this->state['mailName'] = config('app.settings.mailName');
        $this->state['mailFrom'] = config('app.settings.mailFrom');
        $this->state['mailSubject'] = config('app.settings.mailSubject');
        $this->state['mailDetails'] = config('app.settings.mailDetails');
    }

    public function update() {

        $keyList = ['mailName', 'mailFrom', 'mailSubject', 'mailDetails'];

        $settings = Setting::whereIn('key', $keyList)->get();
        foreach ($settings as $setting) {
            $setting->value = serialize($this->state[$setting->key]);
            $setting->save();
        }


        $this->emit('saved');
    }

    public function render() {
        return view('backend.settings.mail');
    }
}
