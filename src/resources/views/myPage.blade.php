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
        <li class="select__nav--item">出品した商品</li>
        <li class="select__nav--item">購入した商品</li>
    </ul>
</nav>

<div class="card">
    <div class="card__content"></div>
    <div class="card__content"></div>
    <div class="card__content"></div>
    <div class="card__content"></div>
    <div class="card__content"></div>
    <div class="card__content"></div>
    <div class="card__content"></div>
    <div class="card__content"></div>
    <div class="card__content"></div>
    <div class="card__content"></div>
    <div class="card__content"></div>
    <div class="card__content"></div>
</div>



@endsection