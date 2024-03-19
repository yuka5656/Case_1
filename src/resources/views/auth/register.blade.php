@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/entry.css') }}">
@endsection

@section('content')

<div class="login-form__content">
    <div class="login-form__logo">
        <h2>会員登録</h2>
    </div>
    <form action="/register" class="form" method="post">
    @csrf
        <div class="form__group">
            <div class="form__group-content">
                <input class="form__group-input" type="text" name="name" placeholder="名前" value="{{ old('name') }}" />
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <div class="form__group-content">
                <input class="form__group-input" type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div class="form__group-content">
                <input class="form__group-input" type="password" name="password" placeholder="パスワード">
            </div>
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div class="form__group-content">
                <input class="form__group-input" type="password" name="password_confirmation" placeholder="確認用パスワード">
            </div>
            <div class="form__group-register">
                <button type="submit">会員登録</button>
            </div>
            <div class="form__group-text">
                <p>アカウントをお持ちの方はこちらから</p>
            </div>
            <div class="form__group-register">
                <a href="/login">ログイン</a>
            </div>
        </div>
    </form>
</div>
@endsection