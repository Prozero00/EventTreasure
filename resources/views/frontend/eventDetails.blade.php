@extends('frontend.layouts.main')
@section('navAb','active')

@section('content')
<div class="container my-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h1>{{ $event->name }}</h1>
    <div class="text-center">
        <img src="{{ asset($event->image) }}" class="img-fluid mb-4" alt="{{ $event->name }}" style="max-height: 400px; object-fit: cover;">
    </div>

    <p><strong>Price:</strong> ${{ $event->price }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>
    <p><strong>Description:</strong> {{ $event->description }}</p>

    @if(auth()->check())
    <!-- Reservation Form -->
    <div class="container" style="padding:5% 20%;">
        <h2 class="mt-5">Reserve Your Spot</h2>

        <form method="POST" action="{{ route('reservations.store') }}">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
            </div>
            <div class="mb-3">
                <label for="seats" class="form-label">Number of Seats</label>
                <input type="number" name="seats" id="seats" class="form-control" min="1" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" style="max-width: 500px;">Reserve Now</button>
            </div>
        </form>
        @else
        <div class="alert alert-warning mt-4">
            Please <a href="{{ route('login') }}">log in</a> to reserve your spot.
        </div>
        @endif
    </div>

</div>
@endsection