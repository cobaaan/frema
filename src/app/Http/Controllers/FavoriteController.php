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
