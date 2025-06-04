@extends('layouts.app')

@section('content')
<h2>体重管理画面</h2>

<p>ようこそ、{{ Auth::user()->name }}さん</p>

<form method="GET" action="/weight_logs/search">
    <label>開始日 <input type="date" name="start_date"></label>
    <label>終了日 <input type="date" name="end_date"></label>
    <button type="submit">検索</button>
</form>

@if(session('success'))
<p style="color: green">{{ session('success') }}</p>
@endif

<table>
    <thead>
        <tr>
            <th>日付</th>
            <th>体重</th>
            <th>カロリー</th>
            <th>運動</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $log)
        <tr>
            <td>{{ $log->date }}</td>
            <td>{{ $log->weight }}kg</td>
            <td>{{ $log->calories }}cal</td>
            <td>{{ $log->exercise_time }}</td>
            <td>
                <a href="/weight_logs/{{ $log->id }}">詳細</a>
                <a href="/weight_logs/{{ $log->id }}/update">編集</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $logs->links() }}

<a href="/weight_logs/create" role="button">＋ 新規登録</a>
<a href="/wight_logs/goal_setting" role="button">目標体重変更</a>
@endsection
