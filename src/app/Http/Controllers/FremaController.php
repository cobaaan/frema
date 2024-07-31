<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Admin;
use App\Models\Favorite;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FremaController extends Controller
{
    public function top() {
        $auth = Auth::user();
        //$admin = Auth::admin();
        //dd($admin);
        $products = DB::table('products')
        ->where('buyer_id', null)
        ->get();
        
        //$favoriteProductIds = $auth->favoriteProducts()->pluck('product_id')->toArray();
        
        if(isset($auth)){
            $favoriteProductIds = $auth->favoriteProducts()->pluck('product_id')->toArray();
            
            $favorites = $auth->favoriteProducts()->get();
            return view ('top', compact('auth', 'products', 'favorites', 'favoriteProductIds'));
        }
        
        else {
            $favoriteProductIds = null;
            
            $favorites = null;
            return view ('top', compact('auth', 'products', 'favorites', 'favoriteProductIds'));
        }
        //return view ('top', compact('products'));
    }
    
    public function thanks() {
        return view ('thanks');
    }
    /*
    public function paymentPage() {
    return view ('payment');
    }
    */
    public function loginPage(){
        return view ('auth/login');
    }
    
    public function registerPage(){
        return view ('auth/register');
    }
    
    /*
    public function productPage(){
    return view ('product');
    }
    */
    /*
    public function storePage(){
    $auth = Auth::user();
    
    return view ('store', compact('auth'));
    }
    */
    
    /*
    public function addressPage(){
    return view ('address');
    }
    */
    /*
    public function commentPage(){
    return view ('comment');
    }
    */
    public function myPage(){
        $auth = Auth::user();
        $profile = $auth->profiles;
        $products = Product::all();
        /*
        $products = DB::table('products')
        ->where('buyer_id', null)
        ->get();
        */
        /*
        $sold = DB::table('products')
        ->where('seller_id', $auth->id)
        ->get();
        
        $bought = DB::table('products')
        ->where('buyer_id', $auth->id)
        ->get();
        */
        
        
        return view ('myPage', compact('auth', 'profile', 'products'));
        //return view ('myPage', compact('auth', 'profile', 'sold', 'bought'));
    }
    /*
    public function profilePage(){
    $auth = Auth::user();
    
    return view ('profile', compact('auth'));
    }
    */
    public function exhibitionPage(){
        $auth = Auth::user();
        
        return view ('exhibition', compact('auth'));
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('/');
        }
        
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('/');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
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
