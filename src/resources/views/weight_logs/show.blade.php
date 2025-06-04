@extends('layouts.app')

@section('content')
<h2>体重記録 詳細</h2>

<ul>
    <li>日付：{{ $log->date }}</li>
    <li>体重：{{ $log->weight }}kg</li>
    <li>摂取カロリー：{{ $log->calories }}cal</li>
    <li>運動時間：{{ $log->exercise_time }}</li>
    <li>運動内容：{{ $log->exercise_content }}</li>
</ul>

<a href="/weight_logs" role="button">戻る</a>
<a href="/weight_logs/{{ $log->id }}/update" role="button">編集</a>
@endsection
