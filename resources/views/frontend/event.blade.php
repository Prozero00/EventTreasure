@extends('frontend.layouts.main')
@section('navAb','active')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Event List</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('events') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="keyword" class="form-control" placeholder="Search by name or description" value="{{ request('keyword') }}">
            </div>
            <div class="col-md-3">
                <input type="number" name="price" class="form-control" placeholder="Max Price" value="{{ request('price') }}">
            </div>
            <div class="col-md-3">
                <input type="text" name="location" class="form-control" placeholder="Location" value="{{ request('location') }}">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Events List -->
    <div class="row">
        @foreach ($events as $event)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset($event->image) }}" class="card-img-top" alt="{{ $event->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <p class="card-text">Price: ${{ $event->price }}</p>
                    <p class="card-text">Location: {{ $event->location }}</p>
                    <div class="text-center">
                        <a href="{{ route('event.show', $event->id) }}" class="btn btn-primary" style="width: 200px;">Details</a>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection