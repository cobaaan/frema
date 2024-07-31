@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/myPage.css') }}" />
@endsection

@section('content')
<div class="header">
    <nav class="header__nav">
        <ul class="header__nav--ul">
            <li class="header__nav--li"><a href="/"><img src="{{ asset('images/logo.svg') }}" alt=""></a></li>
            <li class="header__nav--li"><input class="header__nav--li-txt" id="searchText" type="text" name="text" placeholder="何をお探しですか？"></li>
            <li class="header__nav--li">
                <form class="header__form" action="/logout" method="post">
                    @csrf
                    @auth
                    <button class="header__nav--li-btn">ログアウト</button>
                    <a class="header__nav--li-btn" href="{{ route('my.page', ['id' => $auth->id]) }}">マイページ</a>
                    @else
                    <a class="header__nav--li-btn" href="/login">ログイン</a>
                    <a class="header__nav--li-btn" href="/register">会員登録</a>
                    @endauth
                    <a class="header__nav--li-btn-black" href="/exhibition">出品</a>
                </form>
            </li>
        </ul>
    </nav>
</div>

<div class="profile">
    <img class="profile__img" src="{{ asset($profile->image_path) }}" alt="">
    <h2 class="profile__name">{{ $auth->name }}</h2>
    <a class="profile__btn" href="{{ route('profile.page', ['id' => $auth->id]) }}">プロフィールを編集</a>
</div>

<nav class="select__nav">
    <ul class="select__nav--list">
        <li class="select__nav--item" id="sold__btn">出品した商品</li>
        <li class="select__nav--item" id="bought__btn">購入した商品</li>
    </ul>
</nav>

<div class="card">
    @foreach ($products as $product)
    <div class="card__content"
    data-sellerId="{{ $product->seller_id }}"
    data-buyerId="{{ $product->buyer_id }}"
    data-card-name="{{ $product->name }}"
    data-card-description="{{ $product->description }}">
    <form class="card__content--form" action="{{ route('product.page', ['id' => $product->id]) }}" method="get">
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
    const auth = @json($auth);
    
    document.addEventListener('DOMContentLoaded', function() {
        const searchText = document.getElementById('searchText');
        
        const soldBtn = document.querySelector('#sold__btn');
        const boughtBtn = document.querySelector('#bought__btn');
        
        const soldBtnColor = document.getElementById('sold__btn')
        const boughtBtnColor = document.getElementById('bought__btn')
        
        const cards = document.querySelectorAll('.card__content');
        
        let currentFilter = 'sold';
        
        function filterProducts() {
            const text = searchText.value.toLowerCase();
            
            cards.forEach(function(card) {
                const cardName = card.getAttribute('data-card-name').toLowerCase();
                const cardDescription = card.getAttribute('data-card-description').toLowerCase();
                const seller = card.getAttribute('data-sellerId');
                const buyer = card.getAttribute('data-buyerId');
                
                const matchesName = cardName.includes(text);
                const matchesDescription = cardDescription.includes(text);
                
                let matchesRole = false;
                
                if (currentFilter === 'sold') {
                    matchesRole = (seller === auth.id.toString());
                } else if (currentFilter === 'bought') {
                    matchesRole = (buyer === auth.id.toString());
                }
                
                if ((matchesName || matchesDescription) && matchesRole) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
        
        function soldProducts() {
            currentFilter = 'sold';
            filterProducts();
            
            soldBtnColor.style.backgroundColor = '#ccc';
            boughtBtnColor.style.backgroundColor = 'white';
        }
        
        function boughtProducts() {
            currentFilter = 'bought';
            filterProducts();
            
            soldBtnColor.style.backgroundColor = 'white';
            boughtBtnColor.style.backgroundColor = '#ccc';
        }
        
        soldBtn.addEventListener('click', soldProducts);
        boughtBtn.addEventListener('click', boughtProducts);
        
        searchText.addEventListener('input', filterProducts);
        
        soldProducts();
    });
</script>

@endsection
