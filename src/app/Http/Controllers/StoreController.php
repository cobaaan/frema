<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Product;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function storePage(Request $request, $id){
        $auth = Auth::user();
        
        if(is_null(auth()->id())){
            $admin = Auth::guard('admin')->check();
            if($admin) {
                return redirect('/thanks')
                ->with('message', '購入機能は一般ユーザーのみ使用できます。')
                ->with('address', route('product.page', ['id' => $id]))
                ->with('page', '元のページ');
            }
            else {
                return redirect('/thanks')
                ->with('message', '購入機能はログイン後に使用できます。')
                ->with('address', route('product.page', ['id' => $id]))
                ->with('page', '元のページ');
            }
        }
        else {
            $product = Product::all()
            ->where('id', $id)
            ->first();
            
            return view ('store', compact('auth', 'product'));
        }
        /*
        $product = Product::all()
        ->where('id', $id)
        ->first();
        
        return view ('store', compact('auth', 'product'));
        */
    }
}
