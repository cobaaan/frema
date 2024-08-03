@extends('layouts/black')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}" />
@endsection

@section('content')
<div class="main">
    <h2 class="main__ttl">住所の変更</h2>
    <form action="/profile/address/change" method="post">
        @csrf
        <h2 class="main__index">郵便番号</h2>
        <input class="main__input" type="text" name="postcode" maxlength="7">
        <h2 class="main__index">住所</h2>
        <input class="main__input" type="text" name="address">
        <h2 class="main__index">建物名</h2>
        <input class="main__input" type="text" name="building">
        
        <input type="hidden" name="product_id" value="{{ $request->product_id }}">
        <button class="main__btn">更新する</button>
    </form>
</div>
@endsection