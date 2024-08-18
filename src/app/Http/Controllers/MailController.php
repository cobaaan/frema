<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mailForm(Request $request) {
        return view ('mailForm');
    }
    
    public function mailSend(MailRequest $request) {
        $users = User::all();
        
        foreach($users as $user){
            Mail::send([], [], function ($message) use ($request, $user) {
                $message->to($user->email)
                ->subject($request['subject'])
                ->setBody($request['body']);
            });
        }
        
        return redirect('/thanks')
        ->with('message', 'メールを送信しました。')
        ->with('address', route('mail.form'))
        ->with('page', '元のページ');
    }
}
