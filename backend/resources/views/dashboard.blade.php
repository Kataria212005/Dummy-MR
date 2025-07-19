@extends('layouts.app')

@section('title', 'Dashboard')

@section('styles')
    body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        overflow-x: hidden;
        margin: 0;
        padding: 0;
        height: 100%;
    }

    .logo {
        height: 70px;
    }

    .navbar {
        background-color: #fff;
        padding: 15px 0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    .navbar-brand {
        font-weight: bold;
        color: #0b5ed7;
        font-size: 18px;
    }

    .nav-link {
        color: #333;
        font-size: 15px;
        margin-right: 10px;
        font-weight: 600;
    }

    .donate-btn {
        background-color: #ffc107;
        color: #333;
        border-radius: 5px;
        padding: 5px 15px;
        font-size: 15px;
        font-weight: 600;
    }

    #pageWrapper {
        transition: margin-left 0.3s ease;
        margin-left: 0;
        overflow-x: hidden;
    }

    #pageWrapper.sidebar-active {
        margin-left: 250px;
    }

    #pageWrapper:not(.sidebar-active) .event-card-wrapper {
        margin-left: 40px;
        transition: margin-left 0.3s ease;
    }

    #pageWrapper.sidebar-active .event-card-wrapper {
        margin-left: 0;
        transition: margin-left 0.3s ease;
    }

    .dashboard-card {
        background-color: #c8daf8;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        padding-left: 20px;
    }

    .event-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 5px;
    }

    .event-details {
        padding-left: 20px;
    }

    .section-label {
        font-size: 14px;
        color: #000000;
        text-transform: uppercase;
        font-weight: 600;
    }

    .event-title {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .event-location {
        color: #6c757d;
        margin-bottom: 15px;
    }

    /* Section headings */
    main h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #343a40;
        padding-bottom: 8px;
        border-bottom: 2px solid #f8f9fa;
    }

    /* Badge styles */
    .badge {
        padding: 5px 10px;
        font-weight: 500;
        border-radius: 4px;
        font-size: 12px;
    }

    /* Main wrapper adjustment */
    #pageWrapper {
        padding-top: 20px;
    }

    @media (max-width: 576px) {
        .event-buttons .btn {
            display: block;
            width: 80%;
            margin: 10px auto;
        }
    }

    footer {
        padding-top: 40px;
    }

    .footer-top {
        background-color: #000;
        color: white;
        padding: 40px 0;
    }

    .footer-bottom {
        background-color: #ffc107;
        color: #000;
        padding: 10px 0;
        font-size: 14px;
    }

    .logo-container img {
        width: 150px;
        height: 150px;
        border-radius: 10px;
    }

    .footer-menu h5 {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .footer-menu ul {
        list-style: none;
        padding-left: 0;
    }

    .footer-menu ul li {
        margin-bottom: 8px;
    }

    .footer-menu ul li a {
        color: var(--light-text);
        text-decoration: none;
    }

    .footer-menu ul li a:hover {
        text-decoration: underline;
    }

    .subscribe-section h5 {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .subscribe-form {
        display: flex;
    }

    .subscribe-form input {
        border: 1px solid #4f4d4d;
        color: white;
    }

    .social-icons {
        margin-top: 20px;
    }

    .social-icons a {
        color: white;
        font-size: 20px;
        margin-right: 15px;
    }

    .divider {
        color: #fff;
        margin: 0 10px;
    }

    .mobile-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: white;
        padding: 10px 0;
        display: flex;
        justify-content: space-around;
        align-items: center;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .mobile-nav button {
        background: none;
        border: none;
        font-size: 20px;
        color: #555;
    }
    .dashboard-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        height: 100%;
        transition: transform 0.2s, box-shadow 0.2s;
        position: relative;
        overflow: hidden;
    }
    
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }
    
    .event-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 15px;
    }
    
    .section-label {
        font-size: 14px;
        color: #0d6efd;
        text-transform: uppercase;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .event-title {
        font-weight: bold;
        margin-bottom: 10px;
        color: #212529;
    }
    
    .event-location {
        color: #6c757d;
        margin-bottom: 15px;
    }
    
    /* Section headings */
    main h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #343a40;
        padding-bottom: 8px;
        border-bottom: 2px solid #f8f9fa;
    }
    
    /* Badge styles */
    .badge {
        padding: 5px 10px;
        font-weight: 500;
        border-radius: 4px;
        font-size: 12px;
    }
    
    /* Main wrapper adjustment */
    #pageWrapper {
        padding-top: 20px;
    }

    /* Main Layout for Admin-style */
    main {
        flex: 1;
        display: flex;
        padding: 20px;
        gap: 20px;
    }

    /* Admin-style Sidebar */
    .sidebar {
        background-color: #d5e7ff; /* Lightened Blue */
        width: 220px;
        min-width: 220px;
        position: relative;
        padding: 20px 15px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .sidebar a {
        display: block;
        padding: 12px 15px;
        text-decoration: none;
        font-size: 16px;
        color: black;
        font-weight: 600;
        transition: background 0.3s ease;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    .sidebar a:hover {
        background-color: #bdd5f8; /* Softer hover */
    }
    
    .sidebar a.active {
        background-color: #bdd5f8;
        border-left: 4px solid #0b5ed7;
    }
    
    /* Content Section */
    .content {
        flex-grow: 1;
        padding: 20px;
    }

    .footer-link {
            color: #ccc;
            text-decoration: none;
        }

        .footer-link:hover {
            color: #fff;
            text-decoration: underline;
        }

        .social-section{
            margin-bottom:15px;
        }
        
        .social-icons i {
            font-size: 22px;
            color: white;
            transition: color 0.3s ease;
        }

        .social-icons i:hover {
            color: #ffc107;
        }

        .social-icons .divider {
            margin: 0 7px;
            color: white;
            font-size: 20px;
        }

    
    /* Responsive Layout */
    @media (max-width: 768px) {
        main {
            flex-direction: column;
        }
        
        .sidebar {
            width: 100%;
            margin-bottom: 20px;
        }
        
        .mobile-nav {
            display: flex;
        }
    }
@endsection
@section('content')
@include('layouts.navbar')

<div id="pageWrapper">

    <!-- Main content with sidebar like admin -->
    <main>
        <div class="sidebar">
            <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ url('/profile') }}" class="{{ request()->is('profile') ? 'active' : '' }}">Profile</a>
            <a href="{{ url('/events') }}" class="{{ request()->is('events') ? 'active' : '' }}">Upcoming Events</a>
            <a href="{{ url('/events/past') }}" class="{{ request()->is('events/past') ? 'active' : '' }}">Past Events</a>
            <a href="{{ url('/events/participated') }}" class="{{ request()->is('events/participated') ? 'active' : '' }}">Events Participated</a>
            <a href="{{ url('/certificates') }}" class="{{ request()->is('certificates') ? 'active' : '' }}">View Your Certificates</a>
        </div>

    <!-- Content section -->
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Dashboard</h1>
            <a href="{{ url('/events') }}" class="btn btn-outline-primary">Browse All Events</a>
        </div>

        <!-- Alerts Section -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Upcoming Events Section -->
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Upcoming Events</h2>
                <a href="{{ url('/events') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            
            @if($upcomingEvents->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    No upcoming events at the moment. Check back later!
                </div>
            @else
                <div class="row">
                    @foreach($upcomingEvents as $event)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="dashboard-card">
                                @if($event->image)
                                    <img src="{{ asset('storage/events/' . $event->image) }}" 
                                        alt="{{ $event->name }}" 
                                        class="event-image" />
                                @else
                                    <div class="event-image bg-light d-flex align-items-center justify-content-center">
                                        <i class="fas fa-calendar-day fa-3x text-muted"></i>
                                    </div>
                                @endif
                                <div class="event-details">
                                    <div class="section-label">
                                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                    </div>
                                    <h5 class="event-title">{{ $event->name }}</h5>
                                    <p class="event-location">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        {{ $event->location }}
                                    </p>
                                    <form action="{{ url('/events/register/' . $event->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"
                                                {{ in_array($event->id, $registeredEventIds) ? 'disabled' : '' }}>
                                            {{ in_array($event->id, $registeredEventIds) ? 'Already Registered' : 'Register Now' }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        <!-- Events Participated Section -->
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Events Participated</h2>
                <a href="{{ url('/events/participated') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            
            @if($registrations->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    You haven't registered for any events yet.
                </div>
            @else
                <div class="row">
                    @foreach($registrations as $registration)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="dashboard-card">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="badge bg-primary">Registered</span>
                                    @if($registration->attendance && $registration->attendance->present)
                                        <span class="badge bg-success">Attended</span>
                                    @else
                                        @if(\Carbon\Carbon::parse($registration->event->date)->isPast())
                                            <span class="badge bg-warning text-dark">Missed</span>
                                        @else
                                            <span class="badge bg-info text-dark">Upcoming</span>
                                        @endif
                                    @endif
                                </div>
                                <h5 class="card-title">{{ $registration->event->name }}</h5>
                                <p class="card-text">
                                    <i class="far fa-calendar me-2"></i>
                                    <strong>Date:</strong> {{ \Carbon\Carbon::parse($registration->event->date)->format('d M Y') }}<br>
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    <strong>Location:</strong> {{ $registration->event->location }}<br>
                                </p>
                                @if($registration->attendance && $registration->attendance->present)
                                    @if(!$registration->certificate_generated)
                                        <a href="{{ route('certificate.generate', $registration->id) }}" 
                                        class="btn btn-primary btn-sm mt-2">
                                            <i class="fas fa-certificate me-1"></i> Generate Certificate
                                        </a>
                                    @else
                                        <a href="{{ route('certificate.generate', $registration->id) }}" 
                                        class="btn btn-success btn-sm mt-2">
                                            <i class="fas fa-download me-1"></i> Download Certificate
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        <!-- Past Events Section -->
        <section class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Past Events</h2>
                <a href="{{ url('/events/past') }}" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            
            @if(!isset($pastEvents) || $pastEvents->isEmpty())
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    No past events to display.
                </div>
            @else
                <div class="row">
                    @foreach($pastEvents as $event)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="dashboard-card">
                                @if($event->image)
                                    <img src="{{ asset('storage/events/' . $event->image) }}" 
                                        alt="{{ $event->name }}" 
                                        class="event-image" />
                                @else
                                    <div class="event-image bg-light d-flex align-items-center justify-content-center">
                                        <i class="fas fa-history fa-3x text-muted"></i>
                                    </div>
                                @endif
                                <div class="event-details">
                                    <div class="section-label">
                                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                    </div>
                                    <h5 class="event-title">{{ $event->name }}</h5>
                                    <p class="event-location">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        {{ $event->location }}
                                    </p>
                                    <a href="{{ url('/events/' . $event->id) }}" class="btn btn-outline-secondary">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
</main>

    <!-- Event Registration Popup -->
    <div id="registrationPopup" style="display:none; position:fixed; z-index:1200; left:0; top:0; width:100%; height:100%; background: rgba(0,0,0,0.6);">
        <div style="background:white; max-width: 400px; margin: 100px auto; padding: 30px; border-radius: 8px; position: relative;">
            <span style="position:absolute; right:15px; top:15px; cursor:pointer; font-weight:bold;" class="close-popup">&times;</span>
            <h3>Register for Event</h3>
            <form id="eventRegistrationForm" method="POST">
                @csrf
                <input type="hidden" name="event_id" id="event_id" value="">
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" readonly />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" readonly />
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

</div> <!-- End of pageWrapper -->

<!-- Mobile bottom navigation -->
<nav class="mobile-nav d-md-none">
    <button onclick="toggleSidebar()"><i class="fas fa-bars"></i></button>
    <a href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt"></i></a>
    <a href="{{ url('/events') }}"><i class="fas fa-calendar-alt"></i></a>
    <a href="{{ url('/events/participated') }}"><i class="fas fa-check-circle"></i></a>
    <a href="{{ url('/events/past') }}"><i class="fas fa-history"></i></a>
    <a href="{{ url('/donatenow') }}"><i class="fas fa-hand-holding-usd"></i></a>
</nav>
@include('layouts.footer')
@endsection
