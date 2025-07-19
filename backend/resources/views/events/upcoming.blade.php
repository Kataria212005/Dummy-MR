@extends('layouts.app')

@section('title', 'Upcoming Events')

@section('styles')
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
    
    /* Event cards */
    .event-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    
    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }
    
    .event-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }
    
    .event-details {
        padding: 15px 20px;
    }
    
    .event-date-badge {
        display: inline-block;
        background-color: #0d6efd;
        color: white;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .event-title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .event-meta {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 15px;
    }
    
    .event-meta i {
        width: 20px;
    }
    
    /* Search and filter controls */
    .controls-container {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    /* Mobile Navigation */
    .mobile-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: white;
        padding: 10px 0;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        display: none;
    }
    
    .mobile-nav a {
        color: #555;
        font-size: 20px;
    }
    
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
            justify-content: space-around;
        }
        
        body {
            padding-bottom: 60px;
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Upcoming Events</h1>
            </div>
            
            <!-- Filters and Search -->
            <div class="controls-container">
                <form action="{{ url('/events') }}" method="GET" class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search events..." name="search" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="sort" class="form-select" onchange="this.form.submit()">
                            <option value="recent" {{ request('sort') == 'recent' ? 'selected' : '' }}>Most Recent First</option>
                            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                        </select>
                    </div>
                    <div class="col-md-3 text-md-end">
                        <a href="{{ url('/events') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-sync-alt me-1"></i> Reset Filters
                        </a>
                    </div>
                </form>
            </div>
            
            <!-- Event listings -->
            @if(isset($events) && $events->count() > 0)
                <div class="row">
                    @foreach($events as $event)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="event-card">
                                <!-- Event Image -->
                                @if($event->image)
                                    <img src="{{ asset('storage/events/' . $event->image) }}" alt="{{ $event->name }}" class="event-image">
                                @else
                                    <div class="event-image bg-light d-flex align-items-center justify-content-center">
                                        <i class="fas fa-calendar-day fa-3x text-muted"></i>
                                    </div>
                                @endif
                                
                                <!-- Event Details -->
                                <div class="event-details">
                                    <span class="event-date-badge">
                                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                    </span>
                                    <h5 class="event-title">{{ $event->name }}</h5>
                                    <div class="event-meta">
                                        <p><i class="fas fa-map-marker-alt"></i> {{ $event->location }}</p>
                                        <p><i class="fas fa-clock"></i> {{ $event->time }}</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <form action="{{ url('/events/register/' . $event->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary"
                                                    {{ in_array($event->id, $registeredEventIds ?? []) ? 'disabled' : '' }}>
                                                {{ in_array($event->id, $registeredEventIds ?? []) ? 'Already Registered' : 'Register Now' }}
                                            </button>
                                        </form>
                                        <a href="{{ url('/events/' . $event->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $events->links() }}
                </div>
            @else
                <div class="alert alert-info text-center p-5">
                    <i class="fas fa-calendar-times fa-3x mb-3"></i>
                    <h4>No upcoming events found</h4>
                    <p>Check back later for new upcoming events!</p>
                </div>
            @endif
        </div>
    </main>
</div>

<!-- Mobile bottom navigation -->
<nav class="mobile-nav d-md-none">
    <a href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt"></i></a>
    <a href="{{ url('/events') }}"><i class="fas fa-calendar-alt"></i></a>
    <a href="{{ url('/events/participated') }}"><i class="fas fa-check-circle"></i></a>
    <a href="{{ url('/events/past') }}"><i class="fas fa-history"></i></a>
    <a href="{{ url('/donatenow') }}"><i class="fas fa-hand-holding-usd"></i></a>
</nav>
@include('layouts.footer')
@endsection
