@extends('layouts.app')

@section('content')
<h2>会員登録</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf

    <label>お名前
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>メールアドレス
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email')<div class="error">{{ $message }}</div>@enderror
    </label>

    <label>パスワード
        <input type="password" name="password" required>
        @error('password')<div class="error">{{ $message }}</div>@enderror
    </label>

    <button type="submit">次に進む</button>
    <p><a href="/login">ログインはこちら</a></p>
</form>
@endsection
