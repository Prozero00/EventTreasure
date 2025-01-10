<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventBackendController extends Controller
{
    // Display a listing of events
    public function index()
    {
        $events = Event::all();  // Fetch all events
        return view('backend.events.index', compact('events'));
    }

    // Show the form for creating a new event
    public function create()
    {
        return view('backend.events.create');
    }

    // Store a newly created event in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        // Prepare data for storing
        $data = $request->all();

        // Create the event in the database
        Event::create($data);

        // Redirect back with success message
        return redirect()->route('eventsBackend.index')->with('success', 'Event created successfully!');
    }

    // Display the specified event
    public function show(Event $event)
    {
        return view('backend.events.show', compact('event'));
    }

    // Show the form for editing the specified event
    public function edit(string $id)
    {
        return view('backend.events.edit', [
            'event' => Event::find($id),
        ]);
    }

    // Update the specified event in the database
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
        ]);
    
        // Fetch the event by ID
        $event = Event::findOrFail($id);
    
        // Prepare data for updating
        $data = $request->all();
    
        // Update the event with the new data
        $event->update($data);
    
        // Redirect back to the events index page with success message
        return redirect()->route('eventsBackend.index')->with('success', 'Event updated successfully!');
    }
    
    // Remove the specified event from the database
    public function destroy(string $id)
    {
        Event::destroy($id);

        return redirect()->route('eventsBackend.index')->with('success', 'Event deleted successfully!');
    }
}
