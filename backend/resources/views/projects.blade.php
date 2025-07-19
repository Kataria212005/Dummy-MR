@extends('layouts.app')

@section('title','Projects')

@section('styles')
body {
font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
overflow-x: hidden;
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

.project-section {
margin: 50px 0;
}

.project-title {
font-size: 2.5rem;
font-weight: bold;
text-align: center;
}

.project-card {
display: flex;
flex-direction: column;
align-items: center;
margin-bottom: 40px;
gap: 20px;
}

.project-card img {
width: 100%;
max-width: 700px;
height: auto;
object-fit: cover;
border-radius: 10px;
}

.project-text {
max-width: 800px;
text-align: center;
}

.project-text h1 {
font-size: 2rem;
color: #007bff;
font-weight: bold;
margin-bottom: 1rem;
}

.project-text p {
font-size: 1.1rem;
text-align: justify;
}

/* Desktop view: image left, text right */
@media (min-width: 992px) {
.project-card {
flex-direction: row;
align-items: center;
justify-content: space-between;
}

.project-card img {
width: 50%;
height: 320px;
}

.project-text {
width: 50%;
padding-left: 30px;
text-align: left;
}
}
.section-header {
display: flex;
align-items: center;
justify-content: center;
margin-bottom: 20px;
}
.section-header hr {
width: 50px;
border: none;
height: 2px;
background-color: #000;
margin-right: 10px;
margin-top: 3.5rem;
}

        @media (min-width: 768px) {
            .project-card {
                flex-wrap: nowrap;
                text-align: left;
            }
            .project-card img {
                margin-right: 20px;
                margin-bottom: 0;
            }
            .project-text {
                text-align: left;
            }
            .project-title {
                font-size: 3rem;
                text-align: left;
            }
            .section-header {
                justify-content: flex-start;
            }
        }
         


.cta-section {
background-image: url("{{ asset('assets/images/pathshala3.jpg')}}");
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

@endsection

@section('content')
@include('layouts.navbar')

    <main>
        <div class="container">
            <div class="section-header">
                <hr>
                <h6 class="text-uppercase text-muted md-3 mt-5 fw-bold">Our Projects</h6>
            </div>
            <h1 class="project-title">Initiatives to make this world a better place <br>to live in</h1>
            
            <div class="project-section">
                <div class="project-card" id="makeover-mahim">
                    <img src="{{asset('assets/images/makeover.jpg')}}" alt="MakeOver Mahim">
                    <div class="project-text">
                        <h1>MakeOver Mahim</h1>
                        <p>Muskurate Raho is excited to introduce our ambitious project, "Makeover Mahim," aimed at cleaning and preserving our beloved Mahim Beach. This initiative is a reflection of our commitment to environmental conservation, marine life protection, and community involvement. Our primary goal is to remove plastic waste, debris, and pollutants from coastal areas. By organizing regular cleanup events, we strive to restore the natural beauty of these shores. We educate communities about the importance of responsible waste disposal and recycling. Our goal is to reduce the generation of beach litter at its source. We actively involve local communities, schools, and businesses in our cleanup efforts. This engagement builds a sense of responsibility and stewardship towards the environment.</p>
                    </div>
                </div>
                <div class="project-card" id="project-pathshala">
                    <img src="{{ asset ('assets/images/pathshala (1).jpg')}}" alt="Project Pathshala">
                    <div class="project-text">
                        <h1>Project Pathshala</h1>
                        <p>Project Pathsala is an inspiring initiative spearheaded by Muskurate Raho dedicated to providing underprivileged students with the essential skills and knowledge they need to break the cycle of poverty and access better opportunities. This transformative program is designed to empower these young minds with the tools and abilities necessary to build a brighter future for themselves and their communities. Skill Development Workshops, Access to Quality Education, Mentorship and Career Guidance, Community Engagement are some of the program highlights.</p>
                    </div>
                </div>
                <div class="project-card" id="plant-restoration">
                    <img src="{{ asset ('assets/images/plantrestoration.jpg')}}" alt="Plant Restoration">
                    <div class="project-text">
                        <h1>Plant Restoration</h1>
                        <p>"Plant Restoration" employs a holistic approach to plant and ecosystem restoration. To rehabilitate damaged plants and ecosystems, promote sustainable land management practices, and foster community involvement in nurturing our natural environment. Our primary goal is to provide essential care to damaged plants, including watering, fertilization, pruning, and pest control, to help them regain their health and vitality. We conduct workshops, educational programs, and outreach activities to raise awareness about the importance of plant nurturing and ecosystem restoration.</p>
                    </div>
                </div>
                <div class="project-card" id="plantation-drive">
                    <img src="{{ asset ('assets/images/projectsmile.jpg')}}" alt="Plantation Drive">
                    <div class="project-text">
                        <h1>Plantation Drive</h1>
                        <p>Project Green Smiles is driven by a mission to create a greener, healthier planet by planting trees and promoting sustainable forestry practices. At the core of our mission is a belief in the power of afforestation to combat climate change, enhance biodiversity, and provide socio-economic benefits to marginalized communities. Our primary goal is to plant trees and restore degraded landscapes. We aim to plant thousands of native trees each year to mitigate climate change, improve air and water quality, and preserve local ecosystems. We believe in the importance of engaging local communities. By involving them in tree planting, we not only provide them with an additional source of income but also raise awareness about the environment. We also organize training sessions on sustainable forestry practices.</p>
                    </div>
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
@include('layouts.homeScripts')
@endsection