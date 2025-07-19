@extends('layouts.app')

@section('title', 'Events Attended')

@section('styles')
<!-- Attended Events Section -->

   body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        
        .logo{
            height: 70px;
        }

        .navbar {
            background-color: #fff;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: #0b5ed7;
            font-size: 18px;
        }
        
        .nav-link {
            color: #333;
            font-size: 14px;
            margin-right: 10px;
            font-weight: 600;
        }
        
        .donate-btn {
            background-color: #ffc107;
            color: #333;
            border-radius: 5px;
            padding: 5px 15px;
            font-size: 14px;
            font-weight: 600;
        }
        #customSidebar {
    position: fixed;
    top: 0;
    left: -250px;
    height: 100%;
    width: 250px;
    background-color: #cce5ff; /* Light blue */
    padding-top: 60px;
    box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    z-index: 1099;
}

#customSidebar.active {
    left: 0;
}

.sidebar-link {
    display: flex;
    align-items: center;
    padding: 15px 25px;
    font-size: 17px;
    font-weight: 600;
    color: #003366;
    text-decoration: none;
    transition: background 0.3s ease;
}

.sidebar-link i {
    margin-right: 12px;
    font-size: 18px;
}

.sidebar-link:hover {
    background-color: #b3d7ff;
    color: #001f3f;
}

.user-profile {
    border-top: 1px solid #99c2ff;
    background-color: #e6f2ff;
    padding: 15px 20px;
    font-size: 16px;
    font-weight: 500;
}

.user-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    margin-right: 12px;
    object-fit: cover;
}

    .donate-btn {
      background-color: #fef577;
      color: #333;
      border-radius: 5px;
      padding: 5px 15px;
      font-size: 15px;
      font-weight: 600;
      border: solid 1px #a79d0d;
    }
    #pageWrapper {
    transition: margin-left 0.3s ease;
    margin-left: 0;
    overflow-x: hidden;
}

#pageWrapper.sidebar-active {
    margin-left: 250px; /* Sidebar width */
}
/* When sidebar is closed */
#pageWrapper:not(.sidebar-active) .event-card-wrapper {
    margin-left: 40px; /* Adjust value as needed */
    transition: margin-left 0.3s ease;
}

/* When sidebar is open (default styling) */
#pageWrapper.sidebar-active .event-card-wrapper {
    margin-left: 0;
    transition: margin-left 0.3s ease;
}
  /* Section Title */
  .bottom_list h6 {
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
    border-bottom: 2px solid #28a745;
    padding-bottom: 8px;
    margin-bottom: 20px;
    padding-top:25px;
    margin-left:20px;
    width: 98%;
  }

  /* Table styling */
  .table {
  background-color: #fff;
  border: 1px solid #dee2e6;
  border-collapse:separate;
  border-radius: 8px;
  overflow: hidden;
  font-size: 0.95rem;
  margin-left: 20px;
  margin-right: 20px; /* ✅ Add this to keep it away from right edge */
  width: calc(100% - 40px); /* ✅ Ensures it doesn't overflow */
}

  .table th {
    background-color: #f8f9fa;
    color: #495057;
    font-weight: 600;
    text-align: left;
    padding: 12px 16px;
  }

  .table td {
    padding: 12px 16px;
    vertical-align: middle;
   
  }

  /* Hover effect for rows */
  .table tbody tr:hover {
    background-color: #f1f1f1;
  }

  /* Download button styling */
  .btn-success {
    background-color: #28a745;
    border: none;
    padding: 6px 12px;
    font-size: 0.85rem;
    transition: background-color 0.3s ease;
  }

  .btn-success:hover {
    background-color: #218838;
  }

  /* Pending text */
  .text-muted {
    font-style: italic;
    color: #6c757d !important;
  }
  footer{
    padding-top:140px;
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
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        
        .mobile-nav button {
            background: none;
            border: none;
            font-size: 20px;
            color: #555;
        }
  

  /* Responsive tweaks */
  @media (max-width: 576px) {
    .table thead {
      display: none;
    }

    .table tbody td {
      display: block;
      width: 100%;
      padding: 10px 12px;
      text-align: right;
      position: relative;
      border: none;
      border-bottom: 1px solid #dee2e6;
    }

    .table tbody td::before {
      content: attr(data-label);
      position: absolute;
      left: 12px;
      top: 10px;
      font-weight: bold;
      text-align: left;
    }

    .table tbody tr {
      margin-bottom: 1rem;
      display: block;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      background-color: #fff;
    }
    
  }

@endsection
@section('content')
<div id="pageWrapper">
<header>
    <!-- Sidebar Toggle Icon -->
    <span class="sidebar-icon position-absolute top-0 start-0 mt-4 " onclick="toggleSidebar()" style="z-index: 1100; margin-left:40px;padding-top:15px;">
        <i class="fas fa-bars fa-lg"></i>
    </span>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="logo me-3">
            <a class="navbar-brand" href="{{ url('/') }}">MUSKURATE RAHO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About us</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('whatwedo') ? 'active' : '' }}" href="/whatwedo">What We Do</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('ourteam') ? 'active' : '' }}" href="/team">Our Team</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('ourteam') ? 'active' : '' }}" href="/contact">Contact</a></li>
                </ul>
                <a href="/donatenow" class="donate-btn text-decoration-none">Donate</a>
                <a href="/admin" class="ms-3">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48ZyBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2Utd2lkdGg9IjEuNSI+PHBhdGggZD0iTTEyIDJDNi40NzcgMiAyIDYuNDc3IDIgMTJzNC40NzcgMTAgMTAgMTBzMTAtNC40NzcgMTAtMTBTMTcuNTIzIDIgMTIgMiIvPjxwYXRoIGQ9Ik00LjI3MSAxOC4zNDZTNi41IDE1LjUgMTIgMTUuNXM3LjczIDIuODQ2IDcuNzMgMi44NDZNMTIgMTJhMyAzIDAgMSAwIDAtNmEzIDMgMCAwIDAgMCA2Ii8+PC9nPjwvc3ZnPg==" alt="User" class="rounded-circle">
                </a>
            </div>
        </div>
    </nav>
</header>

<!-- Sidebar -->
<div id="customSidebar">
    <!-- Sidebar Links with Font Awesome Icons -->
    <a href="{{ route('events.registered') }}"  class="sidebar-link">
        <i class="fas fa-calendar-plus me-2" style="margin-left:15px"></i> Register Events
    </a>
    <a href="{{ route('events.attended') }}" class="sidebar-link">
    <i class="fas fa-check-circle me-2" style="margin-left:15px"></i> Events You Attended
</a>
    <a href="/profile" class="sidebar-link">
        <i class="fas fa-user me-2"style="margin-left:15px"></i> Profile
    </a>

    <!-- User Profile at Bottom -->
    <div class="user-profile position-absolute bottom-0 w-100 p-3 d-flex align-items-center gap-2">
        <img src="{{ asset('assets/images/woman.png') }}" alt="User" class="user-avatar rounded-circle" style="width: 40px; height: 40px;">
        <div>
            <div>Kirti Khanna</div>
            <small class="text-muted"><i class="fas fa-circle text-success me-1"></i> Online</small>
        </div>
    </div>
</div>


<div class="container">
    <h2>Events You Attended</h2>
    <div class="row">
        @foreach($attendedEvents as $event)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">Date: {{ $event->date }}</p>
                        <p class="card-text">Time: {{ $event->time }}</p>
                        <p class="card-text">Location: {{ $event->location }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="mb-5 bottom_list">
  <h6 class="mb-3">Events You Attended</h6>
  <div class="table-responsive">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>Name of the Event</th>
          <th>Location</th>
          <th>Date</th>
          <th>Certificate</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label="Name of the Event">Tree Plantation Drive</td>
          <td data-label="Location">Sanjay Gandhi National Park</td>
          <td data-label="Date">12.04.2025</td>
          <td data-label="Certificate"><a href="#" class="btn btn-sm btn-success">Download</a></td>
        </tr>
        <tr>
          <td data-label="Name of the Event">Beach Cleanup Drive</td>
          <td data-label="Location">Mahim Beach</td>
          <td data-label="Date">20.04.2025</td>
          <td data-label="Certificate"><a href="#" class="btn btn-sm btn-success">Download</a></td>
        </tr>
        <tr>
          <td data-label="Name of the Event">Project Pathshala</td>
          <td data-label="Location">St. Catherine of Siena School</td>
          <td data-label="Date">24.04.2025</td>
          <td data-label="Certificate"><span class="text-muted">Pending</span></td>
        </tr>
        <tr>
          <td data-label="Name of the Event">Beach Cleanup Drive</td>
          <td data-label="Location">Girgaon Chowpatty</td>
          <td data-label="Date">30.04.2025</td>
          <td data-label="Certificate"><a href="#" class="btn btn-sm btn-success">Download</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@include('layouts.footer')
</div>
@endsection
@push('scripts')
<script>
function openRegistrationModal(eventId, eventName) {
    document.getElementById('eventId').value = eventId;
    document.getElementById('eventName').value = eventName;
    var modal = new bootstrap.Modal(document.getElementById('registrationModal'));
    modal.show();
}

document.getElementById('eventRegistrationForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const eventId = document.getElementById('eventId').value;
    
    fetch(`/events/register/${eventId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            event_id: eventId
        })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert('Successfully registered for the event!');
            bootstrap.Modal.getInstance(document.getElementById('registrationModal')).hide();
            // Optionally refresh the page or update UI
            location.reload();
        } else {
            alert(data.message || 'Registration failed. Please try again.');
        }
    });
});
</script>
@endpush 