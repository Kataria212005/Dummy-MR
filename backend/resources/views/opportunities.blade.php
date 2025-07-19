@extends('layouts.app')

@section('title','Opportunities')

@section('styles')
    body {
        font-family: Arial, sans-serif;
    }

    .logo {
        height: 70px;
    }

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
    }

    /* General Styles */

    /* Section 1 - Hero Section */
    .container {
        max-width: 1400px;
        font-size: 1.2rem;
    }

    .Heading1 {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .Heading1 hr {
        width: 50px;
        height: 2px;
        background-color: black;
        border: none;
        margin: 0;
        flex-shrink: 0;
        align-self: center;
    }

    .Heading1 p {
        font-weight: bold;
        text-transform: uppercase;
        margin: 0;
        font-size: 0.9rem;
    }

    .Heading2 {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .Heading2 hr {
        width: 45px;
        height: 2px;
        background-color: black;
        border: none;
        margin: 0;
        flex-shrink: 0;
        align-self: center;
        margin-bottom: 5px;
    }

    .Heading2 p {
        font-weight: bold;
        text-transform: uppercase;
        margin: 0;
    }

    /* Headings */
    .section-heading {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 35px;
    }

    .justify-text {
        text-align: justify;
    }



    /* Buttons */
    .btn-custom {
        margin-top: 20px;
        background-color: #ffc107;
        color: black;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 25px;
        transition: background 0.3s ease-in-out;
    }

    .btn-custom:hover {
        background-color: #002a6d;
    }

    .icon {
        font-size: 2rem;
        margin-right: 15px;
        align-self: start;
    }

    h5 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 5px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .feature-box {
            flex-direction: column;
            text-align: center;
        }

        .icon {
            margin-bottom: 10px;
        }
    }

    .opps-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 32px 0;
        font-size: 1.2rem;
    }

    .Heading1 {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 8px;
    }

    .Heading1 hr {
        width: 60px;
        height: 3px;
        background: black;
        border: none;
        margin: 0;
        margin-left: 100px;
        margin-bottom:18px;
    }

    .Heading1 p {
        font-weight: bold;
        text-transform: uppercase;
        font-size: 1.1rem;
        color: black;
        letter-spacing: 1px;
        margin: 0;
        margin-bottom: 20px;

    }

  

    

    .internship-card {
        background: linear-gradient(135deg, #fffbe7 60%, #e0f7fa 100%);
        border-radius: 18px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.10);
        max-width: 700px;
        margin: 0 auto 40px auto;
        padding: 36px 32px 28px 32px;
        position: relative;
    }

    .internship-card-header {
        display: flex;
        align-items: center;
        gap: 18px;
        margin-bottom: 18px;
    }

    .internship-logo {
        height: 60px;
        width: 60px;
        border-radius: 50%;
        box-shadow: 0 2px 8px #ffc10755;
    }

    .internship-title {
        font-family: 'Baloo 2', cursive;
        color: #ff7043;
        font-size: 2.2rem;
        margin: 0;
        letter-spacing: 2px;
    }

    .internship-title span {
        color: #ffb300;
    }

    .internship-desc {
        font-size: 1.1rem;
        color: #388e3c;
        font-weight: 600;
        margin-top: 2px;
    }

    .internship-details {
        background: #fff3cd;
        border-radius: 12px;
        padding: 18px 22px;
        margin-bottom: 18px;
        box-shadow: 0 2px 8px #ffc10722;
    }

    .internship-details ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .internship-details ul ul {
        margin: 6px 0 0 18px;
    }

    .internship-apply {
        text-align: center;
        margin-top: 18px;
    }

    .internship-apply .btn-custom {
        font-size: 1.1rem;
        padding: 12px 32px;
        background: #43a047;
        color: #fff;
        border-radius: 30px;
        font-weight: bold;
        box-shadow: 0 2px 8px #43a04733;
    }

    .internship-apply .btn-custom:hover {
        background: #388e3c;
    }

    .internship-contact {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 28px;
        font-size: 1rem;
        color: #333;
    }

    .opps-benefits {
        text-align: center;
        margin-top: 48px;
    }

    .opps-benefits-title {
        color: #0b5ed7;
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .opps-benefits-row {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 32px;
    }

    .opps-benefit-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 2px 8px #ffc10733;
        padding: 24px 20px;
        width: 260px;
    }

    .opps-benefit-icon {
        font-size: 2.2rem;
        margin-bottom: 10px;
    }

    .opps-benefit-title {
        font-weight: 700;
        margin-bottom: 6px;
    }

    .opps-benefit-growth {
        color: #388e3c;
    }

    .opps-benefit-community {
        color: #ff7043;
    }

    .opps-benefit-impact {
        color: #43a047;
    }

    .opps-benefit-desc {
        color: #444;
        font-size: 1rem;
    }

    .opps-faq {
        margin: 60px auto 0 auto;
        max-width: 700px;
        text-align: center;
    }

    .opps-faq-title {
        color: #ff7043;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .opps-faq-box {
        background: #fffbe7;
        border-radius: 12px;
        box-shadow: 0 2px 8px #ffc10722;
        padding: 22px 28px;
        text-align: left;
    }

    .opps-faq-box div {
        margin-bottom: 18px;
    }

    .opps-faq-box div:last-child {
        margin-bottom: 0;
    }

    .opps-faq-answer {
        color: #444;
    }

    @media (max-width: 900px) {
        .internship-card, .opps-faq { max-width: 98vw; }
        .opps-benefit-card { width: 90vw; max-width: 320px; }
    }

    @media (max-width: 600px) {
        .internship-card, .opps-faq { padding: 18px 4vw; }
        .opps-benefits-row { gap: 16px; }
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
<div class="opps-container">
    <div class="Heading1">
        <hr>
        <p>Explore the Opportunities</p>
    </div>
    
    <!-- Summer Internship Attractive Card Start -->
    <div class="internship-card">
        <div class="internship-card-header">
            <img src="/assets/images/logo.png" alt="Muskurate Raho Logo" class="internship-logo">
            <div>
                <h2 class="internship-title">SUMMER <span>INTERNSHIP</span></h2>
                <div class="internship-desc">Turn your passion into action! Join us this summer to learn, grow, and create lasting change in communities.</div>
            </div>
        </div>
        <div class="internship-details">
            <ul>
                <li><b>Duration:</b> 2 months</li>
                <li><b>Available Positions:</b>
                    <ul>
                        <li>--Social Media Marketing & Content Creation</li>
                        <li>--Fundraising & Partnership</li>
                        <li>--Photography & Videography</li>
                        <li>--Public Relations & Outreach</li>
                        <li>--UI/UX Design</li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="internship-apply">
            @if(isset($alreadyApplied) && $alreadyApplied)
                <button class="btn btn-custom" disabled style="background: #43a047; color: #fff;">Already Applied</button>
            @else
                <a href="{{ route('register.internship.form') }}" class="btn btn-custom">Apply Now</a>
            @endif
        </div>
        <div class="internship-contact">
            <div><span style="font-size: 1.2em;">📞</span> 8286758988</div>
            <div><span style="font-size: 1.2em;">✉</span> muskuraterahoorg@gmail.com</div>
        </div>
    </div>
    <!-- Summer Internship Attractive Card End -->
    <div class="opps-benefits">
        <h3 class="opps-benefits-title">Why Join Us?</h3>
        <div class="opps-benefits-row">
            <div class="opps-benefit-card">
                <div class="opps-benefit-icon opps-benefit-growth">🌱</div>
                <div class="opps-benefit-title opps-benefit-growth">Empowerment</div>
                <div class="opps-benefit-desc">Help empower underprivileged communities and be a catalyst for positive change.</div>
            </div>
            <div class="opps-benefit-card">
                <div class="opps-benefit-icon opps-benefit-community">🤝</div>
                <div class="opps-benefit-title opps-benefit-community">Community Impact</div>
                <div class="opps-benefit-desc">Work with a passionate team to create real, lasting impact in society.</div>
            </div>
            <div class="opps-benefit-card">
                <div class="opps-benefit-icon opps-benefit-impact">🎯</div>
                <div class="opps-benefit-title opps-benefit-impact">Personal Growth</div>
                <div class="opps-benefit-desc">Develop leadership, teamwork, and communication skills while serving a greater cause.</div>
            </div>
        </div>
    </div>
    <div class="opps-faq">
        <h4 class="opps-faq-title">Frequently Asked Questions</h4>
        <div class="opps-faq-box">
            <div><b>Who can apply?</b><br><span class="opps-faq-answer">Any college student passionate about learning and contributing.</span></div>
            <div><b>Is it paid?</b><br><span class="opps-faq-answer">This is an unpaid internship focused on learning and impact.</span></div>
            <div><b>How do I apply?</b><br><span class="opps-faq-answer">Click the "Apply Now" button or email us at muskuraterahoorg@gmail.com.</span></div>
        </div>
    </div>
</div>
@include('layouts.footer')
@include('layouts.homeScripts')
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var openBtn = document.getElementById('openRegistrationBtn');
        var closeBtn = document.getElementById('closeRegistrationBtn');
        var modal = document.getElementById('registrationModal');
        if (openBtn && closeBtn && modal) {
            openBtn.onclick = function() {
                modal.style.display = 'block';
            };
            closeBtn.onclick = function() {
                modal.style.display = 'none';
            };
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            };
        }
    });
</script>
@endsection