@extends('layouts.app')

@section('content')
<h2>体重記録 編集</h2>

<form method="POST" action="/weight_logs/{{ $log->id }}">
    @csrf
    @method('PUT')

    <label>日付
        <input type="date" name="date" value="{{ old('date', $log->date) }}">
        @error('date')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>体重
        <input type="text" name="weight" value="{{ old('weight', $log->weight) }}">
        @error('weight')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>摂取カロリー
        <input type="number" name="calories" value="{{ old('calories', $log->calories) }}">
        @error('calories')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>運動時間
        <input type="time" name="exercise_time" value="{{ old('exercise_time', $log->exercise_time) }}">
        @error('exercise_time')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>運動内容
        <textarea name="exercise_content">{{ old('exercise_content', $log->exercise_content) }}</textarea>
        @error('exercise_content')<div class="error">{{ $message }}</div>@enderror
    </label>

    <button type="submit">更新</button>
</form>

<form method="POST" action="/weight_logs/{{ $log->id }}">
    @csrf
    @method('DELETE')
    <button type="submit" style="background: crimson; color: white;">削除</button>
</form>

<a href="/weight_logs" role="button">戻る</a>
@endsection
