@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store.css') }}" />
@endsection

@section('content')
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
            <form class="pay__form" action="" method="post">
                @csrf
                <button class="pay__form--btn">変更する</button>
            </form>
            <p class="pay__txt">コンビニ払い</p>
        </div>
        <div class="delivery">
            <h2 class="delivery__ttl">配送先</h2>
            <form class="delivery__form" action="" method="post">
                @csrf
                <button class="delivery__form--btn">変更する</button>
            </form>
            <p class="delivery__txt">福岡県宗像市田熊4-10-8-205</p>
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
                <li class="info__li">コンビニ払い</li>
            </ul>
        </nav>
        <form action="" method="post">
            @csrf
            <button class="info__btn">購入する</button>
        </form>
    </div>
</div>



@endsection