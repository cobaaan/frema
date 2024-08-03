<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header/login.css') }}">
    <title>coachtechフリマ</title>
</head>
{{--}}
<div class="header">
    <ul class="header__list">
        <li class="header__list--item"><a class="aa" href="/" id="logo"><img class="logo" src="{{ asset('images/logo.svg') }}" alt=""></a></li>
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
--}}
@yield('content')