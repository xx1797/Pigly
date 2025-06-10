@extends('layouts.app')

@section('content')
<div class="form-card">
  <h1 class="form-title">PiGLy<br>新規会員登録</h1>
  <form method="POST" action="{{ route('register.store') }}">
    @csrf

    <label>お名前
      <input type="text" name="name" value="{{ old('name') }}">
      @error('name')<div class="text-danger">{{ $message }}</div>@enderror
    </label>

    <label>メールアドレス
      <input type="email" name="email" value="{{ old('email') }}">
      @error('email')<div class="text-danger">{{ $message }}</div>@enderror
    </label>

    <label>パスワード
      <input type="password" name="password">
      @error('password')<div class="text-danger">{{ $message }}</div>@enderror
    </label>

    <button class="btn-pink">次に進む</button>
    <p style="text-align:center; margin-top:1rem;">
      <a href="{{ route('login') }}">ログインはこちら</a>
    </p>
  </form>
</div>
@endsection

