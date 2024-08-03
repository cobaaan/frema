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
    <link rel="stylesheet" href="{{ asset('css/header/logo.css') }}">
    <title>coachtechフリマ</title>
</head>
<div class="header">
    <a class="header__logo" href="/" id="logo"><img class="header__logo--img" src="{{ asset('images/logo.svg') }}" alt=""></a>
</div>

@yield('content')