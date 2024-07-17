@extends('layouts/black')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}" />
@endsection

@section('content')
<div class="address">
    <h2 class="address__ttl">住所の変更</h2>
    <form action="" method="post">
        @csrf
        <h2 class="address__index">郵便番号</h2>
        <input class="address__input" type="text" name="address">
        <h2 class="address__index">住所</h2>
        <input class="address__input" type="text" name="address">
        <h2 class="address__index">建物名</h2>
        <input class="address__input" type="text" name="address">
        <button class="address__btn">更新する</button>
    </form>
</div>
@endsection