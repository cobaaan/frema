<?php

namespace App\Http\Controllers;

use Auth;

use App\Http\Requests\StorePaymentRequest;

use App\Models\Product;

use Exception;

use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function payment() {
        
        return redirect('/thanks')
        ->with('message', 'ご購入ありがとうございました。')
        ->with('address', '/')
        ->with('page', 'トップページ');
    }
    
    public function credit(Request $request) {
        $auth = Auth::user();
        $request = $request;
        
        return view('credit', compact('auth', 'request'));
    }
    
    public function convenience(Request $request) {
        $auth = Auth::user();
        
        return view('convenience', compact('auth', 'request'));
    }
    
    public function bank() {
        return view('bank');
    }
    
    public function paymentCredit(Request $request)
    {
        if($request->buyer_id === null){
            \Stripe\Stripe::setApiKey(config('stripe.stripe_secret_key'));
            
            try {
                \Stripe\Charge::create([
                    'source' => $request->stripeToken,
                    'amount' => $request->price,
                    'currency' => 'jpy',
                ]);
            } catch (Exception $e) {
                return back()->with('flash_alert', '決済に失敗しました！('. $e->getMessage() . ')');
            }
            
            $param = [
                'buyer_id' => $request->user_id,
            ];
            
            $buyer = Product::where('id', $request->product_id)
            ->update($param);
            
            return redirect('/thanks')
            ->with('message', 'ご購入ありがとうございました。')
            ->with('address', '/')
            ->with('page', 'トップページ');
        }
        else {
            return back()->with('flash_alert', '先に購入された方がいるようです。この商品はお買い求めいただけません。');
        }
    }
}
