@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attend.css') }}">
@endsection

@section('content')
<div class="page_form-content">
    <div class="page_form-date">
        <a href="/attendance?date=20240423">テスト</a>
    </div>
</div>
@endsection