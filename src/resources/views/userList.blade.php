@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/userList.css') }}" />
@endsection

@section('content')
<div class="header">
    <nav class="header__nav">
        <ul class="header__nav--ul">
            <li class="header__nav--li"><a href="/" id="logo"><img src="{{ asset('images/logo.svg') }}" alt=""></a></li>
            <li class="header__nav--li"><input class="header__nav--li-txt" id="searchText" type="text" name="text" placeholder="検索"></li>
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

<div class="main">
    <h2 class="main__ttl">ユーザー 一覧</h2>
    
    <ul class="main__list--index">
        <li class="main__list--item txt__id">ID</li>
        <li class="main__list--item txt__name">名前</li>
        <li class="main__list--item txt__email">メールアドレス</li>
        <li class="main__list--item txt__btn"></li>
    </ul>
    
    @foreach($users as $user)
    <ul class="main__list" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}">
        <li class="main__list--item txt__id">{{ $user->id }}</li>
        <li class="main__list--item txt__name">{{ $user->name }}</li>
        <li class="main__list--item txt__email">{{ $user->email }}</li>
        <li class="main__list--item txt__btn">
            <button class="main__list--item-btn" onclick="openModal({{ $user->id }})">削除</button>
        </li>
        
        <section id="modal-{{ $user->id }}" class="modal">
            <h2 class="modal__ttl">このユーザーを削除しますか？</h2>
            <p class="modal__txt">ユーザー ID : {{ $user->id }}</p>
            <p class="modal__txt">名前 : {{ $user->name }}</p>
            <p class="modal__txt">メールアドレス : {{ $user->email }}</p>
            <div class="modal__buttons">
                <form action="/admin/user/delete" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <button class="modal__btn modal__btn--delete">削除する</button>
                </form>
                <button class="modal__btn modal__btn--close" onclick="closeModal({{ $user->id }})">閉じる</button>
            </div>
        </section>
        
        <div id="mask-{{ $user->id }}" class="mask" onclick="closeModal({{ $user->id }})" disabled></div>
    </ul>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchText = document.getElementById('searchText');
        const users = document.querySelectorAll('.main__list');
        
        function filter() {
            const text = searchText.value.toLowerCase();
            
            users.forEach(function(user) {
                const userId = user.getAttribute('data-id');
                const userName = user.getAttribute('data-name').toLowerCase();
                const userEmail = user.getAttribute('data-email').toLowerCase();
                
                const matchesId = text === '' || userId.includes(text);
                const matchesName = text === '' || userName.includes(text);
                const matchesEmail = text === '' || userEmail.includes(text);
                
                if (matchesId || matchesName || matchesEmail) {
                    user.style.display = '';
                } else {
                    user.style.display = 'none';
                }
            });
        }
        
        searchText.addEventListener('input', filter);
    });
    
    function openModal(id) {
        const modal = document.getElementById('modal-' + id);
        const mask = document.getElementById('mask-' + id);
        modal.style.display = 'block';
        mask.style.display = 'block';
    }
    
    function closeModal(id) {
        const modal = document.getElementById('modal-' + id);
        const mask = document.getElementById('mask-' + id);
        modal.style.display = 'none';
        mask.style.display = 'none';
    }
</script>

@endsection
