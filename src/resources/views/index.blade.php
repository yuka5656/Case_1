@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content__form">
    <div class="content__form-text">
        <p>{{ Auth::user()->name }}さんお疲れ様です！</p>
    </div>
    <div class="content__form-buttons">
        <form action="/" class="timestamp" method="post">
        @csrf
        @method('POST')
            <input class="input" type="hidden" name="user_id" value=" {{ Auth::user()->id }} ">
            <input type="hidden" name="work_Start" value=" {{ Auth::user()->work_Start }} ">
            <button type="submit">勤務開始</button>
        </form>
        <form action="/" class="timestamp" method="post">
        @csrf
        @method('POST')
            <input class="input" type="hidden" name="user_id" value=" {{ Auth::user()->id }} ">
            <input type="hidden" name="work_End" value="">
            <button type="submit">勤務終了</button>
        </form>
        <form action="/" class="timestamp" method="post">
        @csrf
        @method('POST')
            <button type="submit">休憩開始</button>
        </form>
        <form action="/" class="timestamp" method="post">
        @csrf
        @method('POST')
            <button type="submit">休憩終了</button>
        </form>
    </div>
</div>
@endsection