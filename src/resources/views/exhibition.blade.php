@extends('layouts/black')

@section('css')
<link rel="stylesheet" href="{{ asset('css/exhibition.css') }}" />
@endsection

@section('content')
<div class="main">
    <h2 class="main__ttl">商品の出品</h2>
    
    <form class="main__form" action="" method="post">
        @csrf
        <p class="main__form--ttl">商品画像</p>
        <div class="main__file">
            <label class="main__file--label">
                画像を選択する
                <input type="file" name="image" accept=".jpg, .jpeg, .png">
            </label>
            <p class="main__file--txt">選択されていません</p>
        </div>
        
        <h2 class="main__index">商品の詳細</h2>
        <p class="main__form--ttl">カテゴリー</p>
        <input class="main__input" type="text" name="category">
        <p class="main__form--ttl">商品の状態</p>
        <input class="main__input" type="text" name="condition">
        
        <h2 class="main__index">商品名と説明</h2>
        <p class="main__form--ttl">商品名</p>
        <input class="main__input" type="text" name="name">
        <p class="main__form--ttl">商品の説明</p>
        <textarea class="main__form--textarea" name="description" id="" cols="30" rows="10"></textarea>
        
        <h2 class="main__index">販売価格</h2>
        <p class="main__form--ttl">販売価格</p>
        <input class="main__input" type="number" name="price" step="1" placeholder="¥">
        
        <button class="main__btn">出品する</button>
    </form>
    
</div>

<script>
    $(document).ready(function() {
        $('.main__file--label input[type=file]').on('change', function () {
            var file = $(this).prop('files')[0];
            if (file) {
                $('.main__file--txt').text(file.name);
            } else {
                $('.main__file--txt').text('選択されていません');
            }
        });
    });
</script>

@endsection
