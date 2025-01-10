@extends('backend.layouts.app')
@section('navAb','active')

@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Events</h1>
    <a href="{{ route('eventsBackend.create') }}" class="btn btn-primary">Create New Event</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Event Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp

            @foreach ($events as $event)
            <tr>
                <td>{{ $i++ }}</td> <!-- Increment the counter for each row -->
                <td>{{ $event->name }}</td>
                <td>{{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->price }}</td>
                <td>
                    <a href="{{ route('eventsBackend.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('eventsBackend.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection