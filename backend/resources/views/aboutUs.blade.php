@extends('layouts.app')

@section('title', 'About Us')

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

.hero-section {
background: linear-gradient(to bottom,#ffffff 50%,#b3d4ff 50%);
padding: 60px 0;
position: relative;
margin-top: -1.5rem;
}

.hero-content {
text-align: justify;
font-size: 1.2rem;
color: #333;
}

.hero-title {
font-size: 2.5rem;
font-weight: 700;
color: #222;
}

.featured-vid {
border-radius: 10px;
overflow: hidden;
}

.play-button {
cursor: pointer;
z-index: 10;
}

@media (max-width: 768px) {
.hero-title {
font-size: 1.5rem;
}

.hero-text {
transform: translateY(20px);
}

.hero-content {
font-size: 1rem;
}

.highlight-section {
font-size: 1rem;
text-align: justify;
}

.title-content {
flex-direction: column;
align-items: center;
}
}

.highlight-section{
  font-size: 1.2rem;
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

.award-card {
text-align: center;
padding: 20px;
border-radius: 10px;
margin-bottom: 20px;
}

.award-icon {
width: 60px;
height: 60px;
background-color: #f8f9fa;
border-radius: 50%;
display: flex;
align-items: center;
justify-content: center;
margin: 0 auto 15px;
}

.award-icon i {
color: var(--primary-color);
font-size: 1.5rem;
}

.impact-section {
background-color: #ffd700;
padding: 60px 0;
border-radius: 10px;
margin: 0 70px;
}

@media (max-width: 768px) {
.impact-section {
margin: 0 20px;
}
}


.impact-title {
font-size: 2.9rem;
font-weight: 700;
margin-bottom: 20px;
}

.impact-content {
color: var(--dark-text);
font-size: 1.1rem;
text-align: justify;
}

.cta-section {
background-image: url("{{asset('assets/images/pathshala3.jpg')}}");
background-size: cover;
background-position: center;
color: white;
padding: 60px 0;
text-align: center;
position: relative;
}

.cta-section::before {
content: "";
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

   .projects container {
            max-width: 1400px;
            font-size: 1.2rem;
        }

.projects Heading1 {
display: flex;
align-items: center;
gap: 10px;
}

.projects Heading1 hr {
width: 50px;
height: 2px;
background-color: black;
border: none;
margin: 0;
flex-shrink: 0;
align-self: center;
}

.projects Heading1 p {
font-weight: bold;
text-transform: uppercase;
margin: 0;
font-size: 0.9rem;
}

.projects Heading2 {
display: flex;
align-items: center;
gap: 10px;
}

.projects Heading2 hr {
width: 45px;
height: 2px;
background-color: black;
border: none;
margin: 0;
flex-shrink: 0;
align-self: center;
margin-bottom: 5px;
}

.projects Heading2 p {
font-weight: bold;
text-transform: uppercase;
margin: 0;
}

/* Headings */
.projects section-heading {
font-size: 2rem;
font-weight: bold;
margin-bottom: 35px;
}

/* Buttons */
.projects btn-custom {
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

.projects btn-custom:hover {
background-color: #002a6d;
}
.projects img-fluid {
margin-top: 100px;
height: 400px;
border-radius: 10px;
box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

        .projects .main-heading {
    font-size: 1.1rem;
    color:bl;
    letter-spacing: 1px;
    font-weight: 700;
}

.projects .section-heading {
    font-size: 2rem;
    color: #222;
    font-weight: 700;
}

.projects .justify-text {
    font-size: 1.1rem;
    color: #444;
    text-align: justify;
}

.projects .explore-projects-btn {
    font-weight: 600;
    background: #0b5ed7;
    border: none;
    transition: background 0.3s;
}

.projects .explore-projects-btn:hover {
    background: #ffd700; !important;
    color: #fff !important;
}

.projects img.img-fluid {
    max-width: 90%;
    border-radius: 18px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.10);
}

.hero-section-content{
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  gap: 2rem;
}

@media(max-width: 500px) {
  .hero-section-content {
    flex-direction: column;
    margin-top: 2.5rem;
    gap:1.1rem;
  }

  .highlight-section{
  font-size: 1.1rem;
}
}

@media(max-width: 768px) {
  .impact-title{
    font-size:2rem;
  }
}
    @endsection

    @section('content')
    @include('layouts.navbar')
    
  <main>
    <!-- Hero Section -->
    <section class="hero-section mb-5">
      <section class="container py-5">
        <div class="d-flex justify-content-space-between align-items-center">
          <span class="section-divider"></span>
          <h5 class="fw-bold text-uppercase section-label">Know About Us</h5>
        </div>
        <div class="title-content align-items-center mt-1">
          <div class="hero-section-content ">
            <h1 class="hero-title">We are the changemakers in the society</h1>
            <p class="hero-content mx-auto mt-1" style="max-width: 700px">
              Our vision is a world where the diversity of live thrives, and
              people act to conserve nature for its own sake and its ability
              to fulfil our needs and enrich our lives. Our vision is to work
              upon a society which promotes sustainability, environmental
              stewardship, education and skill development for underprivileged
              children and to conduct projects for children welfare. Our
              vision is to spread positivity and happiness in all possible
              ways.
            </p>
          </div>
          <div class="featured-vid mt-4 mt-lg-0 position-relative justify-content-center">
            <video id="heroVideo" src="{{asset('assets/videos/mr.mp4')}}" class="img-fluid rounded mt-5"
              style="
                  width: 85%;
                  display: block;
                  margin-left: auto;
                  margin-right: auto;
                " controls></video>
          </div>
        </div>

      <section class="highlight-section mt-5 fw-bold text-align-justify">
        <p>
          Sustainable change won't occur unless members of civil society are
          actively involved in the development process. Muskurate Raho
          educates the public to make them collaborators in its objectives.
        </p>
      </section>

    </section>
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
            <img src="{{ asset('assets/images/collaborators/morgan-stanley-logo.jpg') }}" alt="Morgan Stanley"
              class="img-fluid">
          </div>
          <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
            <img src="{{ asset('assets/images/collaborators/axis-bank-logo.png') }}" alt="Axis Bank" class="img-fluid">
          </div>
          <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
            <img src="{{ asset('assets/images/collaborators/h&m-logo.png') }}" alt="H&M" class="img-fluid">
          </div>
          <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
            <img src="{{ asset('assets/images/collaborators/tata-aia-logo.png') }}" alt="Tata AIA" class="img-fluid">
          </div>
          <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
            <img src="{{ asset('assets/images/collaborators/oracle-logo.jpg') }}" alt="Oracle" class="img-fluid"
              style="margin-top:1rem;">
          </div>
          <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
            <img src="{{ asset('assets/images/collaborators/ocs-logo.png') }}" alt="OCS" class="img-fluid">
          </div>
          <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
            <img src="{{ asset('assets/images/collaborators/thermax-logo.png') }}" alt="Thermax Global"
              class="img-fluid">
          </div>
          <div class="col-4 col-md-2 px-3 py-3 collaborator-logo">
            <img src="{{ asset('assets/images/collaborators/universal-plastic-logo.png') }}" alt="Universal Plastic"
              class="img-fluid" style="margin-top:2.5rem;">
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
  <!-- Awards Section -->
  

  <!-- Impact Section -->
  <section class="impact-section mb-5">
    <div class="container">
      <div class="row">
        <h6 class="fw-bold text-uppercase">Our Journey</h6>
        <div class="col-lg-6 d-flex flex-column justify-content-center gap-3">
          <h2 class="fw-bold mb-4 impact-title">
            How we are creating impact
          </h2>
          <p class="mb-4 impact-content">
            We are committed to making a difference by addressing critical
            issues such as education, healthcare, environmental
            sustainability, and social welfare. Through our initiatives, we
            aim to empower communities, uplift underprivileged individuals,
            and create a positive and lasting impact on society.
          </p>
          <div class="d-flex mb-3">
            <div class="flex-shrink-0">
              <i class="fas fa-check-circle text-dark-txt me-2"></i>
            </div>
            <div>
              <p class="mb-1 impact-content">
                Providing education to underprivileged children
              </p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <div class="flex-shrink-0">
              <i class="fas fa-check-circle text- me-2"></i>
            </div>
            <div>
              <p class="mb-1 impact-content">
                Creating sustainable development programs
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="featured-image mt-4 mt-lg-0">
            <img src="{{asset('assets/images/mr_group.jpg')}}" alt="Impact image" class="img-fluid rounded" style="
                    width: 100%;
                    height: 100%;
                    display: block;
                    margin-top: -40px;
                    border-radius: 10px;
                    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
                  " />
            </div>
          </div>
        </div>
      </div>
    </section>

  <!-- CTA Section -->


    <section class="projects py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="d-flex align-items-center mb-3">
                    <hr style="width:40px; height:2px; background:#222; margin:0 12px 0 0;">
                    <span class="main-heading text-uppercase fw-bold">What We Do</span>
                </div>
                <h2 class="section-heading fw-bold mb-3">We bring smiles to lives & our planet</h2>
                <p class="justify-text mb-4">At Muskurate Raho, we work to bring smiles to lives and our planet by driving sustainable waste management through weekly beach cleanups, conducting plantation and restoration drives to save our saviors, and empowering underprivileged students through Project Pathshala’s transformative art and craft education initiatives.</p>
                <a href="/projects" class="btn btn-primary px-4 py-2 explore-projects-btn">Explore Our Projects</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/images/whatweDo-image1.jpg') }}" alt="Smiling children" class="img-fluid rounded shadow">
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
@include('layouts.aboutusScripts')
@endsection