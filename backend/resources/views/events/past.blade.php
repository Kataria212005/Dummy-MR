@extends('layouts.app')

@section('title', 'Past Events')

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
    
    /* Event Cards */
    .event-card {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
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
    
    .event-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    
    .event-date {
        color: #0d6efd;
        font-weight: 600;
        font-size: 14px;
    }
    
    .event-title {
        font-size: 18px;
        font-weight: 700;
        margin: 8px 0;
    }
    
    .event-location {
        color: #666;
        font-size: 14px;
        margin-bottom: 15px;
    }
    
    .event-description {
        font-size: 14px;
        color: #444;
        flex-grow: 1;
    }
    
    .event-footer {
        margin-top: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .filter-container {
        margin-bottom: 20px;
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
            <h1 class="mb-4">Past Events</h1>
            
            <div class="filter-container">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('/events/past') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search events..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </form>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <div class="btn-group" role="group">
                            <a href="{{ url('/events/past') }}?sort=recent" class="btn btn-outline-secondary {{ request('sort') == 'recent' ? 'active' : '' }}">Most Recent</a>
                            <a href="{{ url('/events/past') }}?sort=oldest" class="btn btn-outline-secondary {{ request('sort') == 'oldest' ? 'active' : '' }}">Oldest</a>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(isset($pastEvents) && $pastEvents->isNotEmpty())
                <div class="row">
                    @foreach($pastEvents as $event)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="event-card">
                                @if($event->image)
                                    <img src="{{ asset('storage/events/' . $event->image) }}" class="event-image" alt="{{ $event->name }}">
                                @else
                                    <div class="event-image bg-light d-flex align-items-center justify-content-center">
                                        <i class="fas fa-calendar-day fa-3x text-muted"></i>
                                    </div>
                                @endif
                                <div class="event-body">
                                    <div class="event-date">{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</div>
                                    <h5 class="event-title">{{ $event->name }}</h5>
                                    <p class="event-location">
                                        <i class="fas fa-map-marker-alt me-1"></i> {{ $event->location }}
                                    </p>
                                    <p class="event-description">{{ Str::limit($event->description, 100) }}</p>
                                    <div class="event-footer">
                                        <span class="badge bg-secondary">Completed</span>
                                        <a href="{{ url('/events', $event->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $pastEvents->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    No past events found. Check back later!
                </div>
            @endif
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
