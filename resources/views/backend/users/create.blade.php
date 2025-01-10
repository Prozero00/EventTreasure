@extends('backend.layouts.app')

@section('content')
<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Create User</h1>

    <form action="{{ route('usersBackend.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Admin</option>
                <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>User</option>
            </select>

        </div>

        <button type="submit" class="btn btn-primary">Create User</button>
    </form>
</div>
@endsection