@extends('layouts')

@section('content')
<div class="login">
  <div class="row">
    <div class="col-12">
      <h1 class="form-header mb-3 text-center">ЛИЧНЫЙ КАБИНЕТ{{old('name')}}</h1>
      <form method="POST" action="{{ route('authenticate') }}">
        @csrf
        <div class="mb-3">
          {{-- <input id="name" type="text" class="form-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Имя пользователя" class="form-input"> --}}
          <select class="form-select" name="name">
            <option value="" disabled selected>Имя пользователя</option>
            @foreach($users as $user)
            <option value="{{$user->name}}" {{ $user->name == old('name') ? ' selected' : '' }}>{{$user->name}}</option>
            @endforeach
          </select>
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="mb-3">
          <input id="password" type="password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Пароль">
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        @error('error')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="">
          <button type="submit" class="form-btn form-btn-red static">
            Вход
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

@endsection
