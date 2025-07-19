<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Support\Facades\Auth;    
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller {
    // Show all events
    public function index() {
        $events = Event::all();
        return view('manageEvents', compact('events'));
    }

    // Store a new event
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|string|max:255',
        ]);

        Event::create($request->all());

        return redirect()->back()->with('success', 'Event added successfully.');
    }

    // Delete an event
    public function destroy($id) {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->back()->with('success', 'Event deleted successfully.');
    }

     public function upcoming(Request $request) {
        $sort = $request->input('sort', 'recent');
        $search = $request->input('search');
        
        $query = Event::where('date', '>=', now());
        
        // Apply search if provided
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        // Apply sorting
        if ($sort === 'oldest') {
            $query->orderBy('date', 'asc');
        } else {
            $query->orderBy('date', 'desc');
        }
        
        $events = $query->paginate(9);
        $userId = Auth::id();

        // Get event IDs user is already registered for
        $registeredEventIds = Registration::where('user_id', $userId)->pluck('event_id')->toArray();

        return view('events.upcoming', compact('events', 'registeredEventIds'));
    }

    // Register logged-in user for event
    public function register($eventId) {
        $userId = Auth::id();

        $exists = Registration::where('user_id', $userId)
            ->where('event_id', $eventId)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'You are already registered for this event.');
        }

        Registration::create([
            'user_id' => $userId,
            'event_id' => $eventId,
        ]);

        return redirect()->back()->with('success', 'Successfully registered for event.');
    }
public function registeredEvents()
{
    $userId = Auth::id();
    $registeredEvents = Event::whereHas('registrations', function($query) use ($userId) {
        $query->where('user_id', $userId);
    })->get();
    
    return view('events.registered', compact('registeredEvents'));
}

public function attendedEvents()
{
    $userId = Auth::id();
    $attendedEvents = Event::whereHas('registrations', function($query) use ($userId) {
        $query->where('user_id', $userId)
              ->whereHas('attendance', function($q) {
                  $q->where('present', true);
              });
    })->get();
    
    return view('events.attended', compact('attendedEvents'));
}

public function show(Event $event)
{
    return view('events.show', compact('event'));
}

// Display past events
public function pastEvents(Request $request)
{
    $sort = $request->input('sort', 'recent');
    $search = $request->input('search');
    
    $query = Event::where('date', '<', now());
    
    // Apply search if provided
    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }
    
    // Apply sorting
    if ($sort === 'oldest') {
        $query->orderBy('date', 'asc');
    } else {
        $query->orderBy('date', 'desc');
    }
    
    $pastEvents = $query->paginate(9);
    
    return view('events.past', compact('pastEvents'));
}

// Display events the user has participated in
public function participatedEvents(Request $request)
{
    $filter = $request->input('filter');
    $search = $request->input('search');
    
    $query = Registration::where('user_id', Auth::id())
                ->with(['event', 'attendance']);
    
    // Apply filters if provided
    if ($filter === 'attended') {
        $query->whereHas('attendance', function($q) {
            $q->where('present', true);
        });
    } elseif ($filter === 'not-attended') {
        $query->whereDoesntHave('attendance', function($q) {
            $q->where('present', true);
        });
    }
    
    // Apply search if provided
    if ($search) {
        $query->whereHas('event', function($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('location', 'like', "%{$search}%");
        });
    }
    
    $registrations = $query->orderBy('created_at', 'desc')->paginate(10);
    
    return view('events.participated', compact('registrations'));
}
}


