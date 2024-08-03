@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mailForm.css') }}" />
@endsection

@section('content')
<div class="header">
    <ul class="header__list">
        <li class="header__list--item"><a href="/" id="logo"><img class="logo" src="{{ asset('images/logo.svg') }}" alt=""></a></li>
        <li class="header__list--item"><input class="header__list--item-search" id="searchText" type="text" name="text" placeholder="何をお探しですか？"></li>
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
                <a class="header__list--item-btn-black" href="/exhibition">出品</a>
                
                @else
                <a class="header__list--item-btn" href="/login">ログイン</a>
                <a class="header__list--item-btn" href="/register">会員登録</a>
                <a class="header__list--item-btn-black" href="/exhibition">出品</a>
                @endif
            </form>
        </li>
    </ul>
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
