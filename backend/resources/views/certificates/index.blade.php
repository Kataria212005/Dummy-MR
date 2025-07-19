@extends('layouts.app')

@section('title', 'My Certificates')

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
    
    /* Certificate Cards */
    .certificate-card {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .certificate-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.1);
    }
    
    .certificate-image {
        width: 100%;
        height: 180px;
        background: linear-gradient(135deg, #d5e7ff, #bdd5f8);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0d6efd;
        font-size: 50px;
    }
    
    .certificate-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    
    .certificate-date {
        color: #0d6efd;
        font-weight: 600;
        font-size: 14px;
    }
    
    .certificate-title {
        font-size: 18px;
        font-weight: 700;
        margin: 8px 0;
    }
    
    .certificate-event {
        color: #666;
        font-size: 14px;
        margin-bottom: 15px;
    }
    
    .certificate-meta {
        font-size: 14px;
        color: #444;
        flex-grow: 1;
        margin-bottom: 15px;
    }
    
    .certificate-meta p {
        margin-bottom: 5px;
    }
    
    .certificate-meta i {
        width: 16px;
        color: #0d6efd;
        margin-right: 8px;
    }
    
    .certificate-footer {
        margin-top: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
    }
    
    .certificate-actions {
        display: flex;
        gap: 8px;
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
        
        .certificate-footer {
            flex-direction: column;
            align-items: stretch;
        }
        
        .certificate-actions {
            justify-content: center;
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
            <h1 class="mb-4">My Certificates</h1>
            
            <div class="filter-container">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('/certificates') }}" method="GET" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search certificates..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </form>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <div class="btn-group" role="group">
                            <a href="{{ url('/certificates') }}?sort=recent" class="btn btn-outline-secondary {{ request('sort') == 'recent' ? 'active' : '' }}">Most Recent</a>
                            <a href="{{ url('/certificates') }}?sort=oldest" class="btn btn-outline-secondary {{ request('sort') == 'oldest' ? 'active' : '' }}">Oldest</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ session('error') }}
                </div>
            @endif
            
            @if(isset($certificates) && $certificates->isNotEmpty())
                <div class="row">
                    @foreach($certificates as $certificate)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="certificate-card">
                                <div class="certificate-image">
                                    <i class="fas fa-certificate"></i>
                                </div>
                                <div class="certificate-body">
                                    <div class="certificate-date">
                                        Issued on {{ $certificate->created_at->format('d M Y') }}
                                    </div>
                                    <h5 class="certificate-title">Participation Certificate</h5>
                                    <p class="certificate-event">
                                        <i class="fas fa-calendar-alt me-1"></i> 
                                        {{ $certificate->event ? $certificate->event->name : 'Event not available' }}
                                    </p>
                                    
                                    <div class="certificate-meta">
                                        <p>
                                            <i class="fas fa-hashtag"></i>
                                            Certificate ID: {{ $certificate->certificate_number ?? 'N/A' }}
                                        </p>
                                        @if($certificate->event && $certificate->event->date)
                                            <p>
                                                <i class="far fa-calendar"></i>
                                                Event Date: {{ \Carbon\Carbon::parse($certificate->event->date)->format('d M Y') }}
                                            </p>
                                        @endif
                                    </div>
                                    
                                    <div class="certificate-footer">
                                        <span class="badge bg-primary">
                                            <i class="fas fa-medal me-1"></i> Achievement
                                        </span>
                                        <div class="certificate-actions">
                                            <a href="{{ route('certificate.view', $certificate->id) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-eye me-1"></i> View
                                            </a>
                                            <a href="{{ route('certificate.download', $certificate->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-download me-1"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="d-flex justify-content-center mt-4">
                    {{ $certificates->links() }}
                </div>
            @else
                <div class="alert alert-info text-center p-5">
                    <i class="fas fa-certificate fa-3x mb-3 text-muted"></i>
                    <h4>No Certificates Available Yet</h4>
                    <p class="mb-4">Attend events and earn certificates that will be displayed here.</p>
                    <a href="{{ url('/events') }}" class="btn btn-primary">Explore Events</a>
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
    <a href="{{ url('/certificates') }}"><i class="fas fa-certificate"></i></a>
</nav>
@include('layouts.footer')
@endsection