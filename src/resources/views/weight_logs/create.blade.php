@extends('layouts.app')

@section('content')
<h2>体重データ登録</h2>

<form method="POST" action="/weight_logs">
    @csrf

    <label>日付
        <input type="date" name="date" value="{{ old('date', now()->toDateString()) }}">
        @error('date')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>体重 (kg)
        <input type="text" name="weight" value="{{ old('weight') }}">
        @error('weight')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>摂取カロリー
        <input type="number" name="calories" value="{{ old('calories') }}">
        @error('calories')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>運動時間
        <input type="time" name="exercise_time" value="{{ old('exercise_time') }}">
        @error('exercise_time')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>運動内容
        <textarea name="exercise_content" rows="3">{{ old('exercise_content') }}</textarea>
        @error('exercise_content')<div class="error">{{ $message }}</div>@enderror
    </label>

    <button type="submit">登録</button>
    <a href="/weight_logs" role="button">戻る</a>
</form>
@endsection
