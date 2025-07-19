@extends('layouts.app')

@section('title', 'User Profile')

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
    
    /* Profile Specific Styles */
    .profile-card {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .profile-header {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }
    
    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #f0f0f0;
        margin-right: 30px;
    }
    
    .profile-name {
        font-size: 24px;
        font-weight: 600;
    }
    
    .profile-email {
        color: #666;
        margin-bottom: 5px;
    }
    
    .profile-role {
        display: inline-block;
        padding: 5px 15px;
        background-color: #e3f2fd;
        color: #1565c0;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
    }
    
    .form-label {
        font-weight: 600;
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
        
        .profile-header {
            flex-direction: column;
            text-align: center;
        }
        
        .profile-avatar {
            margin-right: 0;
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
            <h1 class="mb-4">My Profile</h1>
            
            <div class="profile-card">
                <div class="profile-header">
                    <div class="profile-avatar d-flex align-items-center justify-content-center bg-light">
                        <i class="fas fa-user fa-4x text-secondary"></i>
                    </div>
                    <div>
                        <h2 class="profile-name">{{ auth()->user()->name }}</h2>
                        <p class="profile-email">{{ auth()->user()->email }}</p>
                        <span class="profile-role">{{ auth()->user()->role ?? 'User' }}</span>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone ?? '' }}">
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{ auth()->user()->location ?? '' }}">
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label for="profile_photo" class="form-label">Profile Photo</label>
                                    <input type="file" class="form-control" id="profile_photo" name="profile_photo">
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label for="bio" class="form-label">Bio</label>
                                    <textarea class="form-control" id="bio" name="bio" rows="4">{{ auth()->user()->bio ?? '' }}</textarea>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <hr class="my-4">
                
                <h3>Change Password</h3>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>
                    
                    <div class="mt-2">
                        <button type="submit" class="btn btn-warning">Change Password</button>
                    </div>
                </form>
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
