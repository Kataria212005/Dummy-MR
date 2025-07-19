<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternshipRegistration;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'position' => 'required|string',
            'why' => 'required|string',
            'skills' => 'nullable|string',
        ]);

        // If user is logged in, check by user_id
        if (Auth::check()) {
            $user_id = Auth::id();
            if (InternshipRegistration::where('user_id', $user_id)->exists()) {
                return redirect()->back()->with('error', 'You have already applied with this account. (Debug: user_id=' . $user_id . ')');
            }
            $validated['user_id'] = $user_id;
        } else {
            // If guest, check by email
            if (InternshipRegistration::where('email', $validated['email'])->exists()) {
                return redirect()->back()->with('error', 'You have already applied with this email. (Debug: email=' . $validated['email'] . ')');
            }
        }

        InternshipRegistration::create($validated);

        return redirect()->route('opportunities')->with('success', 'Your application has been successfully submitted!');
    }
}