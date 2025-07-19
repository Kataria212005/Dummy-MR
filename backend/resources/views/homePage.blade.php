@extends('layouts.app')

@section('title','Home Page')

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

.hero-section {
background-image: url("{{ asset('assets/images/home_page_slider.jpg') }}");
background-size: cover;
background-position: center;
color: white;
padding: 150px 0 0;
position: relative;
margin-bottom: 0;
}

.hero-section::before {
content: '';
position: absolute;
top: 0;
left: 0;
width: 100%;
height: 100%;
background: rgba(27, 26, 26, 0.5);
}

.hero-content {
position: relative;
z-index: 2;
padding-left: 20px;
}

.hero-title {
font-size: 40px;
font-weight: bold;
margin-bottom: 10px;
line-height: 1.2;
}

.what-we-do-btn {
background-color:white;
border-radius: 0;
padding: 6px 15px;
font-size: 14px;
font-weight: 400;
}

.what-we-do-btn a{
color:black;
text-decoration: none;
}

.what-we-do-btn:hover a{
color: white;
text-decoration: none;
}

.what-we-do-btn:hover{
border: 1px solid white;
background-color: none;
}

.projects-btn {
background-color: rgba(255, 255, 255, 0.25);
border: 1px solid white;
border-radius: 0;
padding: 6px 15px;
font-size: 14px;
}

.projects-btn a{
color: white;
text-decoration: none;
}

.projects-btn:hover{
background-color: none;
border: 1px solid white;
}

.stats-bar {
background-color: rgba(0, 0, 0, 0.7);
color: white;
padding: 10px 0;
position: relative;
z-index: 2;
margin-top: 120px;
}

.stats-bar p {
margin-bottom: 0;
font-size: 14px;
}

.section-divider {
width: 40px;
height: 2px;
background-color: #333;
margin-right: 15px;
display: inline-block;
vertical-align: middle;
}

.section-label {
text-transform: uppercase;
font-size: 20px;
font-weight: bold;
color: #555;
letter-spacing: 1px;
display: inline-block;
vertical-align: middle;
}

.about-section {
padding: 50px 0;
}

.about-title {
font-size: 28px;
font-weight: bold;
margin-bottom: 20px;
line-height: 1.3;
}

.about-text {
font-size: 15px;
line-height: 1.6;
color: #555;
margin-bottom: 20px;
text-align: justify;
margin-right: 20px;
}

.learn-more-btn {
background-color: #ffc107;
color: #333;
border-radius: 5px;
padding: 6px 20px;
font-size: 14px;
font-weight: 500;
border: none;
font-weight: 600;
transition:none;
}

.learn-more-btn:hover{
background-color: #ffc107;
}

.video-container {
position: relative;
overflow: hidden;
border-radius: 8px;
margin-top: 30px;
}

.logo-scroll-container {
scroll-behavior: smooth;
padding-bottom: 10px;
}

.scroll-arrow {
position: absolute;
top: 50%;
transform: translateY(-50%);
background: white;
border: none;
font-size: 24px;
padding: 4px 10px;
cursor: pointer;
z-index: 10;
border-radius: 50%;
box-shadow: 0 0 6px rgba(0,0,0,0.1);
opacity: 0.7;
}

.scroll-arrow.left {
left: -1.35rem;
}

.scroll-arrow.right {
right: -1.35rem;
}

.what-we-do-section {
background-color: #cce5ff;
padding: 60px 0;
}

.what-we-do-title {
font-size: 28px;
font-weight: bold;
margin-bottom: 30px;
line-height: 1.3;
}

.service-box {
background-color: white;
border-radius: 8px;
padding: 20px;
margin-bottom: 15px;
}

.service-icon {
width: 30px;
height: 30px;
background-color: #e9ecef;
border-radius: 5px;
display: flex;
align-items: center;
justify-content: center;
margin-bottom: 15px;
}

.service-title {
font-weight: 700;
font-size: 17px;
margin-bottom: 8px;
}

.service-desc {
font-size: 15px;
color: #666;
line-height: 1.5;
}

.child-image {
border-radius: 8px;
overflow: hidden;
margin-top: 40px;
}

 #impact-stats {
    background: none;
    padding: 50px 0;
}

#impact-stats h2 {
margin-bottom: 30px;
font-size: 2rem;
color: #333;
}
#impact-stats .Heading2 {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 1rem;
}

#impact-stats .Heading2 hr {
    width: 45px;
    height: 2px;
    background-color: black;
    border: none;
    margin: 0;
    flex-shrink: 0;
    align-self: center;
}

#impact-stats .main-heading {
    font-weight: bold;
    text-transform: uppercase;
    margin: 0;
    font-size: 1.1rem;
    color:black;
    letter-spacing: 1px;
}

#impact-stats h2.fw-bold {
    font-size: 2rem;
    color: #222;
    font-weight: 700;
    margin-bottom: 2rem;
    letter-spacing: 1px;
    text-shadow: 0 2px 8px rgba(0,0,0,0.04);
}



/* Impact Card Styling */
.impact-card {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    text-align: center;
    color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    width: 320px;
}

.impact-card img {
    width: 100%;
    height: 400px;
    /* Adjust as needed */
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s ease-in-out;
    filter: brightness(0.5);

}

/* Overlay Effect */
.impact-card h3,
.impact-card p,
.impact-card a.btn {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 80%;
    text-align: center;
    z-index: 2;
}

.impact-card h3 {
    top: 30%;
    font-size: 2.5rem;
    font-weight: bold;
}

.impact-card p {
    top: 50%;
    font-size: 1.5rem;
    font-weight: 500;
}

        .impact-card a.btn {
            max-width: 50%;
            bottom: 10%;
            background-color: #ffc107;
            color: #333;
            font-size: 1rem;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            transition: background 0.3s ease-in-out;
        }

.impact-card:hover {
    transform: translateY(-5px);
}

.impact-card:hover img {
    transform: scale(1.1);
}

.impact-card a.btn:hover {
    background-color: #007bff;
    color: white;
}

@media (max-width: 1400px) {
    .impact-card {
        width: 95%;
    }

    .impact-card h3 {
        font-size: 2rem;
    }

    .impact-card p {
        font-size: 1rem;
    }

    .impact-card a.btn {
        font-size: 0.9rem;
        padding: 6px 12px;
        max-width: 70%;
    }
}

@media (max-width: 768px) {
    .impact-card {
        width: 95%;
        margin:15px;
    }

    .impact-card h3 {
        font-size: 2rem;
    }

    .impact-card p {
        font-size: 1rem;
    }

    .impact-card a.btn {
        font-size: 0.8rem;
        padding: 6px 12px;
        max-width: 70%;
    }
}

@media (max-width: 576px) {
    .impact-card {
        width: 95%;
        margin:10px;
    }

    .impact-card img {
        height: 300px;
    }

    .impact-card h3 {
        font-size: 1.6rem;
    }

    .impact-card p {
        font-size: 0.9rem;
    }

    .impact-card a.btn {
        font-size: 0.7rem;
        padding: 5px 10px;
    }
}

.donation-section {
background-color: #cce5ff;
color:black;
padding: 40px 0;
}

.donate-heading{
font-size: 40px;
}

.donut-chart-container {
position: relative;
width: 100%;
max-width: 300px;
margin: 0 auto;
}

.cta-section {
background-image: url('{{ asset('assets/images/pathshala3.jpg') }}');
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

.cta-content{
padding: 40px;
color: white;
filter:brightness(1);
}

.btn-cta {
margin: 8px;
padding: 10px 20px;
font-weight: 600;
}

.event-heading{
font-size: 30px;
}

.event-card {
background-color: #ffc107;
border-radius: 15px;
padding: 20px;
height: 100%;
position: relative;
}

.event-date {
font-size: 1.8rem;
font-weight: bold;
margin-bottom: 5px;
}

.event-month {
text-transform: uppercase;
font-size: 0.9rem;
font-weight: bold;
}

.event-title {
font-weight: bold;
margin-top: 18px;
font-size: 25px;
}

.event-arrow {
position: absolute;
right: 20px;
bottom: 20px;
background-color: white;
width: 35px;
height: 35px;
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
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

.mobile-nav {
position: fixed;
bottom: 0;
left: 0;
right: 0;
background-color: white;
padding: 10px 0;
display: flex;
justify-content: space-around;
align-items: center;
box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
z-index: 1000;
}

.mobile-nav button {
background: none;
border: none;
font-size: 20px;
color: #555;
}

@media (max-width: 768px) {
.donut-chart-container {
margin-top: 30px;
}
}

@media (max-width: 992px) {
.hero-title {
font-size: 32px;
}

.about-title, .what-we-do-title {
font-size: 24px;
}
}

@media (max-width: 768px) {
.hero-content {
padding-left: 15px;
padding-right: 15px;
}

.stats-bar {
text-align: center;
}

.stats-bar p:last-child {
margin-top: 5px;
}
}
@endsection
<!-- Hero Section -->
@section('content')
@include('layouts.navbar')
<main>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">Crafting Bright<br>Tomorrows</h1>
                        <div class="d-flex mt-4">
                            <button class="what-we-do-btn btn me-3"><a href="#what-we-do">What we do</a></button>
                            <button class="btn projects-btn"><a href="{{ route('projects') }}">Our Projects</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="stats-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>{{ $children_count ?? '230' }} children under our care</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p>{{ $donations_count ?? '58' }} donations collected</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="mb-4">
                        <span class="section-divider"></span>
                        <span class="section-label">KNOW ABOUT US</span>
                    </div>
                    <h2 class="about-title">We are the changemakers<br>in the society</h2>
                    <p class="about-text">
                        "Small acts, when multiplied by millions of people, can transform the world". Keeping
                        this thought in mind to make this world a better place to live in, Muskurate Raho was
                        founded on 28th February, 2021 by its Founders Nishi Mishra and Roshan Shrivastav.
                        Muskurate Raho was created with the primary goal of sensitizing people about the
                        Environmental issues and promoting public welfare. In addition to beach cleanups
                        and plantation drives in extension, we are one of the few organizations to conduct
                        relief operations through digital platform, irrespective of caste, religion or creed (in
                        proper condition). Through project Pathshala we aim toward bright future of
                        underprivileged children with every stroke. We also visit orphanages often to bring
                        smile and joy in life of such innocent souls, as the organization's motto, "Keep
                        Smiling", suggests.
                    </p>
                    <button class="btn learn-more-btn"><a href="{{ route('about') }}"
                            style="text-decoration: none;color:black;">Learn more</a></button>
                </div>
                <div class="col-lg-5">
                    <div class="video-container">
                        <img src="{{ asset('assets/images/pathshala.jpg') }}" alt="About Video" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Collaborators Section -->
    <section class="collaborators-section">
        <div class="container">
            <div class="mb-4">
                <span class="section-divider"></span>
                <span class="section-label">OUR COLLABORATORS</span>
            </div>

            <div class="position-relative">
                <!-- Left Arrow -->
                <button class="scroll-arrow left" onclick="scrollLogos(-200)">&#10094;</button>

                <!-- Scrollable Logo Row -->
                <div class="d-flex overflow-auto flex-nowrap logo-scroll-container">
                    <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
                        <img src="{{ asset('assets/images/collaborators/morgan-stanley-logo.jpg') }}"
                            alt="Morgan Stanley" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
                        <img src="{{ asset('assets/images/collaborators/axis-bank-logo.png') }}" alt="Axis Bank"
                            class="img-fluid">
                    </div>
                    <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
                        <img src="{{ asset('assets/images/collaborators/h&m-logo.png') }}" alt="H&M" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
                        <img src="{{ asset('assets/images/collaborators/tata-aia-logo.png') }}" alt="Tata AIA"
                            class="img-fluid">
                    </div>
                    <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
                        <img src="{{ asset('assets/images/collaborators/oracle-logo.jpg') }}" alt="Oracle"
                            class="img-fluid" style="margin-top:1rem;">
                    </div>
                    <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
                        <img src="{{ asset('assets/images/collaborators/ocs-logo.png') }}" alt="OCS" class="img-fluid">
                    </div>
                    <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
                        <img src="{{ asset('assets/images/collaborators/thermax-logo.png') }}" alt="Thermax Global"
                            class="img-fluid">
                    </div>
                    <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
                        <img src="{{ asset('assets/images/collaborators/universal-plastic-logo.png') }}"
                            alt="Universal Plastic" class="img-fluid" style="margin-top:2.5rem;">
                    </div>
                    <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
                        <img src="{{ asset('assets/images/collaborators/shm-logo.png') }}" alt="SHM" class="img-fluid">
                    </div>
                </div>

                <!-- Right Arrow -->
                <button class="scroll-arrow right" onclick="scrollLogos(200)">&#10095;</button>
            </div>
        </div>
    </section>

    <!-- What We Do Section -->
    <section id="what-we-do" class="what-we-do-section">
        <div class="container">
            <div class="mb-4">
                <span class="section-divider"></span>
                <span class="section-label">WHAT WE DO</span>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="what-we-do-title">We bring smile to lives &<br>our planet</h2>

                    <div class="service-box">
                        <div class="d-flex align-items-center">
                            <div class="service-icon">
                                <i class="fas fa-recycle"></i>
                            </div>
                        </div>
                        <h5 class="service-title">Sustainable Waste Management</h5>
                        <p class="service-desc mb-0">
                            We aim to solve open waste management, focusing mainly on reducing plastic waste by
                            organizing weekly beach cleanup drive.
                        </p>
                    </div>

                    <div class="service-box">
                        <div class="d-flex align-items-center">
                            <div class="service-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                        </div>
                        <h5 class="service-title">Saving our Saviours</h5>
                        <p class="service-desc mb-0">
                            Plants don't need us, but we need them. We conduct plantation drive during monsoon season
                            and restoration during rest of the season.
                        </p>
                    </div>

                    <div class="service-box">
                        <div class="d-flex align-items-center">
                            <div class="service-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                        </div>
                        <h5 class="service-title">Crafting Bright Tomorrow's</h5>
                        <p class="service-desc mb-0">
                            Project Pathshala is a transformative initiative empowering underprivileged students through
                            art and craft education.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 d-flex justify-content-center pt-5 mt-3">
                    <div class="child-image">
                        <img src="{{ asset('assets/images/plantation.jpg') }}" alt="plantation image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

<section id="impact-stats" class="container py-5">
    <div class="Heading2">
        <hr>
        <h6 class="main-heading text-uppercase fw-bold">Projects We Have Done</h6>
    </div>
    <h2 class="fw-bold">Creating Impact Since 2021</h2>
   <div class="row mt-4">
        <!-- Impact 1 -->
        <div class="col-md-3">
            <div class="impact-card">
                <img src="{{ asset ('assets/images/plantation.jpg')}}" alt="Saplings Planted">
                <h3>3100+</h3>
                <p>Saplings planted.</p>
               <a href="/projects#plantation-drive" class="btn btn-light">Learn more</a>
            </div>
        </div>

        <!-- Impact 2 -->
        <div class="col-md-3">
            <div class="impact-card">
                <img src="{{ asset ('assets/images/whatweDo-image3.png')}}" alt="Changemakers Joined">
                <h3>13600+</h3>
                <p>Changemakers joined.</p>
                <a href="/projects#plant-restoration" class="btn btn-light">Learn more</a>
            </div>
        </div>

        <!-- Impact 3 -->
        <div class="col-md-3">
            <div class="impact-card">
                <img src="{{ asset ('assets/images/whatweDo - image2.png')}}" alt="Garbage Collected">
                <h3>2+ Lakh</h3>
                <p>Kgs of garbage collected.</p>
                <a href="/projects#makeover-mahim" class="btn btn-light">Learn more</a>
            </div>
        </div>

        <!-- Impact 4 -->
        <div class="col-md-3">
            <div class="impact-card">
                <img src="{{ asset ('assets/images/pathshala.jpg') }}" alt="Children Impacted">
                <h3>200+</h3>
                <p>Children impacted.</p>
                <a href="/projects#project-pathshala" class="btn btn-light">Learn more</a>
            </div>
        </div>
    </div>
</section>

    <!-- Donation Statistics Section -->
    <section class="donation-section">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="donate-heading fw-bold">How we spend your donations and where it goes</h2>
                    <p class="my-4">We understand that when you make a donation, you want to know exactly where your
                        money is going and we pledge to be transparent.</p>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <span class="me-2"
                                    style="display: inline-block; width: 15px; height: 15px; background-color: #0d6efd;"></span>
                                <span>40% child care home</span>
                            </div>
                            <div class="mb-3">
                                <span class="me-2"
                                    style="display: inline-block; width: 15px; height: 15px; background-color: #ffc107 ;"></span>
                                <span>10% excursions</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <span class="me-2"
                                    style="display: inline-block; width: 15px; height: 15px; background-color: #d63384;"></span>
                                <span>35% cleanliness program</span>
                            </div>
                            <div class="mb-3">
                                <span class="me-2"
                                    style="display: inline-block; width: 15px; height: 15px; background-color: #20c997;"></span>
                                <span>5% feeding the poor</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="donut-chart-container">
                        <canvas id="donationChart" width="300" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- CTA Section -->
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

<section class="container py-5">
        <h2 class="event-heading fw-bold mb-4">Our Events</h2>

        <div class="row g-4">
            <!-- Event 1 -->
            <div class="col-md-6">
                <div class="event-card">
                    <div class="d-flex">
                        <div class="me-4">
                            <i class="fa-solid fa-hand-holding-droplet fa-3x mt-4"></i>
                        </div>
                        <div>
                            <p class="small text-uppercase fw-bold mb-1">NEXT EVENTS</p>
                            <h3 class="event-title">Beach Cleanups</h3>
                        </div>
                    </div>
                    <a href="{{ url('/dashboard') }}">
                        <div class="event-arrow">
                            <i class="fas fa-arrow-right text-black"></i>
                        </div>
                    </a>

                </div>
            </div>

            <!-- Event 2 -->
            <div class="col-md-6">
                <div class="event-card">
                    <div class="d-flex">
                        <div class="me-4">
                            <i class="fa-solid fa-seedling fa-3x mt-4"></i>
                        </div>
                        <div>
                            <p class="small text-uppercase fw-bold mb-1">NEXT EVENTS</p>
                            <h3 class="event-title">Plantation Drive</h3>
                        </div>
                    </div>
                     <a href="{{ url('/dashboard') }}">
                        <div class="event-arrow">
                            <i class="fas fa-arrow-right text-black"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile Navigation Footer (visible only on small screens) -->
    <div class="d-md-none mobile-nav">
        <button type="button">
            <i class="fas fa-bars"></i>
        </button>
        <button type="button">
            <i class="far fa-square"></i>
        </button>
        <button type="button">
            <i class="fas fa-chevron-left"></i>
        </button>
    </div>
</main>
<script>
    function scrollLogos(amount) {
        const container = document.querySelector('.logo-scroll-container');
        container.scrollBy({
            left: amount,
            behavior: 'smooth'
        });
    }
</script>
@include('layouts.footer')
@include('layouts.homeScripts')
@endsection