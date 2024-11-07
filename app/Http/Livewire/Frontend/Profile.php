<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use App\Models\TMail;
use App\Models\User;
use App\Models\Log;

class Profile extends Component
{

    public $profile;
    public $state = [];

    public function mount($profile = '')
    {
        $this->profile = $profile;
        $this->state = Log::where('email', TMail::getEmail())->first()->toArray();
        $this->state['current_password'] = '';
        $this->state['password'] = '';
        $this->state['password_confirmation'] = '';
    }

    public function render()
    {
        return view('themes.' . config('app.settings.theme') . '.components.profile');
    }

    public function updateProfileInformation()
    {
        $this->resetErrorBag();

        $this->validate(
            [
                //'state.name' => 'nullable|max:255',
                'state.recoveryMail' => 'required|email'
            ],
            [
                'state.recoveryMail.required' => 'Recovery Mail is Required',
            ]
        );

        $userInfo = Log::where('email', TMail::getEmail())->first();

        $userInfo->recoveryMail = $this->state['recoveryMail'];
        $userInfo->save();
        
        $this->emit('saved');
        $this->emit('refresh-navigation-dropdown');
    }

    public function updatePassword()
    {
        $this->resetErrorBag();

        $user = Log::where('email', TMail::getEmail())->first();

        $this->validate([
            'state.current_password' => [
                'required',
                'min:5',
                function ($attribute, $value, $fail) use ($user) {
                    if ($value != $user->password) {
                        $fail('Current password does not match.');
                    }
                },
            ],
            'state.password' => 'required|min:5|confirmed', // Use built-in confirmed rule
            'state.password_confirmation' => 'required|min:5', // Redundant due to confirmed rule
        ]);


        $user->password = $this->state['password_confirmation'];
        $user->save();
        


        $this->state['current_password'] = '';
        $this->state['password'] = '';
        $this->state['password_confirmation'] = '';

        $this->emit('savedPassword');
        $this->emit('refresh-navigation-dropdown');
    
    }
}
