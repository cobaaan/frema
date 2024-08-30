<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Favorite;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function toggleFavorite($id, Request $request)
    {
        if(is_null(auth()->id())){
            $admin = Auth::guard('admin')->check();
            if($admin) {
                return redirect('/thanks')
                ->with('message', 'お気に入り機能は一般ユーザーのみ使用できます。')
                ->with('address', route('product.page', ['id' => $id]))
                ->with('page', '元のページ');
            }
            else {
                return redirect('/thanks')
                ->with('message', 'お気に入り機能はログイン後に使用できます。')
                ->with('address', route('product.page', ['id' => $id]))
                ->with('page', '元のページ');
            }
        }
        else {
            $favorite = Favorite::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->first();
            
            if ($favorite) {
                $favorite->delete();
            } else {
                Favorite::create([
                    'user_id' => auth()->id(),
                    'product_id' => $id,
                ]);
            }
            
            session(['product_id' => $id]);
            
            return back();
        }
    }
}
