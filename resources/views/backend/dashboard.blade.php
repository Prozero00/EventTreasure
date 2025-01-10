@extends('backend.layouts.app')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="row">
        <!-- Users Card -->
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Total Users <i class="mdi mdi-account mdi-24px float-right"></i></h4>
                    <h2 class="mb-5">{{ $usersCount }}</h2>
                </div>
            </div>
        </div>

        <!-- Events Card -->
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-primary card-img-holder">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Total Events <i class="mdi mdi-calendar mdi-24px float-right"></i></h4>
                    <h2 class="mb-5">{{ $eventsCount }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-primary card-img-holder">
                <div class="card-body">
                    <h4 class="font-weight-normal mb-3">Upcoming Event <i class="mdi mdi-calendar mdi-24px float-right"></i></h4>
                    <h2 class="mb-5">{{ $upcomingEventCount }}</h2>
                </div>
            </div>
        </div>

        <h2 style="margin-top: 1vh;">Section title</h2>
        <div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Event Name</th>
                <th scope="col">Date</th>
                <th scope="col">Location</th>
                <th scope="col">Registered Users</th>
                <th scope="col">Total Reserved Seats</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventsWithSeats as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->reservations->count() }}</td>
                    <td>{{ $event->total_reserved_seats }}</td> <!-- Display total reserved seats -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


    </div>
</main>
@endsection