@extends('layouts.app')

@section('title', 'Contact Queries')

@section('content')
    @include('layouts.navbar')

    <main>
        <div class="sidebar">
            <a href="#dashboard">Dashboard</a>
            <a href="#events">Manage Events</a>
            <a href="#donations">Donations</a>
            <a href="#settings">Settings</a>
        </div>

        <div class="content">
            <h2>Contact Queries</h2>

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
                    @foreach($contacts as $contact)
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
    </main>

    @include('layouts.footer')
    @include('layouts.homeScripts')
@endsection