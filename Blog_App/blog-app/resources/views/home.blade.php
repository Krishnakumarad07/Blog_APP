@extends('layout')

@section('content')
    {{-- 🌅 HERO SECTION --}}
    <section class="hero-section text-center d-flex flex-column justify-content-center align-items-center fade-in">
        <div class="container position-relative">
            <h1 class="fw-bold display-5 mb-3 text-dark">Welcome to <span class="text-accent">ZenBlog</span></h1>
            <p class="lead mb-4 text-secondary">Discover inspiring stories, tutorials, and experiences from creative minds
                around the world.</p>
            <a href="{{ route('posts.index') }}" class="btn btn-accent btn-lg shadow-sm">
                <i class="bi bi-journal-text"></i> Explore Posts
            </a>
        </div>
    </section>

    {{-- 📰 RECENT POSTS --}}
    {{-- Left-to-Right Auto Scroll --}}
    <section class="container py-5">
        <h2 class="text-center mb-4 fw-bold ">Trending Posts</h2>
        @if ($posts->count())
            <div class="auto-scroll-wrapper auto-scroll-left">
                <div class="auto-scroll-content">
                    @foreach ($posts as $post)
                        <div class="card shadow-sm border-0 blog-card me-3">
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-semibold text-dark mb-2">{{ Str::limit($post->title, 50) }}</h5>
                                <p class="text-muted small mb-2">
                                    <i class="bi bi-clock"></i> {{ $post->created_at->diffForHumans() }}
                                </p>
                                <p class="card-text text-secondary flex-grow-1">{{ Str::limit($post->content, 120) }}</p>
                                <a href="{{ route('posts.index', $post->id) }}"
                                    class="btn btn-outline-accent btn-sm mt-auto">Read More</a>
                            </div>
                        </div>
                    @endforeach
                
                    @foreach ($posts as $post)
                        <div class="card shadow-sm border-0 blog-card me-3">
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-semibold text-dark mb-2">{{ Str::limit($post->title, 50) }}</h5>
                                <p class="text-muted small mb-2">
                                    <i class="bi bi-clock"></i> {{ $post->created_at->diffForHumans() }}
                                </p>
                                <p class="card-text text-secondary flex-grow-1">{{ Str::limit($post->content, 120) }}</p>
                                <a href="{{ route('posts.index', $post->id) }}"
                                    class="btn btn-outline-accent btn-sm mt-auto">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    {{-- Right-to-Left Auto Scroll --}}
    <section class="container py-5" >
        
        @if ($posts->count())
            <div class="auto-scroll-wrapper auto-scroll-right">
                <div class="auto-scroll-content" id="one">
                    @foreach ($posts as $post)
                        <div class="card shadow-sm border-0 blog-card me-3">
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-semibold text-dark mb-2">{{ Str::limit($post->title, 50) }}</h5>
                                <p class="text-muted small mb-2">
                                    <i class="bi bi-clock"></i> {{ $post->created_at->diffForHumans() }}
                                </p>
                                <p class="card-text text-secondary flex-grow-1">{{ Str::limit($post->content, 120) }}</p>
                                <a href="{{ route('posts.index', $post->id) }}"
                                    class="btn btn-outline-accent btn-sm mt-auto">Read More</a>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($posts as $post)
                        <div class="card shadow-sm border-0 blog-card me-3">
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-semibold text-dark mb-2">{{ Str::limit($post->title, 50) }}</h5>
                                <p class="text-muted small mb-2">
                                    <i class="bi bi-clock"></i> {{ $post->created_at->diffForHumans() }}
                                </p>
                                <p class="card-text text-secondary flex-grow-1">{{ Str::limit($post->content, 120) }}</p>
                                <a href="{{ route('posts.index', $post->id) }}"
                                    class="btn btn-outline-accent btn-sm mt-auto">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    <section class="py-5 bg-light text-center">
        <div class="container">
            <div class="why-write-card mx-auto" style="max-width:600px;">
                <h3 class="fw-bold mb-3 text-dark">Why Write on MyBlog?</h3>
                <p class="lead text-secondary mb-4">Share your thoughts freely. Connect with readers. Build your digital
                    presence.</p>
                <a href="{{ route('posts.create') }}" class="btn btn-outline-accent btn-lg">
                    <i class="bi bi-pencil-square"></i> Start Writing
                </a>
            </div>
        </div>
    </section>

    <style>

        @keyframes scrollLeftToRight {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }

        /* Right to Left */
        @keyframes scrollRightToLeft {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        /* Auto-scroll wrappers */
        .auto-scroll-wrapper {
            overflow: hidden;
            width: 100%;
            position: relative;
        }

        .auto-scroll-wrapper:hover .auto-scroll-content {
            animation-play-state: paused;
        }

        .auto-scroll-content {
            display: flex;
            gap: 1rem;
            justify-content: space-evenly
        }

        /* Assign animations */
        .auto-scroll-left .auto-scroll-content {
            animation: scrollLeftToRight 15s linear infinite;
        }

        .auto-scroll-right .auto-scroll-content {
            animation: scrollRightToLeft 15s linear infinite;
        }


        /* Cards styling */
        .auto-scroll-content .blog-card {
            min-width: 300px;
            max-width: 500px;
        }

        /* 🌅 HERO */
        .hero-section {
            background: linear-gradient(135deg, #f8f9fa, #e9f7ff);
            padding: 6rem 0 4rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .hero-section h1 {
            text-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        }

        .text-accent {
            color: #0078d7;
        }

        /* 📰 Scrollable Cards */
        .scrolling-wrapper {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding: 1em;
            scrollbar-width: thin;

        }



        /* 💎 Card Styles */
        .blog-card {
            min-width: 300px;
            max-width: 6000px;
            border-radius: 0.75rem;
            background-color: #ffffff;
            color: #333;
            transition: all 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* 🩵 Accent Buttons */
        .btn-accent,
        .btn-outline-accent {
            border-radius: 8px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.05);
        }

        .btn-accent {
            background: linear-gradient(135deg, #0078d7, #00bcd4);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-accent:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .btn-outline-accent {
            border: 2px solid #00bcd4;
            color: #00bcd4;
            transition: all 0.3s ease;
        }

        .btn-outline-accent:hover {
            background-color: #00bcd4;
            color: #fff;
        }

        /* ✨ Why Write Card */
        .why-write-card {
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
        }

        /* ✨ Section Backgrounds */
        .bg-light {
            background-color: #f9fafb !important;
        }

        /* Fade-in animation */
        .fade-in {
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

        /* Hero Section Animations */
        .hero-section h1 {
            animation: fadeInUp 1s forwards;
            animation-delay: 0.2s;
            opacity: 0;
        }

        .hero-section p {
            animation: fadeInUp 1s forwards;
            animation-delay: 0.4s;
            opacity: 0;
        }

        .hero-section .btn {
            animation: fadeInUp 1s forwards;
            animation-delay: 0.6s;
            opacity: 0;
        }

        /* Blog Cards Slide-in */
        .blog-card {
            opacity: 0;
            transform: translateY(20px);
            animation: cardFadeIn 0.8s forwards;
        }

        @keyframes cardFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stagger cards */
        .scrolling-wrapper .blog-card:nth-child(1) {
            animation-delay: 0.2s;
        }

        .scrolling-wrapper .blog-card:nth-child(2) {
            animation-delay: 0.4s;
        }

        .scrolling-wrapper .blog-card:nth-child(3) {
            animation-delay: 0.6s;
        }

        .scrolling-wrapper .blog-card:nth-child(4) {
            animation-delay: 0.8s;
        }

        /* Why Write Card */
        .why-write-card {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards;
            animation-delay: 0.3s;
        }
    </style>
@endsection
