<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\TMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mail;


class UserLoginController extends Controller
{

    public function index()
    {
        $login = 'login';
        $pageTitle = 'Login your account';

        return view('themes.' . config('app.settings.theme') . '.app')->with(compact('login', 'pageTitle'));
    }

    public function signup()
    {
        $signup = 'signup';
        $pageTitle = 'Create an Account';

        return view('themes.' . config('app.settings.theme') . '.app')->with(compact('signup', 'pageTitle'));
    }


    public function checkLogin()
    {

        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            $email = session()->get('logEmail');
            $pass = base64_decode(session()->get('logPass'));
            return $this->doLogin($email, $pass);
        }
    }


    private function doLogin($email, $password)
    {

        if (Auth::attempt(array('email' => $email, 'password' => $password))) {
            session()->flash('message', "You are Login successful.");
            //$this->syncEmail($newMailId);
            //return redirect(route('mailbox'));
            // session()->regenerate();
            // session()->put('logEmail', $email);
            // session()->put('logPass', base64_encode($password));
            // session()->save();

            //return redirect()->intended('mailbox');
            return redirect(route('home'));
        } else {
            session()->flash('error', 'email and password are wrong.');
            //$this->resetInputFields();
            return redirect(route('home'));
        }
    }
}
