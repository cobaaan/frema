<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Favorite;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FremaController extends Controller
{
    public function top() {
        //$products = Product::all();
        
        $products = DB::table('products')
        ->where('buyer_id', null)
        ->get();
        
        return view ('top', compact('products'));
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
    
    
    public function productPage(){
        return view ('product');
    }
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
        
        $sold = DB::table('products')
        ->where('seller_id', $auth->id)
        ->get();
        
        $bought = DB::table('products')
        ->where('buyer_id', $auth->id)
        ->get();
        
        
        
        return view ('myPage', compact('auth', 'profile', 'sold', 'bought'));
    }
    
    public function profilePage(){
        $auth = Auth::user();
        
        return view ('profile', compact('auth'));
    }
    
    public function exhibitionPage(){
        $auth = Auth::user();
        
        return view ('exhibition', compact('auth'));
    }
}
