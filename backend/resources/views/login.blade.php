@extends('layouts.app')

@section('title', 'Login Page')

@section('styles')
        body {
            background-color: #f8f9fa;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .container {
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .left-panel {
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            color: white;
            position: relative;
            object-fit: cover;
            padding: 50px;
            max-height: 600px;
            margin-top: 20px;
        }

        .left-panel h3 {
            position: absolute;
            top: 4%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 10px 20px;
            border-radius: 5px;
            text-align: center;
            font-size: 25px;
            white-space: nowrap;
            background: rgb(255, 207, 63);
            font-weight: bold;
        }

        .right-panel {
            padding: 30px;
        }

        .auth-btn {
            background-color: #ffd700;
            border: none;
            font-weight: bold;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .auth-btn:hover {
            background-color: #e6c300;
            transform: translateY(-2px);
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        #authTabs .nav-link {
            background-color: #0d6efd;
            color: white;
            border-radius: 5px;
            padding: 10px 30px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        #authTabs .nav-link.active {
            background-color: white;
            color: #0d6efd;
            border: 2px solid #0d6efd;
        }

        .social-login {
            margin-top: 30px;
            text-align: center;
        }

        .social-login p {
            color: #666;
            margin-bottom: 15px;
        }

        .social-btn {
            padding: 8px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
            border: 1px solid #ddd;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .google-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background-color: white;
            color: #444;
        }

        .google-btn:hover {
            background-color: #f8f9fa;
        }

        .form-control {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        .alert {
            margin-top: 20px;
            border-radius: 5px;
        }
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 left-panel" style="background: url('{{ asset('assets/images/loginImage.jpg') }}') no-repeat center center;">
                <h3>Be The Next Change Maker!</h3>
            </div>
            <div class="col-md-7 right-panel">
                <h3 class="text-center mb-4">Welcome to Muskurate Raho!</h3>
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <ul class="nav nav-tabs justify-content-center" id="authTabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="signup-tab" data-bs-toggle="tab" href="#signup">Sign up</a>
                    </li>
                </ul>

                <div class="tab-content mt-4">
                    <!-- Login Form -->
                    <div class="tab-pane fade show active" id="login">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="hidden" name="action" value="login">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn auth-btn w-100">Login</button>
                        </form>
                    </div>

                    <!-- Signup Form -->
                    <div class="tab-pane fade" id="signup">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="hidden" name="action" value="signup">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Create Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Create a strong password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" required>
                                <label class="form-check-label">I agree to the terms and conditions</label>
                            </div>
                            <button type="submit" class="btn auth-btn w-100">Sign up</button>
                        </form>
                    </div>
                </div>

                <div class="social-login">
                    <p>Or continue with</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('google.login') }}" class="btn social-btn google-btn">
                            <img src="https://img.icons8.com/color/24/000000/google-logo.png" alt="Google">
                            Continue with Google
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection