@extends('layouts.app')

@section('title', 'Our Team')

@section('styles')
    html, body {
      height: 100%;
      margin: 0;
    }

    body {
      font-family: 'Roboto', sans-serif;
      background-color: white;
      margin: 0;
      color: #333;
      display: flex;
      flex-direction: column;
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
    .section-header {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .section-header h4 {
      margin: 0;
      font-weight: bold;
      font-size: 24px;
      margin-left: 15px;
      padding-top:30px;
    }

    .section-header hr {
      width: 50px;
      border: none;
      height: 1px;
      background-color: black;
      margin-top: 42px;
    }

    .section-background {
      background-color: rgba(179, 212, 255, 1);
      padding: 0;
      height: auto; /* Changed to auto for responsiveness */
    }

    .section-p {
      font-size: 42px;
      font-weight: bold;
      margin-bottom: 40px;
      margin-top: 40px;
      text-align: left;
    }

    .carousel-wrapper {
      overflow: hidden;
      position: relative;
      margin-bottom: 60px;
    }

    .card-container {
      display: flex;
      transition: transform 0.5s ease;
    }

    .card {
      background-color: white;
      color: black;
      border-radius: 15px;
      width: 350px;
      height: 450px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      flex: 0 0 350px;
      margin-right: 20px;
    }

    .card img {
      border-radius: 15px;
      width: 250px;
      height: 250px;
      object-fit: cover;
    }

    .carousel-control-prev, .carousel-control-next {
      width: 40px;
      height: 40px;
      opacity: 1; /* Make arrows always visible */
      transition: opacity 0.3s ease;
      cursor: pointer;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
      background-image: none; /* Remove default arrow image */
    }

    .carousel-control-prev::before, .carousel-control-next::before {
      content: '';
      border: solid black; /* Change arrow color to black */
      border-width: 0 3px 3px 0;
      display: inline-block;
      padding: 3px;
    }

    .carousel-control-prev::before {
      transform: rotate(135deg);
      -webkit-transform: rotate(135deg);
      
    }

    .carousel-control-next::before {
      transform: rotate(-45deg);
      -webkit-transform: rotate(-45deg);
    }
    .carousel-control-prev, .carousel-control-next {
      width: 40px;
      height: 40px;
      opacity: 1; /* Make arrows always visible */
      transition: opacity 0.3s ease;
      cursor: pointer;
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
      background-image: none; /* Remove default arrow image */
    }

    .carousel-control-prev::before, .carousel-control-next::before {
      content: '';
      border: solid black; /* Change arrow color to black */
      border-width: 0 4px 4px 0; /* Increase arrow size */
      display: inline-block;
      padding: 5px; /* Increase arrow size */
    }

    .carousel-control-prev::before {
      transform: rotate(135deg);
      -webkit-transform: rotate(135deg);
    }

    .carousel-control-next::before {
      transform: rotate(-45deg);
      -webkit-transform: rotate(-45deg);
    }

    .carousel-control-prev {
      left: 25px; /* Add spacing from left border */
    }
    .section-header h4 {
      font-size: 20px;
    }

    .section-header hr {
      width: 70px;
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
    @media (max-width: 1200px) {
      .card {
        width: 300px;
        height: 420px;
      }
    }

    @media (max-width: 992px) {
      .card {
        width: 280px;
        height: 400px;
      }
      .section-p{
          font-size: 32px;
      }
    }
        @media (max-width: 768px) {
      .card {
        width: 250px;
        height: 380px;
      }
      .section-p{
          font-size: 28px;
      }
    }
        @media (max-width: 576px) {
      .card {
        width: 220px;
        height: 350px;
      }
      .section-p{
          font-size: 24px;
      }
    }
@endsection

@section('content')
@include('layouts.navbar')

<div class="section-background">
  <div class="container">
    <div class="section-header mb-5">
      <hr />
      <h4>Our Team</h4>
    </div>
    <p class="section-p text-left mb-5">Teamwork makes all the difference <br> and brings the 'extra' into the ordinary</p>

    <!-- Core Team Section -->
    <h3 class="text-center my-4">Core Team Members</h3>
    <div class="carousel-wrapper">
      <div id="coreCarousel" class="card-container">
        @foreach ($core as $member)
        <div class="card p-4">
          <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" class="img-fluid" />
          <h5 class="mt-3">{{ $member['name'] }}</h5>
          <p>Core Team</p>
        </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" onclick="scrollCarousel('coreCarousel', -1)">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" onclick="scrollCarousel('coreCarousel', 1)">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

    <!-- Volunteers Section -->
    <h3 class="text-center my-4">Volunteers</h3>
    <div class="carousel-wrapper">
      <div id="volunteerCarousel" class="card-container">
        @foreach ($volunteers as $volunteer)
        <div class="card p-4">
          <img src="{{ asset($volunteer['image']) }}" alt="{{ $volunteer['name'] }}" class="img-fluid" />
          <h5 class="mt-3">{{ $volunteer['name'] }}</h5>
          <p>Volunteer</p>
        </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" onclick="scrollCarousel('volunteerCarousel', -1)">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" onclick="scrollCarousel('volunteerCarousel', 1)">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

    

  </div>
</div>

@include('layouts.footer')

<script>
  function scrollCarousel(containerId, direction) {
    const container = document.getElementById(containerId);
    const cardWidth = container.children[0].offsetWidth + 20; // Including margin
    const visibleCards = Math.floor(container.parentElement.offsetWidth / cardWidth);
    const totalCards = container.children.length;
    const maxScroll = Math.max(0, (totalCards - visibleCards) * cardWidth);
    let currentScroll = container.dataset.scroll ? parseInt(container.dataset.scroll) : 0;

    currentScroll += direction * cardWidth * visibleCards;
    currentScroll = Math.max(0, Math.min(currentScroll, maxScroll));

    container.dataset.scroll = currentScroll;
    container.style.transform = `translateX(-${currentScroll}px)`;
  }
</script>
@endsection