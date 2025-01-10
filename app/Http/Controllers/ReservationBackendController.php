<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationBackendController extends Controller
{
    // Display a listing of reservations
    public function index()
    {
        $reservations = Reservation::all();  // Fetch all reservations
        return view('backend.reservations.index', compact('reservations'));
    }

    // Show the form for creating a new reservation
    public function create()
    {
        $events = Event::all(); // Fetch all events
        return view('backend.reservations.create', compact('events'));
    }

    // Store a newly created reservation in the database
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'seats' => 'required|numeric',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservationsBackend.index')->with('success', 'Reservation made successfully!');
    }

    // Display the specified reservation
    public function show(Reservation $reservation)
    {
        return view('backend.reservations.show', compact('reservation'));
    }

    public function edit(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $events = Event::all(); // Fetch all events for the dropdown
        return view('backend.reservations.edit', compact('reservation', 'events'));
    }

    // Update the specified event in the database
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'seats' => 'required|numeric',
        ]);

        // Fetch the event by ID
        $reservation = Reservation::findOrFail($id);

        // Prepare data for updating
        $data = $request->all();

        // Update the event with the new data
        $reservation->update($data);

        // Redirect back to the events index page with success message
        return redirect()->route('reservationsBackend.index')->with('success', 'Reservation updated successfully!');
    }

    // Remove the specified event from the database
    public function destroy(string $id)
    {
        Reservation::destroy($id);

        return redirect()->route('reservationsBackend.index')->with('success', 'Reservation deleted successfully!');
    }
}
