<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Product;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function storePage(Request $request){
        $auth = Auth::user();
        
        $product = Product::all()
        ->where('id', $request->product_id)
        ->first();
        
        return view ('store', compact('auth', 'product'));
    }
}
