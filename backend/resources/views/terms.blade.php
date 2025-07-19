@extends('layouts.app')

@section('title', 'Terms and Conditions')

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
            list-style:none;
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
    <h1 class="mb-4">Terms and Conditions for Muskurate Raho</h1>
    <p>By accessing and using the Muskurate Raho website, you agree to comply with and be bound by the following terms and conditions:</p>

    <h2>1. Use of the Website:</h2>
    <ul>
        <li>1.1. You agree to use this website for lawful purposes only.</li>
        <li>1.2. You must not engage in any activity that may disrupt or interfere with the proper functioning of the website.</li>
    </ul>

    <h2>2. Intellectual Property:</h2>
    <ul>
        <li>2.1. All content on this website, including text, graphics, logos, images, and software, is the property of Muskurate Raho and is protected by copyright and other intellectual property laws.</li>
        <li>2.2. You may not reproduce, distribute, or use any content from this website without prior written consent from Muskurate Raho.</li>
    </ul>
    
    <h2>3. User Contributions:</h2>
    <ul>
        <li>3.1. Users may have the opportunity to contribute content (e.g., comments, feedback) to the website.</li>
        <li>3.2. By submitting content, you grant Muskurate Raho a non-exclusive, royalty-free, perpetual, and worldwide license to use, modify, and publish the content for any purpose.</li>
    </ul>

    <h2>4. Privacy:</h2>
    <ul>
        <li>4.1. Your use of this website is also governed by our Privacy Policy. By using the website, you consent to the collection and use of information as described in the Privacy Policy.</li>
    </ul>

    <h2>5. Links to Third-Party Websites:</h2>
    <ul>
        <li>5.1. This website may contain links to third-party websites. Muskurate Raho is not responsible for the content or practices of these websites.</li>
        <li>5.2. The inclusion of any link does not imply endorsement by Muskurate Raho.</li>
    </ul>

    <h2>6. Limitation of Liability:</h2>
    <ul>
        <li>6.1. Muskurate Raho is not liable for any direct, indirect, incidental, consequential, or punitive damages arising out of your access to or use of the website.</li>
    </ul>

    <h2>7. Changes to Terms and Conditions:</h2>
    <ul>
        <li>7.1. Muskurate Raho reserves the right to modify or replace these terms and conditions at any time. Your continued use of the website constitutes acceptance of any such changes.</li>
    </ul>

    <h2>8. Governing Law:</h2>
    <ul>
        <li>8.1. These terms and conditions are governed by and construed in accordance with the laws of India.</li>
    </ul>

    <h2>9. Contact Us:</h2>
    <ul>
        <li>9.1. If you have any questions or concerns about these terms and conditions, please contact us at <a href="{{ route('contact') }}" style="color:#0c155a;">Contact here</a>.</li>
    </ul>
</div>
@include('layouts.footer')
@endsection