@extends('layouts.app')

@section('title', 'Events Participated')

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


    /* Main Layout*/
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
    
    /* Participation Cards */
    .participation-card {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
        margin-bottom: 20px;
    }
    
    .participation-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.1);
    }
    
    .participation-header {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        border-bottom: 1px solid #eee;
    }
    
    .participation-header img {
        width: 60px;
        height: 60px;
        border-radius: 5px;
        object-fit: cover;
        margin-right: 15px;
    }
    
    .participation-status {
        margin-left: auto;
    }
    
    .participation-body {
        padding: 20px;
    }
    
    .participation-footer {
        background-color: #f9f9f9;
        padding: 12px 20px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    /* Filter and Sort Controls */
    .filter-container {
        margin-bottom: 20px;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 10px;
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
        
        .participation-header {
            flex-direction: column;
            text-align: center;
        }
        
        .participation-header img {
            margin-right: 0;
            margin-bottom: 10px;
        }
        
        .participation-status {
            margin-left: 0;
            margin-top: 10px;
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
            <h1 class="mb-4">Events Participated</h1>
            
            <div class="filter-container">
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <form action="{{ url('/events/participated') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search events..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </form>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="btn-group" role="group">
                            <a href="{{ url('/events/participated') }}" class="btn btn-outline-secondary {{ !request('filter') ? 'active' : '' }}">All</a>
                            <a href="{{ url('/events/participated') }}?filter=attended" class="btn btn-outline-secondary {{ request('filter') == 'attended' ? 'active' : '' }}">Attended</a>
                            <a href="{{ url('/events/participated') }}?filter=not-attended" class="btn btn-outline-secondary {{ request('filter') == 'not-attended' ? 'active' : '' }}">Not Attended</a>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(isset($registrations) && $registrations->isNotEmpty())
                @foreach($registrations as $registration)
                    <div class="participation-card">
                        <div class="participation-header">
                            @if($registration->event->image)
                                <img src="{{ asset('storage/events/' . $registration->event->image) }}" alt="{{ $registration->event->name }}">
                            @else
                                <div style="width: 60px; height: 60px; border-radius: 5px; background: #eee; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-calendar-day fa-2x text-muted"></i>
                                </div>
                            @endif
                            
                            <div>
                                <h5 class="mb-1">{{ $registration->event->name }}</h5>
                                <p class="mb-0 text-muted">
                                    <i class="far fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($registration->event->date)->format('d M Y') }}
                                </p>
                            </div>
                            
                            <div class="participation-status">
                                @if($registration->attendance && $registration->attendance->present)
                                    <span class="badge bg-success">Attended</span>
                                @else
                                    @if(\Carbon\Carbon::parse($registration->event->date)->isPast())
                                        <span class="badge bg-warning text-dark">Not Attended</span>
                                    @else
                                        <span class="badge bg-info text-dark">Upcoming</span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        
                        <div class="participation-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Location:</strong> <i class="fas fa-map-marker-alt me-1"></i> {{ $registration->event->location }}</p>
                                    <p><strong>Registration Date:</strong> {{ $registration->created_at->format('d M Y') }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Status:</strong> 
                                        @if($registration->attendance && $registration->attendance->present)
                                            <span class="text-success"><i class="fas fa-check-circle me-1"></i> Marked Present</span>
                                        @else
                                            @if(\Carbon\Carbon::parse($registration->event->date)->isPast())
                                                <span class="text-warning"><i class="fas fa-exclamation-circle me-1"></i> Marked Absent</span>
                                            @else
                                                <span class="text-info"><i class="fas fa-clock me-1"></i> Pending</span>
                                            @endif
                                        @endif
                                    </p>
                                    
                                    @if($registration->event->certificate_eligible && $registration->attendance && $registration->attendance->present)
                                        <p><strong>Certificate:</strong> 
                                            @if($registration->certificate_generated)
                                                <span class="text-success"><i class="fas fa-certificate me-1"></i> Available</span>
                                            @else
                                                <span class="text-warning"><i class="fas fa-hourglass-half me-1"></i> Processing</span>
                                            @endif
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="participation-footer">
                            <a href="{{ url('/events', $registration->event->id) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-eye me-1"></i> Event Details
                            </a>
                            
                            @if($registration->attendance && $registration->attendance->present)
                                @if($registration->certificate_generated)
                                    <a href="{{ route('certificate.generate', $registration->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-download me-1"></i> Download Certificate
                                    </a>
                                @else
                                    <a href="{{ route('certificate.generate', $registration->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-certificate me-1"></i> Generate Certificate
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $registrations->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    You haven't registered for any events yet. Check out our <a href="{{ url('/events') }}">upcoming events</a> to get started!
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
