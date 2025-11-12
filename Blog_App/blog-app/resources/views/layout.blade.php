<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZenBlog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            scrollbar-width: none;
            scroll-behavior: smooth;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: #e0e0e0;

            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav.navbar {
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: #00bcd4 !important;
        }

        .nav-link {
            color: #e0e0e0 !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #00bcd4 !important;
        }

        footer {
            margin-top: auto;
            background-color: #11141b;
            color: #ccc;
            padding: 1.5rem 0;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        footer a {
            color: #00bcd4;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Fade-in animation for page content */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Slide-in for navbar items */
        .navbar-nav .nav-item {
            opacity: 0;
            transform: translateY(-20px);
            animation: slideIn 0.6s forwards;
        }

        .navbar-nav .nav-item:nth-child(1) {
            animation-delay: 0.2s;
        }

        .navbar-nav .nav-item:nth-child(2) {
            animation-delay: 0.4s;
        }

        .navbar-nav .nav-item:nth-child(3) {
            animation-delay: 0.6s;
        }

        .navbar-nav .nav-item:nth-child(4) {
            animation-delay: 0.8s;
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Smooth hover effect for links */
        .nav-link {
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .nav-link:hover {
            color: #00bcd4 !important;
            transform: translateY(-3px);
        }

        /* Footer fade-in */
        footer {
            opacity: 0;
            animation: fadeIn 1s forwards;
            animation-delay: 1s;
        }

        /* Optional: Animate buttons or cards */
        .btn,
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .btn:hover,
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top fade-out">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">ZenBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                            href="{{ url('/about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('posts') ? 'active' : '' }}"
                            href="{{ route('posts.index') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('contact') ? 'active' : '' }}"
                            href="{{ url('/contact') }}">Contact</a></li>

                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="border:none;">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link {{ request()->is('login') ? 'active' : '' }}"
                                href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->is('register') ? 'active' : '' }}"
                                href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>

    {{-- Page Content --}}
    <main class="flex-grow-1 fade-in">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <div class="container fade-in">
            <p class="mb-1">&copy; {{ date('Y') }} <strong>ZenBlog</strong>. All Rights Reserved.</p>
            <p class="small">
                Built with using <a href="https://laravel.com" target="_blank">Laravel</a> & Bootstrap.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>