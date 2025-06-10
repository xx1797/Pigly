@extends('layouts.app')

@section('content')
<div class="form-card">
  <h1 class="form-title">PiGLy<br>初期体重登録</h1>
  <form method="POST" action="{{ route('register.step2.store') }}">
    @csrf

    <label>現在の体重 (kg)
      <input type="number" step="0.1" name="current_weight" value="{{ old('current_weight') }}">
      @error('current_weight')<div class="text-danger">{{ $message }}</div>@enderror
    </label>

    <label>目標の体重 (kg)
      <input type="number" step="0.1" name="target_weight" value="{{ old('target_weight') }}">
      @error('target_weight')<div class="text-danger">{{ $message }}</div>@enderror
    </label>

    <button class="btn-pink">アカウント作成</button>
  </form>
</div>
@endsection
