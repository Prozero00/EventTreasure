<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Messages;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $price = $request->get('price');
        $location = $request->get('location');
        $keyword = $request->get('keyword');

        // Build the query
        $query = Event::query();

        if ($keyword) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->keyword . '%')
                      ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }
        if ($price) {
            $query->where('price', '<=', $price);
        }

        if ($location = $request->input('location')) {
            $query->where(function ($query) use ($location) {
                $query->where('location', 'like', '%' . $location . '%');
            });
        }
        

        // Get filtered events
        $events = $query->get();

        return view('frontend.event', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Exclude _token from the input
        //  $data = $request->except('_token');

        Messages::create($request->all());

        return redirect()->back()->with('success', 'Message sended!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id); // Fetch the event or show 404 if not found
        return view('frontend.eventDetails', [
            'event' => $event,
            'user' => auth() // Pass the authenticated user (if any)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
