<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesBackendController extends Controller
{
    // Display a listing of messages
    public function index()
    {
        $messages = Messages::all();  // Fetch all messages
        return view('backend.messages.index', compact('messages'));
    }

    // Show the form for creating a new message
    public function create()
    {
        return view('backend.messages.create');
    }

    // Store a newly created message in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Messages::create($request->all());

        return redirect()->route('messagesBackend.index')->with('success', 'Message sent successfully!');
    }

    // Display the specified message
    public function show(Messages $message)
    {
        return view('backend.messages.show', compact('messages'));
    }

    public function edit(string $id)
    {
        return view('backend.messages.edit', [
            'messages' => Messages::find($id),
        ]);
    }

    // Update the specified message in the database
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
    
        // Fetch the message by ID
        $message = Messages::findOrFail($id);
    
        // Prepare data for updating
        $data = $request->all();
    
        // Update the message with the new data
        $message->update($data);
    
        // Redirect back to the messages index page with success message
        return redirect()->route('messagesBackend.index')->with('success', 'message updated successfully!');
    }

    // Remove the specified message from the database
    public function destroy(string $id)
    {
        Messages::destroy($id);

        return redirect()->route('messagesBackend.index')->with('success', 'Message deleted successfully!');
    }
}

