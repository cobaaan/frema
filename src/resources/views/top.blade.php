@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}" />
@endsection

@section('content')
<nav class="select__nav">
    <ul class="select__nav--ul">
        <li class="select__nav--li">おすすめ</li>
        <li class="select__nav--li">マイリスト</li>
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
    {{--
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    <img class="card__img" src="images/italian.jpg">
    --}}
</div>



@endsection