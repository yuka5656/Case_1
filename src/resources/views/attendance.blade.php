@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attend.css') }}">
@endsection

@section('content')
<div class="page_content">
    <div class="page_content-date">
        <form action="/attendance/yesterday" method="get">
            <button><</button>
        </form>
            <a href="/attendance?date=20240503">
                2024-05-03
            </a>
        <form action="/attendance/tomorrow" method="get">
            <button>></button>
        </form>
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
            @foreach ($attendances as $attendance)
            <tr>
                <td>{{ $attendance->name }}</td>
                <td>{{ $attendance->work_Start }}</td>
                <td>{{ $attendance->work_End }}</td>
                <td></td>
                <td></td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://cdn.tailwindcss.com"></script>
    <div class="paginate">
        {{ $attendances->links() }}
    </div>
</div>
@endsection