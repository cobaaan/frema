@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}" />
@endsection

@section('content')
<div class="product">
    <img class="product__img" src="images/italian.jpg" alt="">
    
    <div class="product__txt">
        <h2 class="product__txt--ttl">商品名</h2>
        <p class="product__txt--txt">ブランド名</p>
        <h2 class="product__txt--price">¥47,000(値段)</h2>
        <div class="product__txt--star-comment">
            <p class="product__txt--star">星</p>
            <p class="product__txt--comment">コメント</p>
        </div>
        <form action="" method="">
            @csrf
            <button class="product__txt--btn">購入する</button>
        </form>
        <p class="product__txt--description-index">商品説明</p>
        <p class="product__txt--description-txt">
            カラー：グレー<br><br>
            新品<br>
            商品の状態は良好です。傷もありません。<br>
            <br>
            購入後、即発送いたします。
        </p>
        <p class="product__txt--info-index">商品の情報</p>
        <div class="product__txt--category">
            <p class="product__txt--category-index">カテゴリー</p>
            <p class="product__txt--category-txt">洋服</p>
            <p class="product__txt--category-txt">メンズ</p>
        </div>
        <div class="product__txt--tag">
            <p class="product__txt--tag-index">商品の状態</p>
            <p class="product__txt--tag-txt">良好</p>
        </div>
    </div>
</div>



@endsection