@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('content')
<div class="main">
    <h2 class="main__ttl">プロフィール設定</h2>
    <div class="main__images">
        <img class="main__images--img" src="images/italian.jpg" alt="">
        <form class="main__images--form" action="" method="post">
            @csrf
            <button class="main__images--form-btn">画像を選択する</button>
        </form>
    </div>
    <form action="" method="post">
        @csrf
        <p class="main__index">ユーザー名</p>
        <input class="main__input" type="text" name="name">
        <p class="main__index">郵便番号</p>
        <input class="main__input" type="text" name="postcode">
        <p class="main__index">住所</p>
        <input class="main__input" type="text" name="address">
        <p class="main__index">建物名</p>
        <input class="main__input" type="text" name="building">
        <button class="main__btn">更新する</button>
    </form>
    
</div>



@endsection