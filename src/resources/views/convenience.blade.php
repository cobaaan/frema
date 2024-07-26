@extends('layouts/logo')

@section('css')
<link rel="stylesheet" href="{{ asset('css/convenience.css') }}" />
@endsection

@section('content')
<div class="main">
    <h2>コンビニ決済情報入力</h2>
    
    @if (session('flash_alert'))
    <div class="main__txt--error">{{ session('flash_alert') }}</div>
    @elseif(session('status'))
    <div class="main__txt--error">
        {{ session('status') }}
    </div>
    @endif
    
    <form id="payment-form" action="/payment/convenience" method="post">
        @csrf
        <p>{{ $request->price }}</p>
        <input type="hidden" name="price" value="{{ $request->price }}">
        <input type="hidden" name="product_id" value="{{ $request->product_id }}">
        <input type="hidden" name="user_id" value="{{ $auth->id }}">
        
        <!-- 氏名入力フィールド -->
        <div class="form-group">
            <label for="name">氏名:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        
        <!-- メールアドレス入力フィールド -->
        <div class="form-group">
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        
        <!-- 電話番号入力フィールド -->
        <div class="form-group">
            <label for="phone">電話番号:</label>
            <input type="tel" id="phone" name="phone" class="form-control" required>
        </div>
        
        <!-- 提出ボタン -->
        <button type="submit" id="submit" class="btn btn-primary">コンビニで支払う</button>
    </form>
    
    <div id="payment-result"></div>
</div>
{{--
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('stripe.stripe_public_key') }}');
    
    // サーバーから clientSecret を取得する関数
    async function getClientSecret() {
    const response = await fetch('/create-payment-intent', {
    method: 'POST',
    headers: {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value, // CSRFトークン
    },
    body: JSON.stringify({
    price: document.querySelector('input[name="price"]').value,
    product_id: document.querySelector('input[name="product_id"]').value,
    user_id: document.querySelector('input[name="user_id"]').value,
    }),
    });
    const data = await response.json();
    return data.clientSecret;
    }
    
    document.addEventListener('DOMContentLoaded', async () => {
    const clientSecret = await getClientSecret();
    const form = document.getElementById('payment-form');
    
    form.addEventListener('submit', async (event) => {
    event.preventDefault();
    
    const { error } = await stripe.confirmKonbiniPayment(clientSecret, {
    payment_method: {
    billing_details: {
    name: document.getElementById('name').value,
    email: document.getElementById('email').value,
    phone: document.getElementById('phone').value,
    },
    },
    });
    
    if (error) {
    document.getElementById('payment-result').innerText = error.message;
    } else {
    document.getElementById('payment-result').innerText = 'Payment successful! Please check your email for details.';
    }
    });
    });
</script>
--}}
@endsection
