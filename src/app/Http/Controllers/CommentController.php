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

class CommentController extends Controller
{
    public function commentPage(Request $request){
        $auth = Auth::user();
        $productId = session('product_id', $request->product_id);
        $product = Product::find($productId);
        
        $categories = $product->categories;
        
        $comments = Comment::where('product_id', $productId)->get();
        
        $condition = DB::table('conditions')
        ->where('id', $product->condition_id)
        ->first();
        
        $brand = DB::table('brands')
        ->where('id', $product->brand_id)
        ->first();
        
        $favorite = DB::table('favorites')
        ->where('user_id', $auth->id)
        ->where('product_id', $productId)
        ->get();
        
        $favorites = DB::table('favorites')
        ->where('product_id', $productId)
        ->get();
        
        session()->forget('product_id');
        
        return view ('comment', compact('auth', 'product', 'categories', 'condition', 'brand', 'favorite', 'comments', 'favorites'));
    }
    
    public function commentSend(Request $request) {
        $param = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'comment' => $request->comment
        ];
        
        $comment = Comment::create($param);
        
        $products = Product::all();
        
        return redirect('/thanks')->with('message', 'コメントが送信されました。');
    }
}
