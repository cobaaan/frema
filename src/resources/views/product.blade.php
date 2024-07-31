@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
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

<div class="product">
    <img class="product__img" src="{{ asset($product->image_path) }}" alt="">
    
    <div class="product__txt">
        <h2 class="product__txt--ttl">{{ $product->name }}</h2>
        <p class="product__txt--txt">{{ $brand->name }}</p>
        <h2 class="product__txt--price">¥{{ $product->price }}(値段)</h2>
        
        <div class="product__txt--star-comment">
            @php
            $color = 'card__form--icon-star-red';
            @endphp
            
            @if($favorite->isEmpty())
            @php
            $color = 'card__form--icon-star-gray';
            @endphp
            @endif
            <form class="product__txt--star" action="?" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="card__form--icon" formaction="{{ route('favorite.toggle', $product->id) }}">
                    <i class="card__form--icon-star bi bi-star {{ $color }}"></i>
                    <p class="card__form--icon-txt">{{ count($favorites) }}</p>
                </button>
                {{--}}
                <button class="card__form--icon" formaction="/comment">
                    <i class="card__form--icon-chat bi bi-chat"></i>
                    <p class="card__form--icon-txt">{{ count($comments) }}</p>
                </button>
                --}}
                <button class="card__form--icon" formaction="{{ route('comment.page', $product->id) }}">
                    <i class="card__form--icon-chat bi bi-chat"></i>
                    <p class="card__form--icon-txt">{{ count($comments) }}</p>
                </button>
            </form>
        </div>
        
        
        {{--<a class="header__nav--li-btn"  href="{{ route('store.page', ['id' => $product->id]) }}" color="black">購入する</a>--}}
        <a class="header__nav--li-btn"  href="{{ route('store.page', ['id' => $product->id]) }}" color="black">購入する</a>
        
        
        
        
        <form action="{{ route('store.page', ['id' => $product->id]) }}" method="">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
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