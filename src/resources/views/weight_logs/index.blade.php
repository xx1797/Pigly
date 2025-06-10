<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pigly</title>
  <link href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to bottom right, #fbd3e9, #bbd2c5);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
    }
    .form-card {
      background-color: #fff;
      border-radius: 20px;
      padding: 2.5rem 2rem;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .form-title {
      text-align: center;
      color: #DA7BC2;
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 1.5rem;
    }
    .btn-pink {
      background-color: #DA7BC2;
      color: white;
      border: none;
    }
    .text-danger {
      color: red;
      font-size: 0.9rem;
    }
  </style>
<body>
@extends('layouts.dashboard')

@section('content')
<h2>体重管理</h2>

{{-- 目標体重・現在体重表示 --}}
@php
    $latest = $logs->first();
    $currentWeight = $latest?->weight ?? '-';
    $goalWeight = auth()->user()->weightTarget?->target_weight ?? '-';
@endphp

<div class="mb-4">
    <p>現在体重：<strong>{{ $currentWeight }} kg</strong></p>
    <p>目標体重：<strong>{{ $goalWeight }} kg</strong></p>
    @if(is_numeric($goalWeight) && is_numeric($currentWeight))
        <p>あと <strong>{{ number_format($currentWeight - $goalWeight, 1) }} kg</strong> 減らしましょう！</p>
    @endif
</div>

{{-- 検索フォーム --}}
<form method="GET" action="{{ route('weight_logs.search') }}" class="grid mb-4">
    <input type="date" name="start_date" placeholder="開始日" value="{{ request('start_date') }}">
    <input type="date" name="end_date" placeholder="終了日" value="{{ request('end_date') }}">
    <button type="submit">検索</button>
    @if(request()->has('start_date') || request()->has('end_date'))
        <a href="{{ route('weight_logs.index') }}" role="button" class="contrast">リセット</a>
    @endif
</form>

@if($logs->count())
<table>
    <thead>
        <tr>
            <th>日付</th>
            <th>体重</th>
            <th>カロリー</th>
            <th>運動時間</th>
            <th>運動内容</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach($logs as $log)
        <tr>
            <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
            <td>{{ $log->weight }} kg</td>
            <td>{{ $log->calories ?? '-' }} kcal</td>
            <td>{{ $log->exercise_time ?? '-' }}</td>
            <td>{{ $log->exercise_content ?? '-' }}</td>
            <td>
                <a href="{{ route('weight_logs.edit', $log->id) }}">✏️</a>
                <form action="{{ route('weight_logs.destroy', $log->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" style="background:transparent; border:none; color:red;">🗑️</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $logs->links() }}
@else
    <p>データがありません。</p>
@endif

{{-- 追加ボタン --}}
<div class="mt-4">
    <a href="{{ route('weight_logs.create') }}" role="button">➕ データを追加</a>
</div>
@endsection
</body>
</html>
