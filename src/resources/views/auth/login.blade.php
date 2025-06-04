@extends('layouts.app')

@section('content')
<h2>ログイン</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf

    <label>メールアドレス
        <input type="email" name="email" required>
        @error('email')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>パスワード
        <input type="password" name="password" required>
        @error('password')<div class="error">{{ $message }}</div>@enderror
    </label>

    <button type="submit">ログイン</button>
    <p><a href="/register">アカウント作成はこちら</a></p>
</form>
@endsection
