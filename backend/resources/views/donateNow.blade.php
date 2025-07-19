@extends('layouts.app')

@section('title', 'Donate Page')

@section('styles')
body {
font-family: 'Roboto', sans-serif;
background-color: white;
margin: 0;
color: #333;
display: flex;
flex-direction: column;
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

/* Hero Section Styling (Blue Section) */
.hero-section {
background-color: rgba(179, 212, 255, 1);
padding: 60px 0;
}

.hero-title {
display: flex;
align-items: center;
gap: 10px;
}

.custom-hr {
width: 50px;
height: 2px;
background-color: black;
opacity: 1;
border: none;
}

.hero-section h6 {
font-size: 18px;
font-weight: bold;
text-transform: uppercase;
margin: 0;
padding-top: 1px;
}

.hero-section h2 {
font-size: 46px;
padding-left: 55px;
}

.hero-section p {
font-size: 18px;
padding-left: 55px;
padding-top: 20px;
}

.donate-btn2 {
background-color: rgba(242, 201, 76, 1);
border: none;
padding: 12px 24px;
font-weight: bold;
font-size: 18px;
margin-left: 55px;
margin-top: 20px;
}

.donate-btntxt {
text-decoration:none;
}

/* Active Tab Style */
.nav-tabs .nav-link.active {
border-bottom: 3px solid rgba(242, 201, 76, 1);
font-weight: bold;
}

.mt-7 {
margin-top: 90px;
}

.pb-6 {
padding-top: 10px;
}

.section-divider {
border: none;
height: 1px;
background-color: gray;
width: 85%;
margin: 20px auto;
transform: translateY(-20px);
}

/* Image Styling */
.rounded-img {
border-radius: 20px;
width: 65%;
height: auto;
display: block;
margin: 0 auto;
}

.cta-section {
background-image: url('{{ asset ('assets/images/pathshala3.jpg')}}');
background-size: cover;
background-position: center;
color: white;
padding: 60px 0;
text-align: center;
position: relative;
}

.cta-section::before {
content: '';
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(24, 24, 24, 0.5);
}

.cta-content {
padding: 40px;
color: white;
filter: brightness(1);
}

.btn-cta {
margin: 8px;
padding: 10px 20px;
font-weight: 600;
}

/* Justify Content */
.text-justify {
text-align: justify;
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

@media (max-width: 768px) {
.col-md-6 {
width: 100%;
margin-bottom: 20px;
}

.hero-section h2 {
font-size: 32px;
padding-left: 20px;
}

.hero-section p {
font-size: 16px;
padding-left: 20px;
}

.donate-btn2 {
margin-left: 20px;
}

.rounded-img {
width: 100%;
}

.hero-section {
padding: 40px 0;
}

.mt-7 {
margin-top: 30px;
}

.logo-container img {
width: 100px;
height: 100px;
}
}

@media (max-width: 576px) {
.hero-section h2 {
font-size: 28px;
}
}
@endsection

@section('content')
@include('layouts.navbar')
<main>
    <div class="container-fluid hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="hero-title">
                        <hr class="custom-hr">
                        <h6 class="mb-0">Donate</h6>
                    </div>
                    <h2 class="fw-bold mt-2">Support Change That Cleans, Greens, and Empowers.</h2>
                    <p class="text-justify">When you donate to Muskurate Raho, you fuel meaningful on-ground initiatives
                        — from cleaning polluted beaches, planting green spaces, to uplifting underprivileged children.
                        Every contribution directly supports a cleaner planet and a more inclusive society.
                    </p>
                    <button class="btn donate-btn2 "><a href="/donateus" class="donate-btntxt">Donate now</a></button>

                </div>
                <div class="col-md-6">
                    <img src="{{ asset ('assets/images/Donatepage-image1.png')}}" alt="Donation Box"
                        class="img-fluid rounded-img">
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h1 class="fw-bold mb-5">How you can contribute to <br> real grassroots impact</h1>
                <p class="text-justify" Your support strengthens our mission to: 🌊 Clean polluted coastlines 🌳 Green
                    our concrete cities 🎁 Uplift children with care and education </p> </div> <div class="col-md-6">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#overview">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#impact">Impact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#benefits">What You Get</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-7">
                        <div id="overview" class="tab-pane fade show active">
                            <p class="text-justify">Muskurate Raho is powered by people like you. Your donation enables
                                impactful projects across environmental restoration, urban greening, and child welfare.
                                We make sure your funds reach where they’re needed most — on the ground.</p>
                        </div>
                        <div id="impact" class="tab-pane fade">
                            <p class="text-justify">Here’s where your donation goes:<br>
                                🧤 Project Makeover Mahim
                                Funds are used to buy gloves, weighing machines, garbage bags, and safety tools to
                                support massive beach cleanup drives in Mumbai.,<br>

                                🌱 Project Green Smiles
                                Your support helps us plant saplings, provide manure, water tankers, and tools to
                                transform urban corners into green spaces.<br>

                                🎒 Project Pathshala
                                We use donations to distribute essentials — from raincoats and food packets to books and
                                stationery — to children in underserved communities.
                            </p>
                        </div>
                        <div id="benefits" class="tab-pane fade">
                            <p class="text-justify">
                                <ul>
                                    <li>A chance to be part of positive change across environmental and social fronts
                                    </li>
                                    <li>Transparent monthly updates about fund utilization</li>
                                    <li>Opportunities to engage with our projects as a donor or volunteer</li>
                                </ul>
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <hr class="section-divider">

    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-start mb-4">
                <h1 class="fw-bold">How we use your donation:</h1>
            </div>
        </div>
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4 text-start pb-6 mb-4 mb-md-0">
                <p class="text-justify">
                    <strong>We maximize impact</strong><br>
                    Every rupee helps us buy and distribute real items like garbage bags, manure, books, and basic
                    utilities needed in each project.
                </p>
            </div>
            <div class="col-md-4 text-start pb-6 mb-4 mb-md-0">
                <p class="text-justify">
                    <strong>We grow sustainably</strong><br>
                    With regular donations, we can scale operations and run monthly cleanups, plantations, and
                    educational drives in new areas.
                </p>
            </div>
            <div class="col-md-4 text-end pb-6">
                <p class="text-justify">
                    <strong>We stay transparent</strong><br>
                    You’ll receive updates and visuals of your impact — clear, honest, and direct from the field.
                </p>
            </div>
        </div>
    </div>
    <section class="container py-5">
        <div class="cta-section">
            <div class="cta-content">
                <h2 class="display-5 fw-bold mb-4">Let's donate for betterment of our society and planet</h2>
                <div>
                    <a href="{{ url('/dashboard') }}">
                        <button class="btn btn-warning btn-cta">Join as a volunteer</button>
                    </a>

                    <a href="{{ url('/donateus') }}">
                        <button class="btn btn-light btn-cta">Donate</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.footer')
@endsection