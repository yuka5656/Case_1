@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/signin.css') }}">
@endsection

@section('content')

<div class="login-form__content">
    <div class="login-form__logo">
        <h2>ログイン</h2>
    </div>
    <form action="/login" class="form" method="post">
    @csrf
        <div class="form__group">
            <div class="form__group-content">
                <input class="form__group-input" type="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
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
            <div class="form__group-login">
                <button type="submit">ログイン</button>
            </div>
            <div class="form__group-text">
                <p>アカウントをお持ちでない方はこちらから</p>
            </div>
            <div class="form__group-register">
                <a href="/register">会員登録</a>
            </div>
        </div>
    </form>
</div>
@endsection
