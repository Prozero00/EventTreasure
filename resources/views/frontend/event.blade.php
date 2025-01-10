@extends('frontend.layouts.main')
@section('navAb','active')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Event List</h1>

<!-- Filter and Sort Form -->
 <div class="text-center ">
    <form method="GET" action="{{ route('events') }}" class="mb-4">
    <div class="row g-3 align-items-center">
        <div class="col-md-3">
            <input 
                type="text" 
                name="keyword" 
                class="form-control" 
                placeholder="Search by name or description" 
                value="{{ request('keyword') }}">
        </div>
        <div class="col-md-2">
            <input 
                type="number" 
                name="price" 
                class="form-control" 
                placeholder="Max Price" 
                value="{{ request('price') }}">
        </div>
        <div class="col-md-3">
            <input 
                type="text" 
                name="location" 
                class="form-control" 
                placeholder="Location" 
                value="{{ request('location') }}">
        </div>
        <div class="col-md-2">
            <select name="sort" class="form-select">
                <option value="">Sort By</option>
                <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price</option>
                <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Date</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="direction" class="form-select">
                <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">
                <i class="mdi mdi-filter-variant"></i> Apply Filters
            </button>
            <a href="{{ route('events') }}" class="btn btn-secondary">
                <i class="mdi mdi-refresh"></i> Reset
            </a>
        </div>
    </div>
</form>
 </div>





    <!-- Events List -->
    <div class="row">
        @foreach ($events as $event)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset($event->image) }}" class="card-img-top" alt="{{ $event->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->name }}</h5>
                    <p class="card-text">Price: ${{ $event->price }}</p>
                    <p class="card-text">Date: {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</p>
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