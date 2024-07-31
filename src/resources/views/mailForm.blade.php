@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mailForm.css') }}" />
@endsection

@section('content')
<div class="header">
    <nav class="header__nav">
        <ul class="header__nav--ul">
            <li class="header__nav--li"><a href="/" id="logo"><img src="{{ asset('images/logo.svg') }}" alt=""></a></li>
            <li class="header__nav--li">
                <form class="header__form" action="/logout" method="post">
                    @csrf
                    @auth
                    <button class="header__nav--li-btn">ログアウト</button>
                    <a class="header__nav--li-btn"  href="{{ route('my.page', ['id' => $auth->id]) }}">マイページ</a>
                    @else
                    <a class="header__nav--li-btn" href="/login">ログイン</a>
                    <a class="header__nav--li-btn" href="/register">会員登録</a>
                    @endauth
                    <a class="header__nav--li-btn-black" href="/exhibition">出品</a>
                </form>
            </li>
        </ul>
    </nav>
</div>

<div class="main">
    <h2 class="main__ttl">メール送信</h2>
    <form action="mail/send" method="post">
        @csrf
        <p class="main__txt">件名</p>
        <input class="main__subject" type="text" name="subject">
        
        <p class="main__txt">本文</p>
        <textarea class="main__body" name="body" id="" cols="30" rows="10"></textarea>
        
        <button class="main__btn">送信</button>
    </form>
</div>

<script>
    
</script>

@endsection
