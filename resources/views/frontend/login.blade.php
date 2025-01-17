@extends('frontend.layouts.main')
@section('navAb','active')

@section('content')
<main>
  <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">

    <form class="border p-4 shadow-sm bg-white rounded" style="max-width: 600px;
      width: 100%;" method="POST" action="{{ route('login.post') }}">
      <h1 class="text-center mb-4"><strong>Login</strong></h1>
      @csrf

      @session('error')
      <div class="alert alert-danger" role="alert">
        {{ $value }}
      </div>
      @endsession



      <div class="row gy-2 overflow-hidden">
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
          </div>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
            <label for="password" class="form-label">{{ __('Password') }}</label>
          </div>
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="col-12">
          <div class="d-flex gap-2 justify-content-between">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" name="rememberMe" id="rememberMe">
              <label class="form-check-label text-secondary" for="rememberMe">
                Keep me logged in
              </label>
            </div>
            <a href="#!" class="link-primary text-decoration-none">{{ __('forgot password?') }}</a>
          </div>
        </div>
        <div class="col-12">
          <div class="d-grid my-3">
            <button class="btn btn-lg" style="width: 100%;
    padding: 10px;
    background-color: #03045e;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;" type="submit">{{ __('Login') }}</button>
          </div>
        </div>
        <div class="col-12">
          <p class="m-0 text-secondary text-center">Don't have an account? <a href="{{ route('register') }}" class="link-primary text-decoration-none">Sign up</a></p>
        </div>
      </div>
    </form>
  </div>
</main>
@endsection