@extends('layouts/black')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}" />
@endsection

@section('content')
<div class="main">
    <h2 class="main__ttl">住所の変更</h2>
    <form action="/profile/address/change" method="post">
        @csrf
        <h2 class="main__index">郵便番号</h2>
        <input class="main__input" type="text" name="postcode" maxlength="7" value="{{ old('postcode') }}">
        
        @if($errors->has('postcode'))
        <p class="main__input--error">{{ $errors->first('postcode') }}</p>
        @endif
        
        <h2 class="main__index">住所</h2>
        <input class="main__input" type="text" name="address" value="{{ old('address') }}">
        
        @if($errors->has('address'))
        <p class="main__input--error">{{ $errors->first('address') }}</p>
        @endif
        
        <h2 class="main__index">建物名</h2>
        <input class="main__input" type="text" name="building" value="{{ old('building') }}">
        
        @if($errors->has('building'))
        <p class="main__input--error">{{ $errors->first('building') }}</p>
        @endif
        
        
        <input type="hidden" name="product_id" value="{{ old('product_id', $request->product_id) }}">
        <button class="main__btn">更新する</button>
    </form>
</div>
@endsection