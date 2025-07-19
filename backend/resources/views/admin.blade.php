@extends('layouts.app')

@section('title', 'Admin')

@section('styles')
    
    body {
  font-family: Arial, sans-serif;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  background-color: #f8f9fa;
  color: #333;
}

.badge {
  font-size: 0.85rem;
  padding: 0.35em 0.65em;
  font-weight: 500;
  border-radius: 0.25rem;
}

.bg-primary {
  background-color: #0d6efd;
  color: white;
}

.bg-success {
  background-color: #198754;
  color: white;
}

.bg-info {
  background-color: #0dcaf0;
  color: #212529;
}

.bg-secondary {
  background-color: #6c757d;
  color: white;
}

.bg-warning {
  background-color: #ffc107;
  color: #212529;
}

/* HEADER STYLES */
      .logo {
        height: 50px;
      }

      .navbar {
        background-color: #fff;
        padding: 10px 0;
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

/* Sidebar */
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
}

.sidebar a:hover {
  background-color: #bdd5f8; /* Softer hover */
}

/* Responsive Sidebar */
@media (max-width: 768px) {
  .sidebar {
    display: none;
  }
}

/* Content Section */
.content {
  flex-grow: 1;
  padding: 20px;
}

/* Cards */
.card {
  border-radius: 10px;
  padding: 15px;
  color: white;
  text-align: center;
  font-size: 18px;
  font-weight: bold;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card h4 {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 10px;
}

.card p {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 5px;
}

.card small {
  font-size: 12px;
  opacity: 0.8;
  font-weight: normal;
}

.bg-primary {
  background-color: #5390d9; /* Softer Blue */
}

.bg-success {
  background-color: #28a745;
}

.bg-warning {
  background-color: #ffc107;
  color: #fff;
}

/* Tables */
.table {
  background-color: white;
  border-radius: 8px;
  overflow: hidden;
}

.table th {
  background-color: #5390d9; /* Light Blue Header */
  color: white;
  padding: 12px;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}

.table-striped tbody tr:hover {
  background-color: #f1f1f1;
}

/* Modal */
.modal-content {
  border-radius: 10px;
}

.modal-header {
  background-color: #fef577;
}

.modal-title {
  font-weight: 600;
  color: #333;
}

.modal-footer .btn {
  font-weight: 600;
  border-radius: 5px;
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

/* Contact Query */
.contact-query {
  margin-top: 30px;
}

/* Donations Chart */
#donationsChart {
  background: white;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

 @endsection

@section('content')
@include('layouts.navbar')
  <!-- Main Content -->
  <main>
        <div class="sidebar">
            <a href="#dashboard">Dashboard</a>
            <a href="/admin/manage-events">Manage Events</a>
            <a href="{{ route('admin.attendance.index') }}" >Mark Attendance</a>
        </div>

        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card bg-primary text-white p-3">
                        <h4>Total Donations</h4>
                        <p>₹{{ number_format($totalDonations, 2) }}</p>
                        <small>({{ $totalDonationCount }} donations)</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white p-3">
                        <h4>Total Volunteers</h4>
                        <p>{{ $totalVolunteers }}</p>
                        <small>Registered users</small>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning text-white p-3">
                        <h4>Upcoming Events</h4>
                        <p>{{ $upcomingEvents }}</p>
                        <small>Events scheduled</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <canvas id="donationsChart"></canvas>
                </div>
            </div>

            <div>

            </div>
            <h3>Donations</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Amount</th>
                        <th>Payment Mode</th>
                        <th>Transaction_ID</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $donation->full_name }}</td>
                            <td>{{ $donation->email }}</td>
                            <td>{{ $donation->phone }}</td>
                            <td>{{ $donation-> location}}</td>
                            <td>{{ $donation->amount }}</td>
                            <td>
                                @if ($donation->payment_mode == 'online')
                                    <span class="badge bg-primary">Online Transfer</span>
                                @elseif ($donation->payment_mode == 'cash')
                                    <span class="badge bg-success">Cash</span>
                                @elseif ($donation->payment_mode == 'cheque')
                                    <span class="badge bg-info">Cheque</span>
                                @elseif ($donation->payment_mode == 'other')
                                    <span class="badge bg-secondary">Other</span>
                                @else
                                    <span class="badge bg-warning">Not Specified</span>
                                @endif
                            </td>
                            <td>{{ $donation-> transaction_id}}</td>
                            <td>{{ $donation-> message}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <div class="contact-query">
            <h3>Contact Queries</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject ?? 'N/A' }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>

            

            <div class="contact-query">
<h3>Registered Interns</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Position</th>
            <th>Why</th>
            <th>Skills</th>
            <th>Internship Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($internships as $intern)
            <tr>
                <td>{{ $intern->name }}</td>
                <td>{{ $intern->gender }}</td>
                <td>{{ $intern->email }}</td>
                <td>{{ $intern->phone }}</td>
                <td>{{ $intern->position }}</td>
                <td>{{ $intern->why }}</td>
                <td>{{ $intern->skills }}</td>
                <td>{{ $intern->internship_name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
        </div>
    </main>
@include('layouts.footer')
@include('layouts.adminScripts')
@endsection