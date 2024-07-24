<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Profile;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileChange(Request $request) {
        $auth = Auth::user();
        
        $name = [
            'name' => $request->name,
        ];
        
        $file_name = $request->image_path->getClientOriginalName();
        
        $request->image_path->storeAs('public/images/', $file_name);
        
        $param = [
            'image_path' => 'storage/images/' . $file_name,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building,
        ];
        User::where('id', $auth->id)->update($name);
        Profile::where('user_id', $auth->id)->update($param);
        
        return redirect('/thanks')->with('message', 'プロフィールが変更されました。');
    }
    
    public function paymentChange(Request $request) {
        $auth = Auth::user();
        
        $param = [
            'payment_id' => $request->payment_id,
        ];
        
        Profile::where('user_id', $auth->id)->update($param);
        
        return view('top');
    }
    
    public function addressChange(Request $request) {
        $auth = Auth::user();
        
        $param = [
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building,
        ];
        
        Profile::where('user_id', $auth->id)->update($param);
        
        return view('top');
    }
}
