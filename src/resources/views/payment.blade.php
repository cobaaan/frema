@extends('layouts/black')

@section('css')
<link rel="stylesheet" href="{{ asset('css/payment.css') }}" />
@endsection

@section('content')
<div class="main">
    <h2 class="main__ttl">支払い方法の変更</h2>
    <form action="/profile/payment/change" method="post">
        @csrf
        <h2 class="main__index">支払い方法</h2>
        <select class="main__select" name="payment_id">
            <option value="1">クレジットカード</option>
            <option value="2">コンビニ払い</option>
            <option value="3">銀行振込</option>
        </select>
        <button class="main__btn">更新する</button>
    </form>
</div>
@endsection