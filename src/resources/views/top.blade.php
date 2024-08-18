@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}" />
@endsection

@section('content')

<div class="header">
    <ul class="header__list">
        <li class="header__list--item"><a href="/" id="logo"><img class="logo" src="{{ asset('images/logo.svg') }}" alt=""></a></li>
        <li class="header__list--item"><input class="header__list--item-search" id="searchText" type="text" name="text" placeholder="何をお探しですか？"></li>
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

<nav class="select">
    <ul class="select__list">
        <li class="select__list--item" id="recommend__btn">おすすめ</li>
        <li class="select__list--item" id="favorite__btn">マイリスト</li>
    </ul>
</nav>

<div class="card" id="product">
    @foreach ($products as $product)
    <div class="card__content" data-favorite="{{ is_array($favoriteProductIds) && in_array($product->id, $favoriteProductIds) ? 'true' : 'false' }}" data-card-name="{{ $product->name }}" data-card-description="{{ $product->description }}">
        
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
