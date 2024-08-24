@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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

<div class="product">
    <img class="product__img" src="{{ asset($product->image_path) }}" alt="">
    
    <div class="product__info">
        <h2 class="product__info--ttl">{{ $product->name }}</h2>
        <p class="product__info--txt">{{ $brand->name }}</p>
        <h2 class="product__info--price">¥{{ $product->price }}(値段)</h2>
        
        <div class="product__info--star-comment">
            @php
            $color = 'card__form--icon-star-red';
            @endphp
            
            @if($favorite->isEmpty())
            @php
            $color = 'card__form--icon-star-gray';
            @endphp
            @endif
            <form class="product__info--star" action="?" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="card__form--icon" formaction="{{ route('favorite.toggle', $product->id) }}">
                    <i class="card__form--icon-star bi bi-star {{ $color }}"></i>
                    <p class="card__form--icon-txt">{{ count($favorites) }}</p>
                </button>
                
                <button class="card__form--icon" formaction="{{ route('comment.page', $product->id) }}">
                    <i class="card__form--icon-chat bi bi-chat"></i>
                    <p class="card__form--icon-txt">{{ count($comments) }}</p>
                </button>
            </form>
        </div>
        
        @if(is_null($product->buyer_id))
        <form action="{{ route('purchase.page', ['id' => $product->id]) }}" method="">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button class="product__info--btn">購入する</button>
        </form>
        @endif
        
        <p class="product__info--description-index">商品説明</p>
        <p class="product__info--description-txt">{{ $product->description }}</p>
        <p class="product__info--info-index">商品の情報</p>
        <div class="product__info--category">
            <p class="product__info--category-index">カテゴリー</p>
            <div class="product__info--categories">
                @foreach($categories as $category)
                <p class="product__info--category-txt">{{ $category->name }}</p>
                @endforeach
            </div>
        </div>
        <div class="product__info--tag">
            <p class="product__info--tag-index">商品の状態</p>
            <p class="product__info--tag-txt">{{ $condition->condition }}</p>
        </div>
    </div>
</div>
@endsection