@extends('layout')

@section('content')
    {{-- 🌟 CONTACT HERO --}}
    <section class="contact-hero py-5 text-center text-dark  fade-in-up"
        style="   background: linear-gradient(135deg, #f8f9fa, #e9f7ff);">
        <div class="container">
            <h1 class="fw-bold mb-3">Get in Touch - <span class="text-primary">ZenBlog</span></h1>
            <p class="lead mb-0">Have questions, suggestions, or just want to say hello? We’re here to listen!</p>
        </div>
    </section>

    {{-- 📬 CONTACT INFO & FORM --}}
    <section class="container py-5  fade-in-up ">
        <div class="row mb-5">
            {{-- Contact Info --}}
            <div class="col-md-4 mb-4  fade-in-up">
                <h3 class="fw-bold mb-3">Contact Info</h3>
                <p><i class="bi bi-envelope-fill me-2"></i>contact@Zenblog.com</p>
                <p><i class="bi bi-telephone-fill me-2"></i>+91 9029018272</p>
                <p><i class="bi bi-geo-alt-fill me-2"></i>1654, TNHB Madurai-625001</p>
            </div>

            {{-- Contact Form --}}
            <div class="col-md-8  fade-in-up">
                <h3 class="fw-bold mb-3">Send Us a Message</h3>
                <form action="{{ route('posts.index') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="invalid-feedback">Please enter your name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        <div class="invalid-feedback">Please write your message.</div>
                    </div>
                    <button type="submit" class="btn btn-accent px-4 py-2">Send Message</button>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-12  fade-in-up">
                <div class="map-placeholder rounded shadow-sm  fade-in-up"
                    style="width:100%; height:300px;  display:flex; align-items:center; justify-content:center;">
                    <span class="text-secondary ">Map Placeholder</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ✨ STYLING --}}
    <style>
        .contact-hero {
            background-size: cover;
            background-position: center;
        }

        .text-light {
            color: #ffffff !important;
        }

        .btn-accent {
            background: linear-gradient(135deg, #0078d7, #00bcd4);
            color: white;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-accent:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .map-placeholder {
            font-weight: 500;
            color: #fff;
            font-size: 1.1rem;
            background-color: hsla(0, 0%, 100%, 0.45);
        }

        /* Fade-in and slide-up */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered delays for sections */
        .contact-hero {
            animation: fadeInUp 0.8s forwards;
            animation-delay: 0.1s;
        }

        .col-md-4 {
            animation: fadeInUp 0.8s forwards;
            animation-delay: 0.2s;
        }

        .col-md-8 {
            animation: fadeInUp 0.8s forwards;
            animation-delay: 0.3s;
        }

        .map-placeholder {
            animation: fadeInUp 0.8s forwards;
            animation-delay: 0.4s;
        }
    </style>

    {{-- 🧩 FORM VALIDATION SCRIPT --}}
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection