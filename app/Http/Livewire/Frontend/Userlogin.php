<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use App\Models\User;
use App\Models\Log;
use App\Models\TMail;

class Userlogin extends Component
{



    public $domains, $loginEmail, $loginPassword;
    public $forgetPasswordForm = false;

    public function mount()
    {
        $this->domains = config('app.settings.domains');
    }

    public function render()
    {
        return view('themes.' . config('app.settings.theme') . '.components.login');
    }

    public function forgetPasswordFormStatus()
    {
        $this->forgetPasswordForm = !$this->forgetPasswordForm;
    }


    public function login()
    {
        $validatedDate = $this->validate([
            'loginEmail' => 'required|email',
            'loginPassword' => 'required',
        ]);



        $emailUser = Log::where('email', $this->loginEmail)->first();

        if($emailUser){
            if($this->loginPassword != $emailUser->password){
                return $this->showAlert('error', __('Sorry your password is not correct for this email...'));
            }

            TMail::loginByMail($this->loginEmail);
            return redirect()->route('switch', $this->loginEmail);

        }

        return $this->showAlert('error', __('Sorry email is not valid'. $this->loginEmail));
    }


    private function showAlert($type, $message) {
        $this->dispatchBrowserEvent('showAlert', ['type' => $type, 'message' => $message]);
    }

    
}
