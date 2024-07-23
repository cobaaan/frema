@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}" />
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

<div class="product">
    <img class="product__img" src="{{ $product->image_path }}" alt="">
    
    <div class="product__txt">
        <h2 class="product__txt--ttl">{{ $product->name }}</h2>
        <p class="product__txt--txt">{{ $brand->name }}</p>
        <h2 class="product__txt--price">¥{{ $product->price }}(値段)</h2>
        
        
        
        
        <form action="?" method="post">
            @csrf
            @php
            $color = 'card__form--heart-img';
            @endphp
            
            @foreach($favorites as $favorite)
            @if($favorite['user_id'] === $auth->id && $favorite['product_id'] === $product->id)
            @php
            $color = 'card__form--heart-red';
            @endphp
            @endif
            @endforeach
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button class="card__form--heart" formaction="{{ route('favorite.toggle', $product->id) }}"><img  class="{{ $color }}" src="images/life.jpg"></button>
        </form>
        
        
        
        
        
        <div class="product__txt--star-comment">
            <p class="product__txt--star">星</p>
            <p class="product__txt--comment">コメント</p>
        </div>
        <form action="" method="">
            @csrf
            <button class="product__txt--btn">購入する</button>
        </form>
        <p class="product__txt--description-index">商品説明</p>
        <p class="product__txt--description-txt">{{ $product->description }}</p>
        <p class="product__txt--info-index">商品の情報</p>
        <div class="product__txt--category">
            <p class="product__txt--category-index">カテゴリー</p>
            <div class="product__txt--categories">
                @foreach($categories as $category)
                <p class="product__txt--category-txt">{{ $category->name }}</p>
                @endforeach
            </div>
        </div>
        <div class="product__txt--tag">
            <p class="product__txt--tag-index">商品の状態</p>
            <p class="product__txt--tag-txt">{{ $condition->condition }}</p>
        </div>
    </div>
</div>



@endsection