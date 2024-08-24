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
        
        $products = DB::table('products')
        ->where('buyer_id', null)
        ->get();
        
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
    }
    
    public function thanks() {
        return view ('thanks');
    }
    
    public function myPage(){
        $auth = Auth::user();
        $profile = $auth->profiles;
        $products = Product::all();
        
        return view ('myPage', compact('auth', 'profile', 'products'));
    }
}
