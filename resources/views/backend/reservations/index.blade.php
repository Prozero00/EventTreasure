@extends('backend.layouts.app')

@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Reservations</h1>

    <a href="{{ route('reservationsBackend.create') }}" class="btn btn-primary mb-3">Create Reservation</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Event</th>
                <th>Name</th>
                <th>Email</th>
                <th>Seats</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $index => $reservation)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $reservation->event->name }}</td> <!-- Display event name -->
                    <td>{{ $reservation->name }}</td>
                    <td>{{ $reservation->email }}</td>
                    <td>{{ $reservation->seats }}</td>
                    <td>
                        <a href="{{ route('reservationsBackend.edit', $reservation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('reservationsBackend.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
