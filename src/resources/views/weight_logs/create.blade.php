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
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h2 style="color: #DA7BC2; font-weight: bold; text-align: center;">Weight Log 登録</h2>

    <form method="POST" action="{{ route('weight_logs.store') }}">
        @csrf

        <div class="mb-3">
            <label for="date">日付</label>
            <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
            @error('date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="weight">体重 (kg)</label>
            <input type="number" name="weight" step="0.1" value="{{ old('weight') }}">
            @error('weight')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="calories">摂取カロリー (kcal)</label>
            <input type="number" name="calories" value="{{ old('calories') }}">
            @error('calories')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exercise_time">運動時間 (HH:MM)</label>
            <input type="time" name="exercise_time" value="{{ old('exercise_time') }}">
            @error('exercise_time')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exercise_content">運動内容</label>
            <textarea name="exercise_content" rows="3">{{ old('exercise_content') }}</textarea>
            @error('exercise_content')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('weight_logs.index') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary" style="background-color: #DA7BC2; border: none;">登録</button>
        </div>
    </form>
</div>
@endsection
</body>
</html>