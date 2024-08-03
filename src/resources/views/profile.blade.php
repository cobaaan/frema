@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('content')
<div class="header">
    <ul class="header__list">
        <li class="header__list--item"><a href="/" id="logo"><img class="logo" src="{{ asset('images/logo.svg') }}" alt=""></a></li>
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
    <h2 class="main__ttl">プロフィール設定</h2>
    <form class="main__form" action="/profile/change" method="post" enctype="multipart/form-data">
        @csrf
        <div class="main__file">
            <img class="main__img" src="{{ asset($auth->profiles->image_path) }}" alt="">
            <label class="main__file--label">
                画像を選択する
                <input type="file" name="image_path" accept=".jpg, .jpeg, .png">
            </label>
            <p class="main__file--txt">画像を選択してください</p>
        </div>
        <p class="main__index">ユーザー名</p>
        <input class="main__input" type="text" name="name">
        <p class="main__index">郵便番号</p>
        <input class="main__input" type="text" name="postcode" maxlength="7">
        <p class="main__index">住所</p>
        <input class="main__input" type="text" name="address">
        <p class="main__index">建物名</p>
        <input class="main__input" type="text" name="building">
        <button class="main__btn">更新する</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('.main__file--label input[type=file]').on('change', function () {
            var file = $(this).prop('files')[0];
            if (file) {
                $('.main__file--txt').text(file.name);
            } else {
                $('.main__file--txt').text('画像を選択してください');
            }
        });
    });
</script>


@endsection