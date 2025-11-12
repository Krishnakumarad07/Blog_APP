@extends('layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center fade-in-up">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 fade-in-up">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h4 class="mb-0 text-primary"><i class="bi bi-pencil-square"></i> Edit Post</h4>
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>
                    </div>

                    <div class="card-body p-4">
                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Edit Form --}}
                        <form action="{{ route('posts.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label fw-semibold"><i class="bi bi-type"></i> Title</label>
                                <input type="text" name="title" class="form-control form-control-lg"
                                    value="{{ old('title', $post->title) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold"><i class="bi bi-card-text"></i> Content</label>
                                <textarea name="content" class="form-control" rows="6"
                                    required>{{ old('content', $post->content) }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold"><i class="bi bi-person"></i> Author</label>
                                <input type="text" name="author" class="form-control"
                                    value="{{ old('author', $post->author) }}">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-accent px-4 me-2">
                                    <i class="bi bi-save"></i> Update Post
                                </button>
                                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary px-4">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Inline Custom Styles --}}
    <style>
        body {
            background-color: #f9fafb;


            color: #333;
        }

        .card {
            border-radius: 12px;
            background-color: #ffffff;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background-color: #f5f5f5;
            color: #0078d7;
        }

        textarea {
            resize: none;
        }

        .btn-accent {
            background: linear-gradient(135deg, #0078d7, #00bcd4);
            color: white;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-accent:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* Fade-in and slide-up effect */
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

        /* Staggered animation for buttons inside the card */
        .card-body .btn-accent,
        .card-body .btn-outline-secondary {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInUp 0.6s forwards;
            animation-delay: 0.5s;
        }
    </style>
@endsection