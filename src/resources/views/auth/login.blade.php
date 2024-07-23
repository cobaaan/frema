@extends('layouts/logo')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="content">
    <h2 class="content__ttl">ログイン</h2>
    <form action="/login" method="post">
        @csrf
        <p class="content__txt">メールアドレス</p>
        <input class="content__input" type="text" name="email">
        <p class="content__txt">パスワード</p>
        <input class="content__input" type="password" name="password" id="">
        <br>
        <button class="content__btn">ログインする</button>
    </form>
    <a class="content__a" href="/register">会員登録はこちら</a>
</div>



@endsection