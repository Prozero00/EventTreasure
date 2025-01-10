@extends('backend.layouts.app')

@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Create New Message</h1>

    <form action="{{ route('messagesBackend.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', isset($event) ? $event->name : '') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', isset($event) ? $event->email : '') }}" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" required>{{ old('messages', isset($event) ? $event->messages : '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Save Message</button>
    </form>
</div>
@endsection