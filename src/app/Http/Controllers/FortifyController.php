<?php

namespace App\Http\Controllers;

use Auth;

//use App\Http\Requests\FortifyRequest;

use Illuminate\Http\Request;

class FortifyController extends Controller
{
    public function loginPage(){
        return view ('auth/login');
    }
    
    public function registerPage(){
        return view ('auth/register');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('/');
        }
        
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('/');
        }
        
        return back()->withErrors([
            'email' => '入力情報に誤りがあります。',
        ]);
    }
    
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
