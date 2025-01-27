<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    try {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users',
            'phone_number' => 'required',
            'role'       => 'required',
            'password'   => 'required|min:6',
        ]);

        // Debugging step to check incoming data
        // dd($request->all()); 

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone_number' => $request->phone_number,
            'role'       => $request->role,
            'password'   => Hash::make($request->password),
        ]);

        auth()->login($user);


    } catch (\Exception $e) {
        return redirect()->back()->with('error', $e->getMessage())->withInput();
    }
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        // Redirect based on user role
        $user = Auth::user();

        if ($user->role === 'super-admin') {
            return redirect()->route('superadmin.dashboard');
        } elseif ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } 
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}

    public function showLogin()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
