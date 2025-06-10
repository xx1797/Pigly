@extends('layouts.app')

@section('content')
<div class="form-card">
  <h1 class="form-title">PiGLy<br>ログイン</h1>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <label>メールアドレス
      <input type="email" name="email" value="{{ old('email') }}">
      @error('email')<div class="text-danger">{{ $message }}</div>@enderror
    </label>

    <label>パスワード
      <input type="password" name="password">
      @error('password')<div class="text-danger">{{ $message }}</div>@enderror
    </label>

    <button class="btn-pink">ログイン</button>
    <p style="text-align:center; margin-top:1rem;">
      <a href="{{ route('register.step1') }}">アカウント作成はこちら</a>
    </p>
  </form>
</div>
@endsection
