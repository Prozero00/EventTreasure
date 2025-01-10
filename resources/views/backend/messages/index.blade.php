@extends('backend.layouts.app')
@section('navAb','active')

@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Messages</h1>
    <a href="{{ route('messagesBackend.create') }}" class="btn btn-primary">Create New Event</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Sender</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;
            @endphp

            @foreach ($messages as $event)
            <tr>
                <td>{{ $i++ }}</td> <!-- Increment the counter for each row -->
                <td>{{ $event->name }}</td>
                <td>{{ $event->email }}</td>
                <td>{{ $event->message }}</td>
                <td>
                    <a href="{{ route('messagesBackend.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('messagesBackend.destroy', $event->id) }}" method="POST" style="display:inline;">
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