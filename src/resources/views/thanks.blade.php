@extends('layouts/logo')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
<div class="content">
    @if(session('message'))
    <h2 class="content__ttl">{{ session('message') }}</h2>
    @endif
    <a class="content__a" href="/">トップページ</a>
</div>



@endsection