@extends('layouts.app')
@section('title', 'SuperAdmin Dashboard')

@section('styles')
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

    @media (max-width: 768px) {
    .table-responsive-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table-responsive-wrapper table {
        width: 100%;
        min-width: 600px; /* Ensures columns don't get too squished */
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
            margin-right: 6px;
            color: white;
            font-size: 20px;
        }
        
@endsection

@section('content')
@include('layouts.navbar')

<div class="container mt-4">
    <h2>Manage Admins</h2>

    {{-- Flash Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add Admin Form --}}
    @include('layouts.userManagement')

    {{-- Table of Users --}}
    <div class="table-responsive-wrapper">
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @if($user->role !== 'superadmin')
                        <form method="POST" action="{{ route('superadmin.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        @else
                            <em>Protected</em>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('layouts.footer') 
@endsection
