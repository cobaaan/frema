@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store.css') }}" />
@endsection

@section('content')
<div class="header">
    <form class="header__form" action="/logout" method="post">
        @csrf
        <nav class="header__nav">
            <ul class="header__nav--ul">
                <li class="header__nav--li"><a href="/"><img src="{{ asset('images/logo.svg') }}" alt=""></a></li>
                {{--<li class="header__nav--li"><input class="header__nav--li-txt" id="searchText" type="text" name="text" placeholder=" 何をお探しですか？"></li>--}}
                <li class="header__nav--li">
                    @auth
                    <button class="header__nav--li-btn">ログアウト</button>
                    <a class="header__nav--li-btn"  href="{{ route('my.page', ['id' => $auth->id]) }}">マイページ</a>
                    @else
                    <a class="header__nav--li-btn" href="/login">ログイン</a>
                    <a class="header__nav--li-btn" href="/register">会員登録</a>
                    @endauth
                    <a class="header__nav--li-btn-black" href="/exhibition">出品</a>
                </li>
            </ul>
        </nav>
    </form>
</div>

<div class="store">
    <div class="store__left">
        <div class="product">
            <img class="product__img" src="{{ asset($product->image_path) }}" alt="">
            <div class="product__txt">
                <h2 class="product__txt--ttl">{{ $product->name }}</h2>
                <p class="product__txt--price">¥{{ $product->price }}</p>
            </div>
        </div>
        <div class="pay">
            <h2 class="pay__ttl">支払い方法</h2>
            
            <form action="/profile/payment" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="delivery__btn">変更する</button>
            </form>
            
            @if($auth->profiles->payment_id === 1)
            <p class="pay__txt">クレジットカード</p>
            @elseif($auth->profiles->payment_id === 2)
            <p class="pay__txt">コンビニ払い</p>
            @elseif($auth->profiles->payment_id === 3)
            <p class="pay__txt">銀行振込</p>
            @endif
        </div>
        <div class="delivery">
            <h2 class="delivery__ttl">配送先</h2>
            <form action="/profile/address" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="delivery__btn">変更する</button>
            </form>
            <p class="delivery__txt">〒{{ $auth->profiles->postcode }} {{ $auth->profiles->address }} {{ $auth->profiles->building }}</p>
        </div>
    </div>
    
    <div class="store__right">
        <nav class="info">
            <ul class="info__ul">
                <li class="info__li">商品代金</li>
                <li class="info__li">¥{{ $product->price }}</li>
            </ul>
            <ul class="info__ul">
                <li class="info__li">支払い代金</li>
                <li class="info__li">¥{{ $product->price }}</li>
            </ul>
            <ul class="info__ul">
                <li class="info__li">支払い方法</li>
                @if($auth->profiles->payment_id === 1)
                <li class="info__li" class="pay__txt">クレジットカード</li>
                @elseif($auth->profiles->payment_id === 2)
                <li class="info__li" class="pay__txt">コンビニ払い</li>
                @elseif($auth->profiles->payment_id === 3)
                <li class="info__li" class="pay__txt">銀行振込</li>
                @endif
            </ul>
        </nav>
        <form action="/credit" method="post">
            @csrf
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="buyer_id" value="{{ $product->buyer_id }}">
            <button class="info__btn">購入する</button>
        </form>
    </div>
</div>



@endsection