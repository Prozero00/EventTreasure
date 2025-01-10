@extends('backend.layouts.app')

@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Create New Event</h1>

    <form action="{{ route('eventsBackend.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Event Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', isset($event) ? $event->name : '') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Event Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', isset($event) ? $event->description : '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Event Price</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', isset($event) ? $event->price : '') }}" required>
        </div>

        <div class="form-group">
            <label for="location">Event Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', isset($event) ? $event->location : '') }}" required>
        </div>

        <div class="form-group">
            <label for="date">Event Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', isset($event) ? $event->date : '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Event</button>
    </form>
</div>
@endsection