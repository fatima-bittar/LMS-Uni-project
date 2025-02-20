<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users',
            'phone_number' => 'required',
            'role'       => 'required',
            'password'   => 'required|min:6',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone_number' => $request->phone_number,
            'role'       => $request->role,
            'password'   => Hash::make($request->password),
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string',
        ]);
            // If a new password is provided, hash it and update the user
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            // Retain the existing password if none is provided
            unset($validated['password']);
        }

        $user->update($validated);
        return redirect()->route('users.index');
    }

    public function show(User $user) {
        return view('users.show', compact('user'));
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users.index');
    }
}
