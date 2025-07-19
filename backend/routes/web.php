<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Auth\GoogleController;

// Models
use App\Models\Donation;
use App\Models\Contact;
use App\Models\InternshipRegistration;
use App\Models\Event;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', function () {
    return view('homePage');
})->name('home');

// Static Pages
Route::get('/about', function () {
    return view('aboutUs');
})->name('about');

Route::get('/team', [TeamController::class, 'show'])->name('team');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/donateus', function () {
    return view('donateUs');
})->name('donate.page');

Route::get('/donatenow', function () {
    return view('donateNow');
})->name('donate.now');

Route::get('/opportunities', function (Request $request) {
    $alreadyApplied = false;
    if (Auth::check()) {
        $alreadyApplied = InternshipRegistration::where('user_id', Auth::id())->exists();
    } else if ($request->has('email')) {
        $alreadyApplied = InternshipRegistration::where('email', $request->input('email'))->exists();
    }
    return view('opportunities', compact('alreadyApplied'));
})->name('opportunities');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
})->name('login.page');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout.get');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Google Authentication
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

/*
|--------------------------------------------------------------------------
| Form Submission Routes (Public)
|--------------------------------------------------------------------------
*/

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');
Route::post('/register-internship', [RegistrationController::class, 'store'])->name('register.internship');

Route::get('/register-internship', function (Request $request) {
    $alreadyApplied = false;
    if (Auth::check()) {
        $alreadyApplied = InternshipRegistration::where('user_id', Auth::id())->exists();
    } else if ($request->has('email')) {
        $alreadyApplied = InternshipRegistration::where('email', $request->input('email'))->exists();
    }
    return view('register_internship', compact('alreadyApplied'));
})->name('register.internship.form');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin', function () {
        $donations = Donation::latest()->get();
        $contacts = Contact::latest()->get();
        $internships = InternshipRegistration::latest()->get(); 
        
        // Calculate dynamic dashboard values
        $totalDonations = Donation::sum('amount') ?? 0;
        $totalVolunteers = User::count() ?? 0;
        $upcomingEvents = Event::where('date', '>=', now())->count() ?? 0;
        $totalDonationCount = Donation::count() ?? 0;
        
        return view('admin', compact('donations', 'contacts', 'internships', 'totalDonations', 'totalVolunteers', 'upcomingEvents', 'totalDonationCount'));
    })->name('admin');
    
    // Admin Event Management
    Route::get('/admin/manage-events', [EventController::class, 'index'])->name('events.index');
    Route::post('/admin/manage-events', [EventController::class, 'store'])->name('events.store');
    Route::delete('/admin/manage-events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    
    // Admin Attendance Management
    Route::get('/admin/attendance', [AttendanceController::class, 'index'])->name('admin.attendance.index');
    Route::get('/admin/attendance/event/{id}', [AttendanceController::class, 'show'])->name('admin.attendance.show');
    Route::post('/admin/attendance/event/{id}', [AttendanceController::class, 'update'])->name('admin.attendance.update');
});

/*
|--------------------------------------------------------------------------
| Super Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'superadmin'])->group(function () {
    // Super Admin Routes
    Route::get('/superadmin', [SuperAdminController::class, 'index'])->name('superadmin.index');
    Route::get('/superadmin/create', [SuperAdminController::class, 'create'])->name('superadmin.create');
    Route::post('/superadmin/store', [SuperAdminController::class, 'store'])->name('superadmin.store');
    Route::delete('/superadmin/delete/{id}', [SuperAdminController::class, 'destroy'])->name('superadmin.destroy');
});

/*
|--------------------------------------------------------------------------
| User Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'user'])->group(function () {
    // Main Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    
    // Profile Management
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    Route::put('/profile', [UserDashboardController::class, 'updateProfile'])->name('profile.update');
    Route::post('/password/update', [UserDashboardController::class, 'updatePassword'])->name('password.update');
    
    // Events Management
    Route::get('/events', [EventController::class, 'upcoming'])->name('events.index');
    Route::get('/events/upcoming', [EventController::class, 'upcoming'])->name('events.upcoming');
    Route::get('/events/registered', [EventController::class, 'registeredEvents'])->name('events.registered');
    Route::get('/events/attended', [EventController::class, 'attendedEvents'])->name('events.attended');
    Route::get('/events/past', [EventController::class, 'pastEvents'])->name('events.past');
    Route::get('/events/participated', [EventController::class, 'participatedEvents'])->name('events.participated');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');
    Route::post('/events/register/{eventId}', [EventController::class, 'register'])->name('events.register');
    
    // Certificates
    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::get('/certificates/{id}/download', [CertificateController::class, 'download'])->name('certificate.download');
    Route::get('/certificates/{id}/view', [CertificateController::class, 'view'])->name('certificate.view');
    Route::get('/certificate/{registration}', [CertificateController::class, 'generate'])->name('certificate.generate');
});
