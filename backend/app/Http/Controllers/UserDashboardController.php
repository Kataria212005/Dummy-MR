<?php

namespace App\Http\Controllers;

use App\Models\Registration;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class UserDashboardController extends Controller
{

public function index()
{
    $upcomingEvents = Event::where('date', '>=', Carbon::now())
                          ->orderBy('date', 'asc')
                          ->get();
    
    $registeredEventIds = Registration::where('user_id', Auth::id())
                                    ->pluck('event_id')
                                    ->toArray();

    $registrations = Registration::where('user_id', auth()->id())
                               ->with(['event', 'attendance'])  // Include attendance relationship
                               ->get();
    
    $pastEvents = Event::where('date', '<', Carbon::now())
                      ->orderBy('date', 'desc')
                      ->limit(3)
                      ->get();
                               
    return view('dashboard', compact('upcomingEvents', 'registeredEventIds', 'registrations', 'pastEvents'));
}
}