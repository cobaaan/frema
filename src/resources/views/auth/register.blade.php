@extends('layouts/logo')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
<div class="content">
    <h2 class="content__ttl">会員登録</h2>
    <form id="registerForm" action="/register" method="post">
        @csrf
        <p class="content__txt">メールアドレス</p>
        <input class="content__input" type="text" name="email" id="email">
        <p class="content__txt">パスワード</p>
        <input class="content__input" type="password" name="password">
        <br>
        <input type="hidden" name="name" id="name">
        <button class="content__btn" type="submit">登録する</button>
    </form>
    <a class="content__login--link" href="/login">ログインはこちら</a>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        
        var emailValue = document.getElementById('email').value;
        
        document.getElementById('name').value = emailValue;
    });
</script>
@endsection
