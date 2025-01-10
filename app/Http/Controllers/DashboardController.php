<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function dashboard()
    {
        // Count the total number of users and events
        $usersCount = User::count();
        $eventsCount = Event::count();

        // Count the number of events that are scheduled after the current date
        $upcomingEventCount = Event::where('date', '>=', now())->count();
        $eventsWithReservations = Event::whereHas('reservations')->get();
        $eventsWithSeats = $eventsWithReservations->map(function($event) {
            $event->total_reserved_seats = $event->reservations->sum('seats');
            return $event;
        });
    
        return view('backend.dashboard', compact('usersCount', 'eventsCount', 'upcomingEventCount', 'eventsWithSeats'));
    }
}
