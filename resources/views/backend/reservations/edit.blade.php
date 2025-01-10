@extends('backend.layouts.app')

@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Edit Reservation</h1>

    <form action="{{ route('reservationsBackend.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="event_id" class="form-label">Event</label>
            <select name="event_id" id="event_id" class="form-control" required>
                <option value="">Select Event</option>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}" {{ $reservation->event_id == $event->id ? 'selected' : '' }}>
                        {{ $event->name }}
                    </option>
                @endforeach
            </select>
            @error('event_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $reservation->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $reservation->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="seats" class="form-label">Seats</label>
            <input type="number" name="seats" id="seats" class="form-control" value="{{ old('seats', $reservation->seats) }}" required>
            @error('seats')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>
@endsection
