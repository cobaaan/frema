@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
@endsection

@section('content')
<div class="header">
    <form class="header__form" action="/logout" method="post">
        @csrf
        <nav class="header__nav">
            <ul class="header__nav--ul">
                <li class="header__nav--li"><a href="/"><img src="{{ asset('images/logo.svg')}} " alt=""></a></li>
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

<div class="main">
    <img class="main__img" src="{{ asset($product->image_path) }}" alt="">
    
    <div class="main__info">
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
            
            @foreach($comments as $comment)
            <div class="main__info--comment">
                @if($auth->id === $comment->user->id)
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
            
            
            
            
            <form class="main__info--form" action="/comment/send" method="post">
                @csrf
                <p class="main__info--form-txt">商品へのコメント</p>
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="user_id" value="{{ $auth->id }}">
                <textarea class="main__info--textarea" name="comment" id="" cols="30" rows="10"></textarea>
                <button class="main__info--btn">コメントを送信する</button>
            </form>
        </div>
    </div>
    
    
    
    @endsection