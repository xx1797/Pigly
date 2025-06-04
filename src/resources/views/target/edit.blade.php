@extends('layouts.app')

@section('content')
<h2>目標体重の変更</h2>

<form method="POST" action="/wight_logs/goal_setting">
    @csrf
    @method('PUT')

    <label>目標体重 (kg)
        <input type="text" name="target_weight" value="{{ old('target_weight', $target->target_weight ?? '') }}">
        @error('target_weight')<div class="error">{{ $message }}</div>@enderror
    </label>

    <button type="submit">更新</button>
    <a href="/weight_logs" role="button">戻る</a>
</form>
@endsection
