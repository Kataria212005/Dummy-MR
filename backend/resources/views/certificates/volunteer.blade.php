<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #fff;
        }
        .certificate {
            border: 20px solid #0d6efd;
            padding: 40px;
            text-align: center;
            position: relative;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }
        .certificate-number {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="certificate-number">{{ $certificate_number }}</div>
        <img src="{{ public_path('assets/images/logo.png') }}" class="logo">
        <h1>Certificate of Volunteering</h1>
        <h2>{{ $user->name }}</h2>
        <p>has successfully participated as a volunteer in</p>
        <h3>{{ $event->name }}</h3>
        <p>held on {{ \Carbon\Carbon::parse($date)->format('d F Y') }}</p>
        
        <div class="signature" style="margin-top: 40px;">
            <p>_</p>
            <p>Event Coordinator</p>
            <p>Muskurate Raho</p>
        </div>
    </div>
</body>
</html>