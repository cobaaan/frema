@extends('layouts/black')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}" />
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="main">
    <h2 class="main__ttl">商品の出品</h2>
    
    <form action="/sell" method="post" enctype="multipart/form-data">
        @csrf
        <p class="main__subtitle">商品画像</p>
        <div class="main__file">
            <label class="main__file--label">
                画像を選択する
                <input type="file" name="image_path" accept=".jpg, .jpeg, .png" value="{{ old('image_path') }}">
            </label>
            <p class="main__file--txt">選択されていません</p>
        </div>
        @if($errors->has('image_path'))
        <p class="main__error">{{ $errors->first('image_path') }}</p>
        @endif
        
        <h2 class="main__index">商品の詳細</h2>
        <p class="main__subtitle">カテゴリー</p>
        <input name='tags' class='main__input' autofocus value="{{ old('tags') }}">
        @if($errors->has('tags'))
        <p class="main__error">{{ $errors->first('tags') }}</p>
        @endif
        
        <p class="main__subtitle">商品の状態</p>
        <input class="main__input" type="text" name="condition" value="{{ old('condition') }}">
        @if($errors->has('condition'))
        <p class="main__error">{{ $errors->first('condition') }}</p>
        @endif
        
        <h2 class="main__index">商品名と説明</h2>
        <p class="main__subtitle">商品名</p>
        <input class="main__input" type="text" name="name" value="{{ old('name') }}">
        @if($errors->has('name'))
        <p class="main__error">{{ $errors->first('name') }}</p>
        @endif
        
        <p class="main__subtitle">ブランド名</p>
        <input class="main__input" type="text" name="brand" value="{{ old('brand') }}">
        @if($errors->has('brand'))
        <p class="main__error">{{ $errors->first('brand') }}</p>
        @endif
        
        <p class="main__subtitle">商品の説明</p>
        <textarea class="main__form--textarea" name="description" id="" cols="30" rows="10" value="{{ old('description') }}"></textarea>
        @if($errors->has('description'))
        <p class="main__error">{{ $errors->first('description') }}</p>
        @endif
        
        <h2 class="main__index">販売価格</h2>
        <p class="main__subtitle">販売価格</p>
        <input class="main__input" type="number" name="price" step="1" placeholder="¥" value="{{ old('price') }}">
        @if($errors->has('price'))
        <p class="main__error">{{ $errors->first('price') }}</p>
        @endif
        
        @auth
        <input type="hidden" name="seller_id" value="{{ $auth->id }}">
        @endauth
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
    
    var input = document.querySelector('input[name=tags]'),
    tagify = new Tagify(input, {
        whitelist : ["A# .NET", "A# (Axiom)"],
        blacklist : ["react", "angular"]
    });
    
    document.querySelector('.tags--removeAllBtn')
    .addEventListener('click', tagify.removeAllTags.bind(tagify))
    
    tagify.on('add', onAddTag)
    .on('remove', onRemoveTag)
    .on('invalid', onInvalidTag);
    
    function onAddTag(e){
        console.log(e, e.detail);
        console.log( tagify.DOM.originalInput.value )
        tagify.off('add', onAddTag)
    }
    
    function onRemoveTag(e){
        console.log(e, e.detail);
    }
    
    function onInvalidTag(e){
        console.log(e, e.detail);
    }
</script>

@endsection
