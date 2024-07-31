@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
@endsection

@section('content')
<div class="header">
    <form class="header__form" action="/logout" method="post">
        @csrf
        <nav class="header__nav">
            <ul class="header__nav--ul">
                <li class="header__nav--li"><a href="/"><img src="images/logo.svg" alt=""></a></li>
                {{--<li class="header__nav--li"><input class="header__nav--li-txt" id="searchText" type="text" name="text" placeholder=" 何をお探しですか？"></li>--}}
                <li class="header__nav--li">
                    @auth
                    <button class="header__nav--li-btn">ログアウト</button>
                    <a class="header__nav--li-btn"  href="{{ route('my.page', ['id' => $auth->id]) }}">マイページ</a>
                    @else
                    <a class="header__nav--li-btn" href="/login">ログイン</a>
                    <a class="header__nav--li-btn" href="/register">会員登録</a>
                    @endauth
                    <a class="header__nav--li-btn-black" href="/exhibition">出品</a>
                </li>
            </ul>
        </nav>
    </form>
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