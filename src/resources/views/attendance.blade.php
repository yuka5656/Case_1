@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attend.css') }}">
@endsection

@section('content')
<div class="page_content">
    <div class="page_content-date">
        <a href="/attendance?date=20240423">テスト</a>
    </div>
    <div class="page_content-administer">
        <table class="page_content-table">
            <tr>
                <th><span>名前</span></th>
                <th><span>勤務開始</span></th>
                <th><span>勤務終了</span></th>
                <th><span>休憩時間</span></th>
                <th><span>勤務時間</span></th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->work_Start }}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
             @endforeach
        </table>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="paginate">
        {{ $users->links() }}
    </div>
</div>
@endsection