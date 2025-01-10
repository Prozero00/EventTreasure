<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserBackendController extends Controller
{
    // Display a listing of users
    public function index()
    {
        $users = User::all();  // Fetch all users
        return view('backend.users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('backend.users.create');
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:0,1',  // Role can only be 0 or 1
        ]);

        // Prepare the data
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        // Create the user
        User::create($data);

        return redirect()->route('usersBackend.index')->with('success', 'User created successfully!');
    }


    // Display the specified user
    public function show(User $user)
    {
        return view('backend.users.show', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit', compact('user'));
    }

    // Update the specified user in the database
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:0,1',
        ]);

        $data = $request->all();
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        } else {
            // Remove the password key from the data if it's empty
            unset($data['password']);
        }


        $user->update($data);

        return redirect()->route('usersBackend.index')->with('success', 'User updated successfully!');
    }

    // Remove the specified user from the database
    public function destroy(string $id)
    {
        User::destroy($id);

        return redirect()->route('usersBackend.index')->with('success', 'Message deleted successfully!');
    }
}
