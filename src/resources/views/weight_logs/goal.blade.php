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
  <main>
    @yield('content')
  </main>
</body>
</html>
<body>
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 500px; margin: 0 auto; background: #fff; padding: 2rem; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; color: #DA7BC2; font-weight: bold;">目標体重設定</h2>

    <form method="POST" action="{{ route('weight_logs.goal_setting.update') }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="target_weight">目標の体重 (kg)</label>
            <input type="number" name="target_weight" step="0.1"
                   value="{{ old('target_weight', auth()->user()->weightTarget?->target_weight) }}">
            @error('target_weight')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('weight_logs.index') }}" class="btn btn-secondary">戻る</a>
            <button type="submit" class="btn btn-primary" style="background-color: #DA7BC2; border: none;">更新</button>
        </div>
    </form>
</div>
@endsection
</body>
</html>