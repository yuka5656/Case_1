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
        <!-- <form action="/" class="form" method="post">
        @csrf
            
        </form> -->
        <form action="/" class="timestamp" method="post">
        @csrf
        <input class="input" type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="work_Start">
            <button type="submit">勤務開始</button>
        </form>
        <form action="/" class="timestamp" method="post">
        @csrf
            <button type="submit" name="work_End" >勤務終了</button>
        </form>
        <form action="/" class="timestamp" method="post">
        @csrf
            <button type="submit">休憩開始</button>
        </form>
        <form action="/" class="timestamp" method="post">
        @csrf
            <button type="submit">休憩終了</button>
        </form>
    </div>
</div>
@endsection