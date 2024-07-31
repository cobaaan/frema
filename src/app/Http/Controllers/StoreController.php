<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Product;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function storePage(Request $request, $id){
        $auth = Auth::user();
        
        $product = Product::all()
        ->where('id', $id)
        ->first();
        
        return view ('store', compact('auth', 'product'));
    }
}
