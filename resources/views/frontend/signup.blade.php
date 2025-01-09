@extends('frontend.layouts.main')
@section('navAb','active')

@section('content')
<main>
  <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <form class="border p-4 shadow-sm bg-white rounded" style="max-width: 600px;
      width: 100%;" method="POST" action="{{ route('register.post') }}">
      @csrf

      @session('error')
      <div class="alert alert-danger" role="alert">
        {{ $value }}
      </div>
      @endsession
      <h1 class="text-center mb-4"><strong>Sign Up</strong></h1>

      <div class="row gy-2 overflow-hidden">
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="name@example.com" required>
            <label for="name" class="form-label">{{ __('Name') }}</label>
          </div>
          @error('name')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
          </div>
          @error('email')
          <span class="text-danger" role="alert">
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
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" value="" placeholder="password_confirmation" required>
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
          </div>
          @error('password_confirmation')
          <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
        <div class="col-12">
          <div class="d-grid my-3">
            <button class="btn btn-primary btn-lg" style="width: 100%;
    padding: 10px;
    background-color: #03045e;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;" type="submit">{{ __('Register') }}</button>
          </div>
        </div>
        <div class="col-12">
          <p class="m-0 text-secondary text-center">Have an account? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Sign in</a></p>
        </div>
      </div>
    </form>
  </div>
</main>
@endsection