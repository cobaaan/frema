@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}" />
@endsection

@section('content')
<div class="header">
    <form class="header__form" action="/logout" method="post">
        @csrf
        <nav class="header__nav">
            <ul class="header__nav--ul">
                <li class="header__nav--li"><a href="/"><img src="images/logo.svg" alt=""></a></li>
                <li class="header__nav--li"><input class="header__nav--li-txt" id="searchText" type="text" name="text" placeholder=" 何をお探しですか？"></li>
                <li class="header__nav--li">
                    @auth
                    <button class="header__nav--li-btn">ログアウト</button>
                    <a class="header__nav--li-btn" href="/my_page">マイページ</a>
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

<nav class="select__nav">
    <ul class="select__nav--ul">
        <li class="select__nav--li">おすすめ</li>
        <li class="select__nav--li">マイリスト</li>
    </ul>
</nav>

<div class="card">
    @foreach ($products as $product)
    <div class="card__content" data-card-name="{{ $product->name }}" data-card-description="{{ $product->description }}">
        <form class="card__content--form" action="/product" method="post">
            @csrf
            <button class="card__content--form-btn">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <img class="card__content--form-img" src="{{ asset($product->image_path) }}">
            </button>
        </form>
    </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchText = document.getElementById('searchText');
        const cards = document.querySelectorAll('.card__content');
        
        function filter() {
            const text = searchText.value.toLowerCase();
            
            cards.forEach(function(card) {
                const cardName = card.getAttribute('data-card-name').toLowerCase();
                const cardDescription = card.getAttribute('data-card-description').toLowerCase();
                
                const matchesName = text === '' || cardName.includes(text);
                const matchesDescription = text === '' || cardDescription.includes(text);
                
                if(matchesName || matchesDescription) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        searchText.addEventListener('input', filter);
    });
</script>

@endsection
