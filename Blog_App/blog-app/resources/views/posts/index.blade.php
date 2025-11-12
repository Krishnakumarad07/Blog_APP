@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2" >
            <h2 class="fw-bold  mb-0"> Blogs</h2>
            <a href="{{ route('posts.create') }}" class="btn btn-accent shadow-sm">
                <i class="bi bi-plus-circle"></i> Add New Post
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($posts->count())
            <div class="row g-4">
                @foreach($posts as $post)
                    <div class="col-md-6 col-lg-4  fade-in-up">
                        <div class="card blog-card h-100 shadow-sm border-0" class="card fade-in" style="animation-delay: 0.3s;">
                            <div class="card-header blog-card-header text-dark">
                                {{ Str::limit($post->title, 50) }}
                            </div>
                            <div class="card-body d-flex flex-column">
                                <p class="text-muted small mb-2">
                                    <i class="bi bi-person-circle"></i> {{ $post->author ?? 'Unknown' }}
                                    <span class="mx-2">•</span>
                                    <i class="bi bi-clock"></i> {{ $post->created_at->diffForHumans() }}
                                </p>
                                <p class="card-text flex-grow-1">{{ Str::limit($post->content, 140) }}</p>
                                <div class="mt-3 d-flex justify-content-between">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-accent btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Delete this post?')" class="btn btn-outline-danger btn-sm">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center mt-5 text-secondary">
                <i class="bi bi-emoji-frown display-4"></i>
                <h5 class="mt-3">No posts found</h5>
                <p><a href="{{ route('posts.create') }}" class="btn btn-accent mt-2">Create your first post</a></p>
            </div>
        @endif
    </div>

    <style>
        body {
            background-color: #f9fafb;
            color: #333;

        }

        /* Header */
        h2 {
            color: #ffffffff;
            text-shadow: none;
        }

        /* Blog Card */
        .blog-card {
            border-radius: 0.75rem;
            background-color: #ffffff;
            color: #444;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        /* Card Header */
        .blog-card-header {
            padding: 0.75rem 1rem;
            font-weight: 600;
            font-size: 1.1rem;
            background: linear-gradient(135deg, #e6f3ff, #f2fcff);
            border-bottom: 1px solid #dee2e6;
            color: #0078d7;
        }

        /* Text */
        .card-text {
            color: #555;
            line-height: 1.6;
        }

        /* Buttons */
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
            border: 1.5px solid #00bcd4;
            color: #00bcd4;
            transition: all 0.3s ease;
        }

        .btn-outline-accent:hover {
            background-color: #00bcd4;
            color: #fff;
        }

        .btn-outline-danger {
            border: 1.5px solid #ff4d4d;
            color: #ff4d4d;
            transition: all 0.3s ease;
        }

        .btn-outline-danger:hover {
            background-color: #ff4d4d;
            color: #fff;
        }

        /* Alert */
        .alert-success {
            background-color: #e7f9ed;
            border: 1px solid #a8e6a1;
            color: #2f7d32;
        }

        /* Subtle border */
        .border-bottom {
            border-color: #dee2e6 !important;
        }

        /* Fade-in and slide-up animation */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered delays for cards */
        .row.g-4 .col-md-6,
        .row.g-4 .col-lg-4 {
            opacity: 0;
        }

        .row.g-4 .col-md-6:nth-child(1),
        .row.g-4 .col-lg-4:nth-child(1) {
            animation-delay: 0.1s;
        }

        .row.g-4 .col-md-6:nth-child(2),
        .row.g-4 .col-lg-4:nth-child(2) {
            animation-delay: 0.2s;
        }

        .row.g-4 .col-md-6:nth-child(3),
        .row.g-4 .col-lg-4:nth-child(3) {
            animation-delay: 0.3s;
        }

        .row.g-4 .col-md-6:nth-child(4),
        .row.g-4 .col-lg-4:nth-child(4) {
            animation-delay: 0.4s;
        }

        /* Add more nth-child rules if you have more cards */
        .row.g-4 .col-md-6,
        .row.g-4 .col-lg-4 {
            animation: fadeInUp 0.6s forwards;
        }

        .alert-success {
            transform: translateY(-20px);
            opacity: 0;
            animation: slideDown 0.5s forwards;
            animation-delay: 0.2s;
        }

        @keyframes slideDown {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .btn-accent {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInUp 0.6s forwards;
            animation-delay: 0.2s;
        }
    </style>
@endsection