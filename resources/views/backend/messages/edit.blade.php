@extends('backend.layouts.app')

@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Edit Message</h1>

    <form action="{{ route('messagesBackend.update', $messages->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Message Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $messages->name }}" required>
    </div>

<div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $messages->email }}" required>
    </div>

    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="3" required>{{ $messages->message }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Message</button>
</form>
</div>
@endsection
