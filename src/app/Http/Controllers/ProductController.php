<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Brand;
use App\Models\Comment;
use App\Models\Condition;
use App\Models\Favorite;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productPage(Request $request, $id){
        $auth = Auth::user();
        
        $product = Product::find($id);
        
        $categories = $product->categories;
        
        $comments = DB::table('comments')
        ->where('product_id', $id)
        ->get();
        
        $favorites = DB::table('favorites')
        ->where('product_id', $id)
        ->get();
        
        
        $condition = DB::table('conditions')
        ->where('id', $product->condition_id)
        ->first();
        
        $brand = DB::table('brands')
        ->where('id', $product->brand_id)
        ->first();
        
        if(isset($auth)){
            $favorite = DB::table('favorites')
            ->where('user_id', $auth->id)
            ->where('product_id', $id)
            ->get();
        } else {
            
            $favorite = DB::table('favorites')
            ->where('user_id', -1)
            ->where('product_id', $id)
            ->get();
        }
        
        return view ('product', compact('auth', 'product', 'categories', 'condition', 'brand', 'favorite', 'comments', 'favorites'));
    }
}
