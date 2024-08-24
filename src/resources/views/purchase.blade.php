@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/store.css') }}" />
@endsection

@section('content')
<div class="header">
    <ul class="header__list">
        <li class="header__list--item"><a href="/" id="logo"><img class="logo" src="{{ asset('images/logo.svg') }}" alt=""></a></li>
        <li class="header__list--item">
            <form class="header__list--item-form" action="/logout" method="post">
                @csrf
                @if (Auth::guard('admin')->check())
                <button class="header__list--item-btn">ログアウト</button>
                <a class="header__list--item-btn" href="/admin/user">ユーザー 一覧</a>
                <a class="header__list--item-btn" href="/admin/comment">コメント 一覧</a>
                <a class="header__list--item-btn" href="/mail">メール</a>
                
                @elseif (Auth::check())
                <button class="header__list--item-btn">ログアウト</button>
                <a class="header__list--item-btn"  href="{{ route('my.page', ['id' => $auth->id]) }}">マイページ</a>
                <a class="header__list--item-btn-black" href="/sell">出品</a>
                
                @else
                <a class="header__list--item-btn" href="/login">ログイン</a>
                <a class="header__list--item-btn" href="/register">会員登録</a>
                <a class="header__list--item-btn-black" href="/sell">出品</a>
                @endif
            </form>
        </li>
    </ul>
</div>

<div class="store">
    <div class="store__info">
        <div class="product">
            <img class="product__img" src="{{ asset($product->image_path) }}" alt="">
            <div class="product__txt">
                <h2 class="product__txt--ttl">{{ $product->name }}</h2>
                <p class="product__txt--price">¥{{ number_format($product->price) }}</p>
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
    
    <div class="store__detail">
        <nav class="detail">
            <ul class="detail__list">
                <li class="detail__list--item">商品代金</li>
                <li class="detail__list--item">¥{{ number_format($product->price) }}</li>
            </ul>
            <ul class="detail__list">
                <li class="detail__list--item">支払い代金</li>
                <li class="detail__list--item">¥{{ number_format($product->price) }}</li>
            </ul>
            <ul class="detail__list">
                <li class="detail__list--item">支払い方法</li>
                @if($auth->profiles->payment_id === 1)
                <li class="detail__list--item" class="pay__txt">クレジットカード</li>
                @elseif($auth->profiles->payment_id === 2)
                <li class="detail__list--item" class="pay__txt">コンビニ払い</li>
                @elseif($auth->profiles->payment_id === 3)
                <li class="detail__list--item" class="pay__txt">銀行振込</li>
                @endif
            </ul>
        </nav>
        <form action="/credit" method="post">
            @csrf
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="buyer_id" value="{{ $product->buyer_id }}">
            <button class="detail__btn">購入する</button>
        </form>
    </div>
</div>



@endsection