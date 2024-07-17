@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}" />
@endsection

@section('content')
<div class="main">
    <img class="main__img" src="images/italian.jpg" alt="">
    
    <div class="main__info">
        <h2 class="main__info--ttl">商品名</h2>
        <p class="main__info--txt">ブランド名</p>
        <h2 class="main__info--price">¥47,000(値段)</h2>
        <div class="main__info--favorite-comment">
            <p class="main__info--favorite-icon">星</p>
            <p class="main__info--comment-icon">コメント</p>
        </div>
        <div class="main__info--comment">
            <div class="main__info--comment-index">
                <img class="main__info--comment-img" src="images/italian.jpg" alt="">
                <p class="main__info--comment-name">名前</p>
            </div>
            <p class="main__info--comment-txt">赤サタな濱家らわ</p>
        </div>
        <div class="main__info--comment">
            <div class="main__info--comment-index">
                <img class="main__info--comment-img" src="images/italian.jpg" alt="">
                <p class="main__info--comment-name">名前</p>
            </div>
            <p class="main__info--comment-txt">赤サタな濱家らわ</p>
        </div>
        <div class="main__info--comment">
            <div class="main__info--comment-index">
                <img class="main__info--comment-img" src="images/italian.jpg" alt="">
                <p class="main__info--comment-name">名前</p>
            </div>
            <p class="main__info--comment-txt">赤サタな濱家らわ</p>
        </div>
        <form class="main__info--form" action="" method="">
            @csrf
            <p class="main__info--form-txt">商品へのコメント</p>
            <textarea class="main__info--textarea" name="textarea" id="" cols="30" rows="10"></textarea>
            <button class="main__info--btn">コメントを送信する</button>
        </form>
    </div>
</div>



@endsection