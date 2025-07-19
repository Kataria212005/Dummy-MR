<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdminController extends Controller
{
    // Show all users
    public function index()
    {
        // Only show users with role 'admin' (or add superadmin if you want)
        $users = User::whereIn('role', ['admin', 'superadmin'])->get();

        return view('superAdmin', compact('users'));
    }

    // Show add user form
    public function create()
    {
        return view('layouts.addUser');
    }

    // Store a new admin
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('superadmin.index')->with('success', 'Admin added successfully.');
    }

    // Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->role !== 'superadmin') {
            $user->delete();
        }
        return redirect()->back()->with('success', 'User deleted.');
    }
}