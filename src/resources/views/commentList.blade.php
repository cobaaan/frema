@extends('layouts/login')

@section('css')
<link rel="stylesheet" href="{{ asset('css/commentList.css') }}" />
@endsection

@section('content')
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

<div class="main">
    <h2 class="main__ttl">コメント 一覧</h2>
    
    <ul class="main__list--index">
        <li class="main__list--item txt__id">ID</li>
        <li class="main__list--item txt__name">名前</li>
        <li class="main__list--item txt__comment">コメント</li>
        <li class="main__list--item txt__btn"></li>
    </ul>
    
    @foreach($comments as $comment)
    <ul class="main__list" data-id="{{ $comment->id }}" data-name="{{ $comment->user->name }}" data-comment="{{ $comment->comment }}">
        <li class="main__list--item txt__id">{{ $comment->id }}</li>
        <li class="main__list--item txt__name">{{ $comment->user->name }}</li>
        <li class="main__list--item txt__comment">{{ $comment->comment }}</li>
        <li class="main__list--item txt__btn">
            <button class="main__list--item-btn" onclick="openModal({{ $comment->id }})">削除</button>
        </li>
        
        <section id="modal-{{ $comment->id }}" class="modal">
            <h2 class="modal__ttl">このコメントを削除しますか？</h2>
            <p class="modal__txt">コメント ID : {{ $comment->id }}</p>
            <p class="modal__txt">コメントしたユーザー : {{ $comment->user->name }}</p>
            <p class="modal__txt">コメント : {{ $comment->comment }}</p>
            <div class="modal__buttons">
                <form action="/admin/comment/delete" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $comment->id }}">
                    <button class="modal__btn modal__btn--delete">削除する</button>
                </form>
                <button class="modal__btn modal__btn--close" onclick="closeModal({{ $comment->id }})">閉じる</button>
            </div>
        </section>
        
        <div id="mask-{{ $comment->id }}" class="mask" onclick="closeModal({{ $comment->id }})" disabled></div>
    </ul>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchText = document.getElementById('searchText');
        const comments = document.querySelectorAll('.main__list');
        
        function filter() {
            const text = searchText.value.toLowerCase();
            
            comments.forEach(function(comment) {
                const commentId = comment.getAttribute('data-id');
                const commentName = comment.getAttribute('data-name').toLowerCase();
                const commentComment = comment.getAttribute('data-comment').toLowerCase();
                
                const matchesId = text === '' || commentId.includes(text);
                const matchesName = text === '' || commentName.includes(text);
                const matchesComment = text === '' || commentComment.includes(text);
                
                if (matchesId || matchesName || matchesComment) {
                    comment.style.display = '';
                } else {
                    comment.style.display = 'none';
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