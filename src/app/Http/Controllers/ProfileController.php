<?php

namespace App\Http\Controllers;

use Auth;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\ProfileRequest;

use App\Models\Profile;
use App\Models\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profilePage(){
        $auth = Auth::user();
        
        return view ('profile', compact('auth'));
    }
    
    public function profileChange(ProfileRequest $request) {
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
        
        return redirect('/thanks')
        ->with('message', 'プロフィールが変更されました。')
        ->with('address', route('my.page', ['id' => $auth->id]))
        ->with('page', 'マイページ');
    }
    
    public function paymentPage(Request $request) {
        return view ('payment', compact('request'));
    }
    
    public function paymentChange(Request $request) {
        $auth = Auth::user();
        
        $param = [
            'payment_id' => $request->payment_id,
        ];
        
        Profile::where('user_id', $auth->id)->update($param);
        
        return redirect('/thanks')
        ->with('message', '支払い方法が変更されました。')
        ->with('address', route('store.page', ['id' => $request->product_id]))
        ->with('page', '購入ページ');
    }
    
    public function addressPage(Request $request){
        return view ('address', compact('request'));
    }
    
    public function addressChange(AddressRequest $request) {
        $auth = Auth::user();
        
        $param = [
            'postcode' => $request->postcode,
            'address' => $request->address,
            'building' => $request->building,
        ];
        
        Profile::where('user_id', $auth->id)->update($param);
        
        //return redirect('/thanks')->with('message', 'プロフィールが変更されました。');
        return redirect('/thanks')
        ->with('message', '住所が変更されました。')
        ->with('address', route('store.page', ['id' => $request->product_id]))
        ->with('page', '購入ページ');
    }
}
