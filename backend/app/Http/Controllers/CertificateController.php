<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Registration;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function generate($registration_id)
    {
        $registration = \App\Models\Registration::with(['user', 'event'])->findOrFail($registration_id);

        // Check if event exists
        if (!$registration->event) {
            return back()->with('error', 'Event not found for this registration.');
        }

        // Get the event date from the related event
        $eventDate = $registration->event->date; // This is from the events table

        $pdf = \PDF::loadView('certificates.volunteer', [
            'user' => $registration->user,
            'event' => $registration->event,
            'certificate_number' => $registration->certificate_number,
            'date' => $eventDate // Pass the event date to the view
        ]);

        $registration->update(['certificate_generated' => true]);

        return $pdf->download("certificate-{$registration->certificate_number}.pdf");
    }

    // Display a list of user's certificates
    public function index()
    {
        $certificates = \App\Models\Registration::where('user_id', auth()->id())
            ->where('certificate_generated', true)
            ->whereHas('event') // Only include certificates with valid events
            ->with(['event'])
            ->orderBy('updated_at', 'desc')
            ->paginate(9);

        return view('certificates.index', compact('certificates'));
    }

    // Download a specific certificate
    public function download($id)
    {
        $registration = \App\Models\Registration::with(['user', 'event'])
            ->where('user_id', auth()->id())
            ->where('id', $id)
            ->where('certificate_generated', true)
            ->firstOrFail();

        $pdf = \PDF::loadView('certificates.volunteer', [
            'user' => $registration->user,
            'event' => $registration->event,
            'certificate_number' => $registration->certificate_number,
            'date' => $registration->event->date
        ]);

        return $pdf->download('certificate-' . $registration->id . '.pdf');
    }

    // View a specific certificate in the browser
    public function view($id)
    {
        $registration = \App\Models\Registration::with(['user', 'event'])
            ->where('user_id', auth()->id())
            ->where('id', $id)
            ->where('certificate_generated', true)
            ->firstOrFail();

        $pdf = \PDF::loadView('certificates.volunteer', [
            'user' => $registration->user,
            'event' => $registration->event,
            'certificate_number' => $registration->certificate_number,
            'date' => $registration->event->date
        ]);

        return $pdf->stream('certificate-' . $registration->id . '.pdf');
    }
}