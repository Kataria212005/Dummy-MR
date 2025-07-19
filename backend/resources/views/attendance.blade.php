@extends('layouts.app')

@section('title', 'Attendance')

@section('styles')
    @parent
        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
            color: #333;
        }

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

        main {
            flex: 1;
            display: flex;
            padding: 20px;
            gap: 20px;
        }

        .sidebar {
            background-color: #d5e7ff;
            width: 220px;
            min-width: 220px;
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
            background-color: #bdd5f8;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .table {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .table th {
            background-color: #5390d9;
            color: white;
            padding: 12px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        .table-striped tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-primary {
            background-color: #0b5ed7;
        }

        .btn-success {
            background-color: #28a745;
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
            margin-right: 6px;
            color: white;
            font-size: 20px;
        }
@endsection

@section('content')
@include('layouts.navbar')

<main>
    <div class="sidebar">
        <a href="/admin">Dashboard</a>
        <a href="/admin/manage-events">Manage Events</a>
        <a href="{{ route('admin.attendance.index') }}">Mark Attendance</a>
    </div>

    <div class="content">
        @if (!isset($event))
            <h3>Select an Event to Mark Attendance</h3>
            <ul class="list-group mt-4">
                @foreach ($events as $eventItem)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $eventItem->name }}
                        <a href="{{ route('admin.attendance.show', $eventItem->id) }}" class="btn btn-sm btn-primary">Mark Attendance</a>
                    </li>
                @endforeach
            </ul>
        @else
            <h3>Mark Attendance for: {{ $event->name }}</h3>

            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.attendance.update', $event->id) }}">
                @csrf
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th>Volunteer Name</th>
                            <th>Present?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)
                            <tr>
                                <td>{{ $registration->user->name }}</td>
                                <td>
                                    <input type="checkbox" name="attendance[{{ $registration->id }}]" value="1"
                                        {{ optional($registration->attendance)->present ? 'checked' : '' }}>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button type="submit" class="btn btn-success">Save Attendance</button>
            </form>
        @endif
    </div>
</main>
@include('layouts.footer')
@endsection
