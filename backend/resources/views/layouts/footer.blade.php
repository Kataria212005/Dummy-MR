 <footer class="pt-5">
    <div class="footer-top text-white bg-dark">
        <div class="container">
            <div class="row gy-4 align-items-start">
                <!-- Logo Column -->
                <div class="col-12 col-md-3 text-center text-md-start">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Muskurate Raho" class="img-fluid rounded" style="width: 8rem; height: 8rem;" />
                </div>

                <!-- First Menu Column -->
                <div class="col-6 col-md-2">
                    <h5 style="font-weight: bold;">Home</h5>
                    <ul class="list-unstyled">
                        <li><a href="/about" class="footer-link">About us</a></li>
                        <li><a href="/team" class="footer-link">Team</a></li>
                        <li><a href="/opportunities" class="footer-link">Opportunities</a></li>
                        <li><a href="/contact" class="footer-link">Contact</a></li>
                    </ul>
                </div>

                <!-- Second Menu Column -->
                <div class="col-6 col-md-2">
                    <h5 style="font-weight: bold;">More</h5>
                    <ul class="list-unstyled">
                        <li><a href="/projects" class="footer-link">Projects</a></li>
                        <li><a href="/dashboard" class="footer-link">Events</a></li>
                        <li><a href="/donatenow" class="footer-link">Donate</a></li>
                        <li><a href="#" class="footer-link">Blog</a></li>
                    </ul>
                </div>

                <!-- Social Section -->
                <div class="social-section col-12 col-md-5 text-center text-md-start">
                    <h5 style="font-weight: bold;">Follow Us!!</h5>
                    <div class="social-icons mt-3">
                        <a href="https://www.instagram.com/muskuraterahoorg/" class="me-3"><i class="fab fa-instagram"></i></a>
                        <span class="divider">•</span>
                        <a href="https://x.com/muskuraterahorg" class="me-3"><i class="fa-brands fa-x-twitter"></i></a>
                        <span class="divider">•</span>
                        <a href="https://www.facebook.com/muskuraterahoorg/" class="me-3"><i class="fab fa-facebook"></i></a>
                        <span class="divider">•</span>
                        <a href="https://www.youtube.com/@muskuraterahoorg" class="me-3"><i class="fab fa-youtube"></i></a>
                        <span class="divider">•</span>
                        <a href="https://in.linkedin.com/company/muskurateraho?trk=public_post_feed-actor-name" class="me-3"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom text-center bg-warning py-3">
        <div class="container">
            <p class="mb-0 text-dark">
                © 2025 Muskurate Raho. All Rights Reserved ||
                <a href="{{ route('privacy') }}" class="text-dark text-decoration-underline">Privacy Policy</a> ||
                <a href="{{ route('terms') }}" class="text-dark text-decoration-underline">Terms and Conditions</a>
            </p>
        </div>
    </div>
</footer>
