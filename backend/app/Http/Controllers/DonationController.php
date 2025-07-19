<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'location' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
            'payment_mode' => 'required|string|in:online,cash,cheque,other',
            'transaction_id' => $request->payment_mode === 'online' ? 'required|string|max:255' : 'nullable|string|max:255',
            'message' => 'nullable|string',
            'is_anonymous' => 'nullable|boolean',
        ]);

        // Store the donation data in the database
        $donation = Donation::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'amount' => $request->amount,
            'payment_mode' => $request->payment_mode,
            'transaction_id' => $request->transaction_id,
            'message' => $request->message,
            'is_anonymous' => $request->has('is_anonymous'),
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Thank you for your donation!');
    }

    // Add this new method for admin view of donations
    public function showDonations()
    {
        $donations = Donation::with('user')
                           ->orderBy('created_at', 'desc')
                           ->get();
                           
        return view('admin', compact('donations'));
    }
}