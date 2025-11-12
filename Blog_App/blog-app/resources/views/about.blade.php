@extends('layout')

@section('content')
    {{-- 🌟 ABOUT HERO --}}
    <section class="about-hero py-5 text-center text-dark fade-in-up"
        style="   background: linear-gradient(135deg, #f8f9fa, #e9f7ff);">
        <div class="container">
            <h1 class="fw-bold mb-3">About <span class="text-primary">ZenBlog</span></h1>
            <p class="lead mb-0">Sharing stories, knowledge, and creativity with the world.</p>
        </div>
    </section>

    {{-- 📝 ABOUT CONTENT --}}
    <section class="container py-5 text-light">
        <div class="row mb-5 fade-in-up">
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">Our Mission</h2>
                <p>At ZenBlog, our mission is to empower creators to share their stories and ideas with a global audience.
                    We believe every voice deserves to be heard, and our platform is designed to make publishing simple,
                    beautiful, and impactful.</p>
            </div>
            <div class="col-md-6 text-center">
                {{-- <img src="{{ asset('images/about-mission.jpg') }}" alt="Our Mission"
                    class="img-fluid rounded shadow-sm"> --}}
                <div class="map-placeholder rounded shadow-sm"
                    style="width:90%; height:230px; display:flex; align-items:center; justify-content:center;">
                    <span class="text-secondary">Our Mission</span>
                </div>
            </div>
        </div>

        <div class="row mb-5 flex-md-row-reverse fade-in-up">
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">Our Team</h2>
                <p>We are a passionate group of developers, writers, and designers dedicated to creating a seamless blogging
                    experience. From backend architecture to visual design, our team works tirelessly to bring you a
                    platform that’s fast, reliable, and user-friendly.</p>
            </div>
            <div class="col-md-6 text-center">
                {{-- <img src="{{ asset('images/about-team.jpg') }}" alt="Our Team" class="img-fluid rounded shadow-sm">
                --}}
                <div class="map-placeholder rounded shadow-sm"
                    style="width:90%; height:230px; color:white; display:flex; align-items:center; justify-content:center;">
                    <span class="text-secondary">Our Team</span>
                </div>
            </div>
        </div>

        <div class="text-center fade-in-up">
            <h2 class="fw-bold mb-3">Why Choose ZenBlog?</h2>
            <p class="lead mb-4">Whether you’re a writer, tutor, or creative professional, ZenBlog provides the tools and
                audience to grow your digital presence. Easy-to-use editor, responsive design, and community support make
                blogging effortless and enjoyable.</p>
            <a href="{{ route('posts.create') }}" class="btn btn-accent btn-lg">
                <i class="bi bi-pencil-square"></i> Start Your Journey
            </a>
        </div>
    </section>

    {{-- ✨ STYLING --}}
    <style>
        .about-hero {
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

        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        .map-placeholder {
            font-weight: 500;
            color: #fffff;
            font-size: 1.1rem;
            background-color: hsla(0, 0%, 100%, 0.45);

        }

        .map-placeholder {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .map-placeholder:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Fade-in with upward movement */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered fade-in for content rows */
        .row>.col-md-6 {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s forwards;
        }

        /* Stagger delays */
        .row:nth-child(1) .col-md-6:nth-child(1) {
            animation-delay: 0.2s;
        }

        .row:nth-child(1) .col-md-6:nth-child(2) {
            animation-delay: 0.4s;
        }

        .row:nth-child(2) .col-md-6:nth-child(1) {
            animation-delay: 0.2s;
        }

        .row:nth-child(2) .col-md-6:nth-child(2) {
            animation-delay: 0.4s;
        }

        /* Hero section */
        .about-hero h1 {
            opacity: 0;
            animation: fadeInUp 1s forwards;
            animation-delay: 0.2s;
        }

        .about-hero p {
            opacity: 0;
            animation: fadeInUp 1s forwards;
            animation-delay: 0.4s;
        }

        /* Button animation */
        .btn-accent {
            opacity: 0;
            animation: fadeInUp 1s forwards;
            animation-delay: 0.6s;
        }
    </style>
@endsection