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
                <li class="header__nav--li"><a href="/"><img src="images/logo.svg" alt=""></a></li>
                <li class="header__nav--li"><input class="header__nav--li-txt" id="searchText" type="text" name="text" placeholder=" 何をお探しですか？"></li>
                <li class="header__nav--li">
                    @auth
                    <button class="header__nav--li-btn">ログアウト</button>
                    <a class="header__nav--li-btn" href="/my_page">マイページ</a>
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
            <img class="product__img" src="images/italian.jpg" alt="">
            <div class="product__txt">
                <h2 class="product__txt--ttl">商品名</h2>
                <p class="product__txt--price">¥47,000</p>
            </div>
        </div>
        <div class="pay">
            <h2 class="pay__ttl">支払い方法</h2>
            <a href="/payment" class="pay__btn">変更する</a>
            
            @if($auth->profile->payment_id === 1)
            <p class="pay__txt">クレジットカード</p>
            @elseif($auth->profile->payment_id === 2)
            <p class="pay__txt">コンビニ払い</p>
            @elseif($auth->profile->payment_id === 3)
            <p class="pay__txt">銀行振込</p>
            @endif
        </div>
        <div class="delivery">
            <h2 class="delivery__ttl">配送先</h2>
            <a href="/address" class="delivery__btn">変更する</a>
            <p class="delivery__txt">〒{{ $auth->profile->postcode }} {{ $auth->profile->address }} {{ $auth->profile->building }}</p>
        </div>
    </div>
    
    <div class="store__right">
        <nav class="info">
            <ul class="info__ul">
                <li class="info__li">商品代金</li>
                <li class="info__li">¥47,000</li>
            </ul>
            <ul class="info__ul">
                <li class="info__li">支払い代金</li>
                <li class="info__li">¥47,000</li>
            </ul>
            <ul class="info__ul">
                <li class="info__li">支払い方法</li>
                @if($auth->profile->payment_id === 1)
                <li class="info__li" class="pay__txt">クレジットカード</li>
                @elseif($auth->profile->payment_id === 2)
                <li class="info__li" class="pay__txt">コンビニ払い</li>
                @elseif($auth->profile->payment_id === 3)
                <li class="info__li" class="pay__txt">銀行振込</li>
                @endif
            </ul>
        </nav>
        <form action="" method="post">
            @csrf
            <button class="info__btn">購入する</button>
        </form>
    </div>
</div>



@endsection