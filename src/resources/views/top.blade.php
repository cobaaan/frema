@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}" />
@endsection

@section('content')
<div class="header">
    <nav class="header__nav">
        <ul class="header__nav--ul">
            <li class="header__nav--li"><a href="/" id="logo"><img src="{{ asset('images/logo.svg') }}" alt=""></a></li>
            <li class="header__nav--li"><input class="header__nav--li-txt" id="searchText" type="text" name="text" placeholder="何をお探しですか？"></li>
            <li class="header__nav--li">
                <form class="header__form" action="/logout" method="post">
                    @csrf
                    @if (Auth::guard('admin')->check())
                    <button class="header__nav--li-btn">ログアウト</button>
                    <a class="header__nav--li-btn" href="/admin/user">ユーザー 一覧</a>
                    <a class="header__nav--li-btn" href="/admin/comment">コメント 一覧</a>
                    <a class="header__nav--li-btn" href="/mail">メール</a>
                    
                    @elseif (Auth::check())
                    <button class="header__nav--li-btn">ログアウト</button>
                    <a class="header__nav--li-btn"  href="{{ route('my.page', ['id' => $auth->id]) }}">マイページ</a>
                    <a class="header__nav--li-btn-black" href="/exhibition">出品</a>
                    
                    @else
                    <a class="header__nav--li-btn" href="/login">ログイン</a>
                    <a class="header__nav--li-btn" href="/register">会員登録</a>
                    <a class="header__nav--li-btn-black" href="/exhibition">出品</a>
                    @endif
                </form>
            </li>
        </ul>
    </nav>
</div>

<nav class="select__nav">
    <ul class="select__nav--ul">
        <li class="select__nav--li" id="recommend__btn">おすすめ</li>
        <li class="select__nav--li" id="favorite__btn">マイリスト</li>
    </ul>
</nav>

<div class="card" id="product">
    @foreach ($products as $product)
    <div class="card__content"
    data-favorite="{{ is_array($favoriteProductIds) && in_array($product->id, $favoriteProductIds) ? 'true' : 'false' }}"
    data-card-name="{{ $product->name }}"
    data-card-description="{{ $product->description }}">
    
    <form class="card__content--form" action="{{ route('product.page', ['id' => $product->id]) }}" method="get">
        @csrf
        <button class="card__content--form-btn">
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
        const recommendBtn = document.querySelector('#recommend__btn');
        const favoriteBtn = document.querySelector('#favorite__btn');
        const logo = document.getElementById('logo');
        
        const reccomendBtnColor = document.getElementById('recommend__btn')
        const favoriteBtnColor = document.getElementById('favorite__btn')
        
        function showRandomProducts() {
            const cardsArray = Array.from(cards);
            cardsArray.forEach(card => card.style.display = 'none');
            
            const selectedCards = cardsArray.sort(() => 0.5 - Math.random()).slice(0, 5);
            selectedCards.forEach(card => card.style.display = '');
            
            reccomendBtnColor.style.backgroundColor = '#ccc';
            favoriteBtnColor.style.backgroundColor = 'white';
        }
        
        function filterByFavorites() {
            cards.forEach(function(card) {
                const isFavorite = card.getAttribute('data-favorite') === 'true';
                if (isFavorite) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
            
            reccomendBtnColor.style.backgroundColor = 'white';
            favoriteBtnColor.style.backgroundColor = '#ccc';
        }
        
        function showAllProducts() {
            cards.forEach(function(card) {
                card.style.display = '';
            });
            
            reccomendBtnColor.style.backgroundColor = 'white';
            favoriteBtnColor.style.backgroundColor = 'white';
        }
        
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
        
        recommendBtn.addEventListener('click', showRandomProducts);
        favoriteBtn.addEventListener('click', filterByFavorites);
        searchText.addEventListener('input', filter);
        logo.addEventListener('click', function(e) {
            showAllProducts();
        });
    });
</script>

@endsection
