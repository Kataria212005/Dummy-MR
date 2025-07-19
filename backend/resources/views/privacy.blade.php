@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('styles')
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

        .content{
            max-width: 90%;
            margin: 0 auto;
            padding: 20px 28px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            color:#0c155a;
        }

        .content h1{
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .content h2{
            margin-top: 2rem;
            font-weight:505;
        }

        .content p{
            text-align: justify;
            font-size: 1.07rem;
        }

        .content ul li{
            text-align: justify;
            font-size: 1.07rem;
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
<div class="content container mt-5">
    <h1 class="mb-4">Privacy Policy</h1>
    <p>Thank you for visiting Muskurate Raho. This Privacy Policy outlines how we collect, use, disclose, and protect the information you provide when using our website or any of our services.</p>

    <h2>1. Information We Collect:</h2>
    <ul>
        <li>Personal Information: This includes, but is not limited to, your name, email address, and any other information you provide voluntarily.</li>
        <li>Log Data: We may collect information about your device and usage of our website, including IP address, browser type, pages visited, and other statistics.</li>
    </ul>

    <h2>2. How We Use Your Information:</h2>
    <ul>
        <li>To provide and maintain our services.</li>
        <li>To personalize your experience on our website.</li>
        <li>To send you updates and communications related to our NGO.</li>
    </ul>
    
    <h2>3. Third-Party Access:</h2>
    <p>We may share your information with third parties, such as Google, for the purpose of providing certain services. Please refer to the respective privacy policies of these third-party services for more information.</p>

    <h2>4. Data Security</h2>
    <p>We take reasonable measures to protect your information from unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>

    <h2>5. Cookies and Tracking:</h2>
    <p>We use cookies and similar tracking technologies to improve your experience on our website. You can manage your cookie preferences through your browser settings.</p>

    <h2>6. Your Rights:</h2>
    <p>You have the right to access, correct, or delete your personal information. If you have any concerns or questions, please contact us using the information provided below.</p>

    <h2>7. Changes to the Privacy Policy:</h2>
    <p>We may update this Privacy Policy from time to time. Any significant changes will be communicated to you via email or through our website.</p>

    <h2>8. Contact Us:</h2>
    <p>If you have any questions or concerns about this Privacy Policy, please contact us at <a href="{{ route('contact') }}" style="color:#0c155a;">Contact here</a>.</p>
</div>
@include('layouts.footer')
@endsection