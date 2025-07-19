<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Show list of all events (used when no $event is passed to the Blade file)
    public function index()
    {
        $events = Event::all();
        return view('attendance', compact('events'));
    }

    // Show attendance for a specific event
    public function show($eventId)
    {
        $event = Event::findOrFail($eventId);

        $registrations = Registration::with(['user', 'attendance'])
            ->where('event_id', $eventId)
            ->get();

        return view('attendance', compact('event', 'registrations'));
    }

    // Update attendance for a specific event
    public function update(Request $request, $eventId)
    {
        foreach ($request->input('attendance', []) as $registrationId => $present) {
            Attendance::updateOrCreate(
                ['registration_id' => $registrationId],
                ['present' => $present]
            );
        }

        return redirect()->back()->with('success', 'Attendance updated.');
    }
}
