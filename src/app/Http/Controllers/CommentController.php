<?php

namespace App\Http\Controllers;

use Auth;

use App\Http\Requests\CommentRequest;

use App\Models\Brand;
use App\Models\Comment;
use App\Models\Condition;
use App\Models\Favorite;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function commentPage(Request $request, $id){
        
        $auth = Auth::user();
        
        $product = Product::find($id);
        
        $categories = $product->categories;
        $comments = Comment::where('product_id', $id)->get();
        
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
        
        $favorites = DB::table('favorites')
        ->where('product_id', $id)
        ->get();
        
        $condition = DB::table('conditions')
        ->where('id', $product->condition_id)
        ->first();
        
        $brand = DB::table('brands')
        ->where('id', $product->brand_id)
        ->first();
        
        return view ('comment', compact('auth', 'product', 'categories', 'condition', 'brand', 'favorite', 'comments', 'favorites'));
    }
    
    public function commentSend(CommentRequest $request) {
        $param = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'comment' => $request->comment
        ];
        
        $comment = Comment::create($param);
        
        $products = Product::all();
        
        return redirect('/thanks')
        ->with('message', 'コメントが送信されました。')
        ->with('address', route('comment.page', ['id' => $request->product_id]))
        ->with('page', '元のページ');
    }
}
