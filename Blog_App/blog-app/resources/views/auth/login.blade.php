@extends('layout')

@section('content')
    <div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-6">
            <div class="card bg-dark text-light shadow-lg crt-card fade-in-up">
                <div class="card-body">
                    <h3 class="text-center text-info mb-4 ">Welcome Back</h3>
                    

                    <form action="{{ route('login.post') }}" method="POST" class="animate-form">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-info text-dark fw-bold btn-crt">Login</button>
                        </div>
                    </form>

                    <p class="text-center mt-3 mb-0 animate-login-link">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="text-info">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #0f0f1a;
        }

        .crt-card {
            border-radius: 15px;
            padding: 2rem;
            background: linear-gradient(135deg, #1c1c2c, #2a2a3f);
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
        }

        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 1s forwards;
            animation-delay: 0.2s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-title {
            opacity: 0;
            animation: titleBounce 1s forwards;
            animation-delay: 0.4s;
        }

        @keyframes titleBounce {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            50% {
                opacity: 1;
                transform: translateY(5px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .animate-form {
            opacity: 0;
            transform: translateY(20px);
            animation: formFadeIn 0.8s forwards;
            animation-delay: 0.6s;
        }

        @keyframes formFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-login-link {
            opacity: 0;
            animation: linkFade 0.8s forwards;
            animation-delay: 0.8s;
        }

        @keyframes linkFade {
            to {
                opacity: 1;
            }
        }

        .form-control {
            border-radius: 8px;
            background-color: #2a2a3f;
            border: 1px solid #444;
            color: #fff;
        }

        .form-control:focus {
            border-color: #17a2b8;
            box-shadow: 0 0 5px #17a2b8;
            background-color: #2a2a3f;
            color: #fff;
        }

        .btn-crt {
            transition: all 0.3s ease;
            border-radius: 8px;
        }

        .btn-crt:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 255, 255, 0.5);
            opacity: 0.95;
        }

        a.text-info {
            text-decoration: none;
            color: #0dcaf0;
            transition: all 0.3s ease;
        }

        a.text-info:hover {
            text-decoration: underline;
        }
    </style>
@endsection
