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
<div class="header">
    <form class="header__form" action="get">
        <nav class="header__nav">
            <ul class="header__nav--ul">
                <li class="header__nav--li"><a href="/"><img src="images/logo.svg" alt=""></a></li>
                <li class="header__nav--li"><input class="header__nav--li-txt" type="text" name="text" placeholder=" 何をお探しですか？"></li>
                <li class="header__nav--li">
                    @auth
                    <a class="header__nav--li-btn" href="/logout">ログアウト</a>
                    <a class="header__nav--li-btn" href="/my_page">マイページ</a>
                    
                    @else
                    <a class="header__nav--li-btn" href="/login">ログイン</a>
                    <a class="header__nav--li-btn" href="/register">会員登録</a>
                    @endauth
                    <a class="header__nav--li-btn-black" href="/store">出品</a>
                </li>
            </ul>
        </nav>
    </form>
</div>



@yield('content')