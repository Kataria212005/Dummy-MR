@extends('layouts.app')

@section('title', 'Contact Us')

@section('styles')
        body {
            font-family: Arial, sans-serif;
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
        /* Header section  */
        .contact-header {
            background-color: #d0e5f7;
            padding: 50px 0;
            color: #333;
        }
        
        .contact-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .contact-header p {
            color: #555;
            margin-bottom: 5px;
        }
        
        /* Contact details section */
        .contact-details {
            margin-top: 30px;
        }
        
        .contact-details h5 {
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .contact-details p {
            margin-bottom: 5px;
        }
        
        .social-icons-contact {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons-contact i {
            font-size: 22px;
            color: black;
            transition: color 0.3s ease;
        }

        .social-icons-contact i:hover {
            color: #1867d9;
        }
        
        /* Map and form section */
        .map-form-section {
            background-color: #f8f9fa;
            padding: 30px 0;
        }
        
        .contact-form .form-control {
            border-radius: 0;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }
        
        .contact-form .form-label {
            color: #666;
            font-weight: 500;
        }
        
        .contact-form textarea.form-control {
            min-height: 150px;
        }
        
        .send-btn {
            background-color: #ffd146;
            color: #333;
            padding: 10px 25px;
            border: none;
            font-weight: bold;
            border-radius: 0;
        }
        
        .send-btn:hover {
            background-color: #f0c230;
            color: #333;
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
        
        /* Responsive */
        @media (max-width: 767px) {
            .contact-header {
                padding: 30px 0;
            }
            
            .contact-header h1 {
                font-size: 2rem;
            }
            
            .contact-details {
                margin-top: 20px;
                margin-bottom: 30px;
            }
        }
@endsection

@section('content')
@include('layouts.navbar')

<main>
    <!-- Contact Header Section -->
    <section class="contact-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-uppercase mb-2">CONTACT US</p>
                    <h1>We'd love to hear<br>from you</h1>
                    <p>Have any question in mind or want to enquire?</p>
                    <p>Please feel free to contact us through the form or<br>the following details.</p>
                </div>
                <div class="col-md-6">
                    <div class="contact-details">
                        <h5>Let's talk!</h5>
                        <p>+91 9867069680 · muskuraterahoorg@gmail.com</p>
                        
                        <h5 class="mt-4">Headoffice</h5>
                        <p>Mumbai, Maharashtra, India</p>
                        
                        <h5 class="mt-4">Branch Office</h5>
                        <p>Mumbai, Maharashtra, India</p>
                        
                        <div class="social-icons-contact mt-4">
                            <a href="https://www.instagram.com/muskuraterahoorg/" class="me-3"><i class="fab fa-instagram"></i></a>
                            <a href="https://x.com/muskuraterahorg" class="me-3"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="https://www.facebook.com/muskuraterahoorg/" class="me-3"><i class="fab fa-facebook"></i></a>
                            <a href="https://www.youtube.com/@muskuraterahoorg" class="me-3"><i class="fab fa-youtube"></i></a>
                            <a href="https://in.linkedin.com/company/muskurateraho?trk=public_post_feed-actor-name" class="me-3"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Map and Contact Form Section -->
    <section class="map-form-section">
        <div class="container">
            <div class="row">
                <!-- Map Column -->
                <div class="col-md-6">
                    <div class="map-container" style="height: 400px; background-color: #e9ecef;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241317.11609823277!2d72.74109995709657!3d19.08219783958221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6306644edc1%3A0x5da4ed8f8d648c69!2sMumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1648026861468!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                
                <!-- Form Column -->
                <div class="col-md-6">
                    <form method="POST" action="{{ route('contact.store') }}" class="contact-form mt-4 mt-md-0">
                        @csrf  <!-- CSRF Token for security -->

                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="{{ old('first_name') }}">
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ old('last_name') }}">
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Email Id</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Subject</label>
                                <input type="text" name="subject" class="form-control" placeholder="Enter the Subject" value="{{ old('subject') }}">
                                @error('subject')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Message</label>
                                <textarea name="message" class="form-control" placeholder="Type your Message">{{ old('message') }}</textarea>
                                @error('message')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="text-end mt-3">
                            <button type="submit" class="btn send-btn">Send message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
    
@include('layouts.footer')  
@endsection