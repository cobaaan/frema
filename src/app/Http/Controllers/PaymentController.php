<?php

namespace App\Http\Controllers;

use Auth;

use App\Http\Requests\StorePaymentRequest;

use App\Models\Product;
use App\Models\Profile;
use App\Models\User;

use Exception;

use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function credit(Request $request) {
        $auth = Auth::user();
        $address = $auth->profiles->address;
        if(isset($address)){
            $request = $request;
            
            return view('credit', compact('auth', 'request'));
        } else {
            return redirect('/thanks')
            ->with('message', '配送先を入力してください。')
            ->with('address', route('purchase.page', ['id' => $request->product_id]))
            ->with('page', '元のページ');
        }
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
