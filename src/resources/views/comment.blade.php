@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection

@section('content')
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
            <a class="header__list--item-btn-black" href="/sell/page">出品</a>
            
            @else
            <a class="header__list--item-btn" href="/login">ログイン</a>
            <a class="header__list--item-btn" href="/register">会員登録</a>
            <a class="header__list--item-btn-black" href="/sell/page">出品</a>
            @endif
        </form>
    </li>
</ul>

<div class="main">
    <img class="main__img" src="{{ asset($product->image_path) }}" alt="">
    
    <div class="main__info">
        <h2 class="main__info--ttl">{{ $product->name }}</h2>
        <p class="main__info--txt">{{ $brand->name }}</p>
        <h2 class="main__info--price">¥{{ $product->price }}(値段)</h2>
        
        <div class="main__txt--star-comment">
            @php
            $color = 'card__form--icon-star-red';
            @endphp
            
            @if($favorite->isEmpty())
            @php
            $color = 'card__form--icon-star-gray';
            @endphp
            @endif
            <form action="?" method="post">
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
        
        @foreach($comments as $comment)
        <div class="main__info--comment">
            @if(isset($auth) && $auth->id === $comment->user->id)
            @php
            $own = 'main__info--comment-index-right';
            @endphp
            @else
            @php
            $own = '';
            @endphp
            @endif
            
            <div class="main__info--comment-index {{ $own }}">
                <img class="main__info--comment-img" src="{{ asset($comment->user->profiles->image_path) }}" alt="">
                <p class="main__info--comment-name">{{ $comment->user->name }}</p>
            </div>
            <p class="main__info--comment-txt">{{ $comment->comment }}</p>
        </div>
        @endforeach
        
        @if(isset($auth))
        <form class="main__info--form" action="/comment/send" method="post">
            @csrf
            <p class="main__info--form-txt">商品へのコメント</p>
            
            <input type="hidden" name="user_id" value="{{ old('user_id', $auth->id) }}">
            <input type="hidden" name="product_id" value="{{ old('product_id', $product->id) }}">
            <textarea class="main__info--textarea" name="comment" id="" cols="30" rows="10" maxlength="1000"></textarea>
            
            @if($errors->has('comment'))
            <p class="main__info--error">{{ $errors->first('comment') }}</p>
            @endif
            
            <button class="main__info--btn">コメントを送信する</button>
        </form>
        @endif
    </div>
</div>
@endsection