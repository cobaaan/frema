@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/myPage.css') }}" />
@endsection

@section('content')
<div class="profile">
    <img class="profile__img" src="images/italian.jpg" alt="">
    <h2 class="profile__name">ユーザー名</h2>
    <form class="profile__form" action="" method="post">
        @csrf
        <button class="profile__form--btn">プロフィールを編集</button>
    </form>
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