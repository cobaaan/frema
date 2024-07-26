@extends('layouts/logo')

@section('css')
<link rel="stylesheet" href="{{ asset('css/credit.css') }}" />
@endsection

@section('content')
<div class="main">
    @if (session('flash_alert'))
    <div class="main__txt--error">{{ session('flash_alert') }}</div>
    @elseif(session('status'))
    <div class="main__txt--error">
        {{ session('status') }}
    </div>
    @endif
    <h2 class="main__ttl">Stripe決済</h2>
    <form id="card-form" action="{{ route('payment.credit') }}" method="POST">
        @csrf
        <div>
            <label class="main__txt" for="card_number">カード番号</label>
            <div class="main__input" id="card-number"></div>
        </div>
        <div>
            <label class="main__txt" for="card_expiry">有効期限</label>
            <div class="main__input" id="card-expiry"></div>
        </div>
        <div>
            <label class="main__txt" for="card-cvc">セキュリティコード</label>
            <div class="main__input" id="card-cvc"></div>
        </div>
        
        <div class="main__txt--error" id="card-errors"></div>
        
        <input type="hidden" name="user_id" value="{{ $auth->id }}">
        <input type="hidden" name="price" value="{{ $request->price }}">
        <input type="hidden" name="product_id" value="{{ $request->product_id }}">
        <input type="hidden" name="buyer_id" value="{{ $request->buyer_id }}">
        <button class="main__btn">支払い</button>
    </form>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe_public_key = "{{ config('stripe.stripe_public_key') }}"
    const stripe = Stripe(stripe_public_key);
    const elements = stripe.elements();
    
    var cardNumber = elements.create('cardNumber');
    cardNumber.mount('#card-number');
    cardNumber.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    
    var cardExpiry = elements.create('cardExpiry');
    cardExpiry.mount('#card-expiry');
    cardExpiry.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    
    var cardCvc = elements.create('cardCvc');
    cardCvc.mount('#card-cvc');
    cardCvc.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    
    var form = document.getElementById('card-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        var errorElement = document.getElementById('card-errors');
        if (event.error) {
            errorElement.textContent = event.error.message;
        } else {
            errorElement.textContent = '';
        }
        
        stripe.createToken(cardNumber).then(function(result) {
            if (result.error) {
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        });
    });
    
    function stripeTokenHandler(token) {
        var form = document.getElementById('card-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>



@endsection