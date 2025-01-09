<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'seats' => 'required|integer|min:1',
        ]);

        // Exclude _token from the input
         $data = $request->except('_token');

        Reservation::create($request->all());

        return redirect()->back()->with('success', 'Reservation successful! Thank you for reserving.');
    }
}
