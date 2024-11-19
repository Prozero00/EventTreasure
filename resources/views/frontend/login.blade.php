@extends('frontend.layouts.main')
@section('navAb','active')

@section('content')
<main>
<div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
    <form class="border p-4 shadow-sm bg-white rounded" style="max-width: 600px;
      width: 100%;">
      <h2 class="text-center mb-4">Login</h2>
      
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Enter your username" required>
      </div>
      
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
      </div>

      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember me</label>
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>

      <div class="mt-3 text-center">
        <a href="#">Forgot password?</a> | <a href="#">Sign Up</a>
      </div>
    </form>
  </div>
</main>
@endsection