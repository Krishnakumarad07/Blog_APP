@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark text-light shadow-lg register-card fade-in-up">
                    <div class="card-body">
                        <h3 class="text-center text-info mb-4 ">Create an Account</h3>

                        <form action="{{ route('register.post') }}" method="POST" class="animate-form">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-info text-dark fw-bold btn-register">Register</button>
                            </div>
                        </form>

                        <p class="text-center mt-3 mb-0 animate-login-link">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-info">Login here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* ---------- CARD ANIMATION ---------- */
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

        /* ---------- TITLE ANIMATION ---------- */
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

        /* ---------- FORM ANIMATION ---------- */
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

        /* ---------- LOGIN LINK ANIMATION ---------- */
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

        /* ---------- REGISTER BUTTON ---------- */
        .btn-register {
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            opacity: 0.95;
        }

        /* ---------- CARD STYLING ---------- */
        .register-card {
            border-radius: 15px;
            padding: 2rem;
            background: linear-gradient(135deg, #1e1e2f, #2a2a3f);
        }

        /* ---------- FORM CONTROLS ---------- */
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

        .invalid-feedback {
            color: #ff6b6b;
        }

        /* ---------- TEXT LINKS ---------- */
        a.text-info {
            text-decoration: none;
            transition: all 0.3s ease;
        }

        a.text-info:hover {
            color: #0dcaf0;
            text-decoration: underline;
        }
    </style>
@endsection
