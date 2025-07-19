@extends('layouts.app')

@section('title', $event->name)

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


    /* Main Layout */
    main {
        flex: 1;
        display: flex;
        padding: 20px;
        gap: 20px;
    }

    /*Sidebar */
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

    /* Event Details Styling */
    .event-header {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 30px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .event-cover {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    .event-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0));
        padding: 30px;
        color: white;
    }

    .event-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 10px;
    }

    .event-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .event-meta-item i {
        width: 18px;
        text-align: center;
    }

    .event-body {
        background: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }

    .event-description {
        margin-bottom: 30px;
    }

    .event-section {
        margin-bottom: 30px;
    }

    .event-section h3 {
        font-size: 20px;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }

    .event-action-panel {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-top: 30px;
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

        .event-meta {
            flex-direction: column;
            gap: 10px;
        }

        .event-overlay {
            padding: 20px;
        }
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

@endsection

@section('content')
@include('layouts.navbar')

<div id="pageWrapper">
    <main>
        <div class="sidebar">
            <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ url('/profile') }}" class="{{ request()->is('profile') ? 'active' : '' }}">Profile</a>
            <a href="{{ url('/events') }}" class="{{ request()->is('events') ? 'active' : '' }}">Upcoming Events</a>
            <a href="{{ url('/events/past') }}" class="{{ request()->is('events/past') ? 'active' : '' }}">Past Events</a>
            <a href="{{ url('/events/participated') }}" class="{{ request()->is('events/participated') ? 'active' : '' }}">Events Participated</a>
            <a href="{{ url('/certificates') }}" class="{{ request()->is('certificates') ? 'active' : '' }}">Certificates</a>
        </div>

        <div class="content">
            <!-- Alert Messages -->
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

            <!-- Event Header -->
            <div class="event-header">
                @if($event->image)
                    <img src="{{ asset('storage/events/' . $event->image) }}" alt="{{ $event->name }}" class="event-cover">
                @else
                    <div class="event-cover d-flex align-items-center justify-content-center bg-light">
                        <i class="fas fa-calendar-day fa-5x text-muted"></i>
                    </div>
                @endif
                
                <div class="event-overlay">
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge {{ \Carbon\Carbon::parse($event->date)->isPast() ? 'bg-secondary' : 'bg-primary' }}">
                            {{ \Carbon\Carbon::parse($event->date)->isPast() ? 'Past Event' : 'Upcoming Event' }}
                        </span>
                        
                        @if(\Carbon\Carbon::parse($event->date)->isToday())
                            <span class="badge bg-success">Today</span>
                        @endif
                    </div>
                    
                    <h1 class="mt-2">{{ $event->name }}</h1>
                    
                    <div class="event-meta">
                        <div class="event-meta-item">
                            <i class="far fa-calendar-alt"></i>
                            <span>{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</span>
                        </div>
                        
                        <div class="event-meta-item">
                            <i class="far fa-clock"></i>
                            <span>{{ $event->time ?? 'Time not specified' }}</span>
                        </div>
                        
                        <div class="event-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $event->location }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Content -->
            <div class="event-body">
                @if($event->description)
                    <div class="event-description">
                        <h3>About this event</h3>
                        <p>{{ $event->description }}</p>
                    </div>
                @endif
                
                @if(isset($event->details) && $event->details)
                    <div class="event-section">
                        <h3>Event Details</h3>
                        <div>{!! nl2br(e($event->details)) !!}</div>
                    </div>
                @endif
                
                <div class="event-action-panel">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <h4 class="mb-3">Interested in this event?</h4>
                            <p class="text-muted mb-md-0">
                                @if(\Carbon\Carbon::parse($event->date)->isPast())
                                    This event has already taken place on {{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}.
                                @else
                                    Register now to secure your spot for this event on {{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}.
                                @endif
                            </p>
                        </div>
                        <div class="col-md-5 text-md-end">
                            @php
                                $userId = auth()->id();
                                $isRegistered = \App\Models\Registration::where('user_id', $userId)
                                    ->where('event_id', $event->id)
                                    ->exists();
                            @endphp
                            
                            @if(\Carbon\Carbon::parse($event->date)->isPast())
                                <a href="{{ url('/events') }}" class="btn btn-primary">
                                    <i class="fas fa-calendar-alt me-2"></i>Browse Upcoming Events
                                </a>
                            @else
                                @if($isRegistered)
                                    <button class="btn btn-success" disabled>
                                        <i class="fas fa-check-circle me-2"></i>Already Registered
                                    </button>
                                @else
                                    <form action="{{ url('/events/register/' . $event->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-user-plus me-2"></i>Register Now
                                        </button>
                                    </form>
                                @endif
                            @endif
                            
                            <a href="javascript:history.back()" class="btn btn-outline-secondary ms-2">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Mobile bottom navigation -->
<nav class="mobile-nav d-md-none">
    <a href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt"></i></a>
    <a href="{{ url('/profile') }}"><i class="fas fa-user"></i></a>
    <a href="{{ url('/events') }}"><i class="fas fa-calendar-alt"></i></a>
    <a href="{{ url('/events/participated') }}"><i class="fas fa-check-circle"></i></a>
    <a href="{{ url('/events/past') }}"><i class="fas fa-history"></i></a>
</nav>
@include('layouts.footer')
@endsection
