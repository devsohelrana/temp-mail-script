<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\TMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mail;


class ProfileController extends Controller
{

    public function index()
    {
        $profile = 'Profile';
        $pageTitle = 'User profile';

        return view('themes.' . config('app.settings.theme') . '.app')->with(compact('profile', 'pageTitle'));
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


    public function mailTest()
    {

        $data = array();
        $data['body'] = view('mail.forget', $data);

        Mail::send('mail.mailBody', $data, function ($message) use ($data) {

            //$data['booking']->restaurant->booking_mail;
            $message->to('rubyat.ais@gmail.com', 'rubyat');
            //$message->to('me@rubyat.info', $data['booking']->name);
            //$message->to($data['settings']['contact_email'], $data['contact']->name);
            //$message->cc('me@rubyat.info');
            //$message->cc($data['contact']->email);
            $message->subject('Forget Password ' . ' forget');
            $message->from('admin@priyo.email', 'Priyo Email Forget Password');
        });
        //echo "HTML Email Sent. Check your inbox.";

        dd('mail sent successfully');
    }
}
