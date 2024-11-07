<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\TMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;


class MailController extends Controller {

    public function index(Request $request)
    {

        $data['keyword'] = $request->keyword;
        $data['mails'] = Log::keywords($request->keyword)->orderBy('id', 'DESC')->paginate(25);
        Session::put('tasks_url', request()->fullUrl());

        return view('backend.mails.index',$data);

    }

    public function edit($log)
    {
        $data['log'] = Log::find($log);
        return view('backend.mails.edit',$data);
    }


    public function update(Request $request, $logId)
    {

        $log = Log::find($logId); 
        $emailValidator = '';
        if($request->recoveryMail){
            $emailValidator = 'email';
        }

        $data = $request->validate([
            'recoveryMail' => $emailValidator,
            'password' => !empty($request->post('password')) ? ['required','min:5'] : '',
        ]);


        if($request->recoveryMail){
            $log->recoveryMail = $request->recoveryMail;
        }
        
        if($request->password){
            $log->password = $request->password;
        }
        
        $log->save();


        if(Session::get('tasks_url')){
            return redirect(Session::get('tasks_url'))->with('status','User updated successfully');
        }

        return redirect()->back()->with('status','User updated successfully!');
        
    }

    public function destroy(User $user)
    {
        $user->delete();

        if(Session::get('tasks_url')){
            return redirect(Session::get('tasks_url'))->with('status','User deleted successfully');
        }

        return redirect()->back()->with('status','User deleted successfully!');
    }

    public function login($email)
    {

        Cookie::queue('email', '', -1);
        Cookie::queue('emails', serialize([]), -1);

        //$emails = array();
        //array_push($emails, $email);
        //TMail::setEmail($email);
        //Cookie::queue('emails', serialize($emails), 43800);

        TMail::loginByMail($email);
        return redirect()->route('switch', $email);
    }

}