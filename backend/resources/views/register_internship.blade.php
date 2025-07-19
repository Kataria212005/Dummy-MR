@extends('layouts.app')

@section('title', 'Internship Registration')

@section('styles')
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .reg-flex-page {
            display: flex;
            min-height: 100vh;
            width: 100vw;
            align-items: center;
            justify-content: center;
            background: rgba(245,247,250,0.92);
        }
        .reg-container {
            width: 100%;
            max-width: 800px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(67,160,71,0.10), 0 2px 8px #ffc10733;
            padding: 40px 32px 32px 32px;
            position: relative;
            margin: 40px 0;
        }
        .reg-title {
            color: #0b5ed7;
            font-size: 2.1rem;
            font-weight: 700;
            margin-bottom: 28px;
            text-align: center;
            letter-spacing: 1px;
        }
        .reg-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 6px;
            display: block;
        }
        .reg-input, .reg-select, .reg-textarea {
            width: 100%;
            padding: 11px 13px;
            border: 1.5px solid #bdbdbd;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 1rem;
            background: #f9f9f9;
            transition: border 0.2s;
            resize: none;
        }
        .reg-input:focus, .reg-select:focus, .reg-textarea:focus {
            border: 1.5px solid #0b5ed7;
            outline: none;
            background: #fff;
        }
        .reg-btn {
            width: 100%;
            padding: 13px 0;
            background: blue;
            color: #fff;
            font-size: 1.13rem;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            box-shadow: 0 2px 8px #43a04733;
            transition: background 0.3s;
            margin-top: 8px;
        }
        .reg-btn:hover {
            background: linear-gradient(90deg, #ffb300 60%, #43a047 100%);
            color: #222;
        }
        .reg-required {
            color: #e53935;
            font-size: 1.1em;
            margin-left: 2px;
        }
        @media (max-width: 900px) {
            .reg-flex-page { flex-direction: column; }
            .reg-container { margin: 40px 0; }
        }
        @media (max-width: 600px) {
            .reg-container { padding: 18px 4vw; max-width: 98vw; }
        }
    </style>
@endsection

@section('content')
@if(session('success'))
    <script>
        alert(@json(session('success')));
    </script>
@endif
<div class="reg-flex-page">
    <div class="reg-container">
        <div class="reg-title">Internship Registration</div>
        @if(isset($alreadyApplied) && $alreadyApplied)
            <button class="reg-btn" disabled style="background:gray;cursor:not-allowed;">Already Applied</button>
        @else
        <form method="POST" action="{{ route('register.internship') }}">
            @csrf
            <label for="name" class="reg-label">Full Name <span class="reg-required">*</span></label>
            <input type="text" id="name" name="name" class="reg-input" required>

            <label for="gender" class="reg-label">Gender <span class="reg-required">*</span></label>
            <select id="gender" name="gender" class="reg-select" required>
                <option value="">Select</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>

            <label for="email" class="reg-label">Email <span class="reg-required">*</span></label>
            <input type="email" id="email" name="email" class="reg-input" required>

            <label for="phone" class="reg-label">Phone Number <span class="reg-required">*</span></label>
            <input type="text" id="phone" name="phone" class="reg-input" required>

            <label for="position" class="reg-label">Preferred Position <span class="reg-required">*</span></label>
            <select id="position" name="position" class="reg-select" required>
                <option value="">Select</option>
                <option>Social Media Marketing & Content Creation</option>
                <option>Fundraising & Partnership</option>
                <option>Photography & Videography</option>
                <option>Public Relations & Outreach</option>
                <option>UI/UX Design</option>
            </select>

            <label for="why" class="reg-label">Why do you want to join? <span class="reg-required">*</span></label>
            <textarea id="why" name="why" class="reg-textarea" rows="4" required placeholder="Tell us why you want to join the internship and what you hope to contribute or learn."></textarea>

            <label for="skills" class="reg-label">Relevant Skills or Experience</label>
            <input type="text" id="skills" name="skills" class="reg-input" placeholder="e.g. Social media, design, communication, etc.">

            <button type="submit" class="reg-btn">Submit Application</button>
        </form>
        @endif
    </div>
</div>
@endsection