<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use App\Models\User;
use Hash;
use Mail;

use App\Models\Log;
use App\Models\TMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class Usersignup extends Component
{



    public $domain;
    public $domains;
    public $forgetPasswordForm = false;
    public $name, $registerEmail, $recoveryMail, $password;


    public function mount()
    {
        $this->domains = config('app.settings.domains');
        $this->domain = $this->domains[0];
    }

    public function render()
    {
        return view('themes.' . config('app.settings.theme') . '.components.signup');
    }

    public function forgetPasswordFormStatus()
    {
        $this->forgetPasswordForm = !$this->forgetPasswordForm;
    }


    public function registerStore__(Request $request)
    {

        $rowPassword = $this->password;
        $validatedDate = $this->validate([
            //'name' => 'required',
            'registerEmail' => 'required',
            'recoveryMail' => 'email',
            'password' => 'required|min:5',
            'domain' => 'required',
        ]);

        
        $newUserId = $this->registerEmail . '@' . $this->domain;

        $checkUser = User::where('email', $newUserId)->get();

        if($checkUser->count() == 0){
            $regData = array(
                'name' => $this->registerEmail,
                'recoveryMail' => $this->recoveryMail,
                'email' => $newUserId,
                'password' => Hash::make($this->password),
                'show_password' => $rowPassword,
                'role' => 1
            );

            User::create($regData);
            //TMail::storeEmail($newUserId);

            $this->doLogin($newUserId, $rowPassword);

        }else{
            session()->flash('errorMessage', 'User id already taken. Please use a different user id.');
        }
        
        
    }

    public function registerStore() {

        $validatedDate = $this->validate([
            //'name' => 'required',
            'registerEmail' => 'required',
            'recoveryMail' => 'email',
            'password' => 'required|min:5',
            'domain' => 'required',
        ]);

        if (!$this->registerEmail) {
            return $this->showAlert('error', __('Please enter Username'));
        }
        $this->checkDomainInUsername();
        if (strlen($this->registerEmail) < config('app.settings.custom.min') || strlen($this->registerEmail) > config('app.settings.custom.max')) {
            return $this->showAlert('error', __('Username length cannot be less than') . ' ' . config('app.settings.custom.min') . ' ' . __('and greator than') . ' ' . config('app.settings.custom.max'));
        }
        if (!$this->domain) {
            return $this->showAlert('error', __('Please Select a Domain'));
        }
        if (in_array($this->registerEmail, config('app.settings.forbidden_ids'))) {
            return $this->showAlert('error', __('Username not allowed'));
        }
        if (!$this->checkEmailLimit()) {
            return $this->showAlert('error', __('You have reached daily limit of MAX ') . config('app.settings.email_limit', 5) . __(' temp mail'));
        }
        if (!$this->checkEmailExist()) {
            return $this->showAlert('error', __('This user is already exist. Please use another name '));
        }
        if (!$this->checkUsedEmail()) {
            return $this->showAlert('error', __('Sorry! That email is already been used by someone else. Please try a different email address.'));
        }
        if (!$this->validateCaptcha()) {
            return $this->showAlert('error', __('Invalid Captcha. Please try again'));
        }
        $email = TMail::createCustomEmail($this->registerEmail, $this->domain, $this->password, $this->recoveryMail);
        $this->redirect(route('switch', $email));
        $this->redirect(route('mailbox'));

    }


    /**
     * Check if the user is crossing email limit
     */
    private function checkEmailLimit() {
        $logs = Log::select('ip', 'email')->where('ip', request()->ip())->where('created_at', '>', Carbon::now()->subDay())->groupBy('email')->groupBy('ip')->get();
        if (count($logs) >= config('app.settings.email_limit', 5)) {
            return false;
        }
        return true;
    }


    /**
     * Don't allow used email
     */
    private function checkUsedEmail() {
        if (config('app.settings.disable_used_email', false)) {
            $check = Log::where('email', $this->registerEmail . '@' . $this->domain)->where('ip', '<>', request()->ip())->count();
            if ($check > 0) {
                return false;
            }
            return true;
        }
        return true;
    }

    /**
     * Don't allow used email
     */
    private function checkEmailExist() {
        $check = Log::where('email', $this->registerEmail . '@' . $this->domain)->count();
        if ($check > 0) {
            return false;
        }
        return true;
    }

     /**
     * Validate Captcha
     */
    private function validateCaptcha() {
        if (config('app.settings.captcha') == 'hcaptcha') {
            $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
                'response' => $this->captcha,
                'secret' => config('app.settings.hcaptcha.secret_key')
            ])->object();
            return $response->success;
        } else if (config('app.settings.captcha') == 'recaptcha2') {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'response' => $this->captcha,
                'secret' => config('app.settings.recaptcha2.secret_key')
            ])->object();
            return $response->success;
        }
        return true;
    }
    /**
     * Check if Username already consist of Domain
     */
    private function checkDomainInUsername() {
        $parts = explode('@', $this->registerEmail);
        if (isset($parts[1])) {
            if (in_array($parts[1], $this->domains)) {
                $this->domain = $parts[1];
            }
            $this->registerEmail = $parts[0];
        }
    }

    private function showAlert($type, $message) {
        $this->dispatchBrowserEvent('showAlert', ['type' => $type, 'message' => $message]);
    }


    private function doLogin($email, $password)
    {
        session()->regenerate();
        if (Auth::attempt(array('email' => $email, 'password' => $password))) {
            session()->flash('message', "You are Login successful.");
            //$this->syncEmail($newMailId);
            //return redirect(route('mailbox'));
            session()->put('logEmail', $email);
            session()->put('logPass', base64_encode($password));
            session()->save();

            //return redirect()->intended('mailbox');
            return redirect(route('checkLogin'));


        } else {
            session()->flash('error', 'email and password are wrong.');
            //$this->resetInputFields();
        }
    }

    
}
