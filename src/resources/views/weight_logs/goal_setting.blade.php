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
@extends('layouts.dashboard')

@section('content')
    <h1>目標体重の設定</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('weight_logs.goal_setting.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="target_weight">目標体重（kg）:</label><br>
        <input type="text" name="target_weight" value="{{ old('target_weight', $target->target_weight ?? '') }}">
        @error('target_weight')
            <p style="color: red;">{{ $message }}</p>
        @enderror

        <br><br>
        <button type="submit">更新</button>
    </form>

    <br>
    <a href="{{ route('weight_logs.index') }}">← 戻る</a>
@endsection

</body>
</html>