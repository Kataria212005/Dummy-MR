@extends('layouts.app')

@section('styles')
/* General Styles */
body {
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
background-color: #f8f9fa;
margin: 0;
padding: 0;
color: #333;
}

.logo {
height: 70px;
}

/* Navbar */
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
transition: background 0.3s ease;
}

.donate-btn:hover {
background-color: #e0a800;
}
.main-container{
margin-left: 80px; /* Adjusted for sidebar width */
padding: 20px;
width: calc(100% - 100px); /* Full width minus sidebar */
}

/* Sidebar Styling */
.sidebar {
background-color: #d5e7ff;
width: 220px;
min-width: 220px;
padding: 20px 15px;
border-radius: 10px;
box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
margin-left: 0;
position: relative;
top: 0;
bottom: 0;
overflow-y: auto;
z-index: 1000;
}

.page-layout{
display: flex;
padding: 20px;

}

.sidebar a {
display: block;
padding: 12px 15px;
text-decoration: none;
font-size: 16px;
color: black;
font-weight: 620;
transition: background 0.3s ease, color 0.3s ease;
border-radius: 5px;
margin-bottom: 5px;
}

.sidebar a:hover {
background-color: #bdd5f8;
color: #0b5ed7;
}

/* Page Content *

/* Heading */
h1 {
font-size: 26px;
margin-bottom: 20px;
font-weight: 600;
}

/* Form Container */
.card {
background: white;
border-radius: 8px;
box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
padding: 25px;
margin-bottom: 25px;
max-width: 800px;
}

/* Input Fields */
.form-control {
width: 100%;
border: 1px solid #ccc;
padding: 10px;
border-radius: 5px;
font-size: 16px;
margin-bottom: 15px;
transition: border-color 0.3s ease;
}

.form-control:focus {
border-color: #0b5ed7;
outline: none;
}

/* Button Styling */
.btn-primary {
background-color: #0b5ed7;
border: none;
padding: 10px 20px;
border-radius: 5px;
font-size: 16px;
color: white;
cursor: pointer;
transition: background 0.3s;
}

.btn-primary:hover {
background-color: #084298;
}

/* Table Styling */
.table {
width: 100%;
border-collapse: collapse;
margin-top: 20px;
background-color: white;
border-radius: 8px;
overflow: hidden;
}

.table th {
background: #0b5ed7;
color: white;
padding: 12px;
text-align: left;
}

.table td {
padding: 12px;
border-bottom: 1px solid #ddd;
}

.table tr:nth-child(even) {
background: #f2f2f2;
}

/* Responsive */
@media (max-width: 768px) {
.sidebar {
width: 100%;
height: auto;
position: relative;
margin-bottom: 20px;
}

.container {
margin-left: 0;
padding: 20px;
}

.card {
padding: 20px;
}
}

/* Footer Links */
.footer-link {
color: #ccc;
text-decoration: none;
}

.footer-link:hover {
color: #fff;
text-decoration: underline;
}

/* Social Section */
.social-section {
margin-bottom: 15px;
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
margin-right: 6px;
color: white;
font-size: 20px;
}
@endsection

@section('content')
@include('layouts.navbar')
<main>
    <section class="page-layout">
        <div class="sidebar">
            <a href="/admin">Dashboard</a>
            <a href="/admin/manage-events">Manage Events</a>
            <a href="{{ route('admin.attendance.index') }}">Mark Attendance</a>
        </div>
        <div class="main-container">

            <h2 class="mb-4">Manage Events</h2>

            {{-- Success Message --}}
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Event Form --}}
            <div class="card p-4 mb-4">
                <h4>Add New Event</h4>
                <form action="{{ route('events.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Event Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Time</label>
                        <input type="time" name="time" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Event</button>
                </form>
            </div>

            {{-- Events Table --}}
            <div class="card p-4">
                <h4>Existing Events</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->date }}</td>
                            <td>{{ $event->time }}</td>
                            <td>{{ $event->location }}</td>
                            <td>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
@include('layouts.footer')
@endsection