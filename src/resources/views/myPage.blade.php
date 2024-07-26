@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/myPage.css') }}" />
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

<div class="profile">
    <img class="profile__img" src="{{ asset($profile->image_path) }}" alt="">
    <h2 class="profile__name">{{ $auth->name }}</h2>
    <a class="profile__btn" href="/profile">プロフィールを編集</a>
</div>

<nav class="select__nav">
    <ul class="select__nav--list">
        <li class="select__nav--item" id="bought__btn">出品した商品</li>
        <li class="select__nav--item" id="sold__btn">購入した商品</li>
    </ul>
</nav>

<div class="card" id="bought">
    @foreach ($bought as $item)
    <div class="card__content">
        <form class="card__content--form" action="/product" method="post">
            @csrf
            <button class="card__content--form-btn">
                <input type="hidden" name="product_id" value="{{ $item->id }}">
                <img class="card__content--form-img" src="{{ asset($item->image_path) }}">
            </button>
        </form>
    </div>
    @endforeach
</div>

<div class="card" id="sold">
    @foreach ($sold as $item)
    <div class="card__content">
        <form class="card__content--form" action="/product" method="post">
            @csrf
            <button class="card__content--form-btn">
                <input type="hidden" name="product_id" value="{{ $item->id }}">
                <img class="card__content--form-img" src="{{ asset($item->image_path) }}">
            </button>
        </form>
    </div>
    @endforeach
</div>

<script>
    const boughtBtn = document.querySelector('#bought__btn');
    const soldBtn = document.querySelector('#sold__btn');
    
    const bought = document.querySelector('#bought');
    const sold = document.querySelector('#sold');
    
    const showKeyframes = {
        opacity: [0, 1],
        display: 'flex',
    };
    
    const hideKeyframes = {
        opacity: [1, 0],
        display: 'none',
    };
    
    const options = {
        duration: 0,
        easing: 'ease',
        fill: 'forwards',
    };
    
    boughtBtn.addEventListener('click', () => {
        bought.animate(hideKeyframes, options);
        sold.animate(showKeyframes, options);
    });
    
    soldBtn.addEventListener('click', () => {
        bought.animate(showKeyframes, options);
        sold.animate(hideKeyframes, options);
    });
</script>

@endsection