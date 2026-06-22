<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) ? $title . ' - FoSCU' : 'FoSCU - Food Safety Coalition Uganda' }}</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favico.png') }}" type="image/x-icon">
        
        <!-- Meta Tags -->
        <meta name="description" content="Food Safety Coalition Uganda - Promoting food safety awareness and policies across Uganda">
        <meta name="keywords" content="food safety, Uganda, coalition, agriculture, health">
        <meta name="robots" content="index, follow">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
        
        <!-- Slick Carousel -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- Navigation -->
        <nav class="fixed top-0 w-full z-50 bg-primary shadow-lg" style="height: 120px;">
            <div class="container mx-auto px-4 flex items-center justify-between h-full">
                <!-- Mobile menu button -->
                <button type="button" class="lg:hidden text-white" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                
                <!-- Logo for mobile -->
                <a class="lg:hidden" href="{{ route('home') }}">
                    <img src="{{ asset('images/nav.png') }}" alt="FoSCU" class="h-16">
                </a>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-4 w-full justify-center">
                    <ul class="flex items-center space-x-4">
                        <li><a class="font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition-colors duration-200 {{ request()->routeIs('focus') ? 'bg-opacity-25 font-semibold' : '' }}" href="{{ route('focus') }}">Our Focus</a></li>
                        <li><a class="font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition-colors duration-200 {{ request()->routeIs('who-we-are') ? 'bg-opacity-25 font-semibold' : '' }}" href="{{ route('who-we-are') }}">Who We Are</a></li>
                        <li class="mx-8">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/nav.png') }}" alt="FoSCU" class="h-16 hover:scale-105 transition-transform duration-200">
                            </a>
                        </li>
                        <li><a class="font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition-colors duration-200 {{ request()->routeIs('our-work') ? 'bg-opacity-25 font-semibold' : '' }}" href="{{ route('our-work') }}">Our Work</a></li>
                        <li><a class="font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-20 backdrop-blur-sm hover:bg-opacity-30 transition-colors duration-200 {{ request()->routeIs('information-resources') || request()->routeIs('videos') || request()->routeIs('research') || request()->routeIs('reports') || request()->routeIs('posters') || request()->routeIs('articles') || request()->routeIs('audio') || request()->routeIs('policy-briefs') || request()->routeIs('e-learning') || request()->routeIs('relevant-sites') ? 'bg-opacity-30 font-semibold' : '' }}" href="{{ route('information-resources') }}">Information Resources</a></li>
                    </ul>
                </div>
                
                <!-- Auth Links -->
                <div class="hidden lg:flex items-center space-x-4">
                    @auth
                        <a href="{{ route('admin.events.index') }}" class="font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition-colors duration-200">
                            <i class="fas fa-cog mr-1"></i> Admin
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition-colors duration-200">
                                <i class="fas fa-sign-out-alt mr-1"></i> Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden lg:hidden absolute top-full left-0 w-full bg-primary shadow-lg">
                <div class="p-4">
                    <ul class="space-y-4">
                        <li><a class="block font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition-colors duration-200 {{ request()->routeIs('focus') ? 'bg-opacity-25 font-semibold' : '' }}" href="{{ route('focus') }}">Our Focus</a></li>
                        <li><a class="block font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition-colors duration-200 {{ request()->routeIs('who-we-are') ? 'bg-opacity-25 font-semibold' : '' }}" href="{{ route('who-we-are') }}">Who We Are</a></li>
                        <li><a class="block font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition-colors duration-200 {{ request()->routeIs('our-work') ? 'bg-opacity-25 font-semibold' : '' }}" href="{{ route('our-work') }}">Our Work</a></li>
                        <li><a class="block font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-20 backdrop-blur-sm hover:bg-opacity-30 transition-colors duration-200 {{ request()->routeIs('information-resources') || request()->routeIs('videos') || request()->routeIs('research') || request()->routeIs('reports') || request()->routeIs('posters') || request()->routeIs('articles') || request()->routeIs('audio') || request()->routeIs('policy-briefs') || request()->routeIs('e-learning') || request()->routeIs('relevant-sites') ? 'bg-opacity-30 font-semibold' : '' }}" href="{{ route('information-resources') }}">Information Resources</a></li>
                        @auth
                            <li><a class="block font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition-colors duration-200" href="{{ route('admin.events.index') }}">Admin</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="font-medium px-4 py-2 rounded-md text-white bg-white bg-opacity-10 backdrop-blur-sm hover:bg-opacity-20 transition-colors duration-200 w-full text-left">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="pt-28">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-green-800 text-white py-8">
            <div class="container mx-auto px-4 text-center">
                <p>&copy; {{ date('Y') }} Food Safety Coalition Uganda. All rights reserved.</p>
                @guest
                    <!-- Hidden admin access - small dot in footer -->
                    <div class="mt-4">
                        <a href="{{ route('admin-access') }}" class="inline-block w-2 h-2 bg-green-700 rounded-full opacity-30 hover:opacity-100 transition-opacity duration-300" title="Admin Access"></a>
                    </div>
                @endguest
            </div>
        </footer>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script>
            // Hidden login access methods
            @guest
            // Method 1: Press Ctrl+Shift+L (or Cmd+Shift+L on Mac)
            document.addEventListener('keydown', function(e) {
                if (e.shiftKey && (e.ctrlKey || e.metaKey) && e.key === 'L') {
                    e.preventDefault();
                    window.location.href = '{{ route('login') }}';
                }
            });

            // Method 2: Click logo 5 times quickly (within 3 seconds)
            let logoClickCount = 0;
            let logoClickTimer;
            
            document.addEventListener('DOMContentLoaded', function() {
                const logo = document.querySelector('nav img[alt="FoSCU"]');
                if (logo) {
                    logo.addEventListener('click', function(e) {
                        logoClickCount++;
                        
                        if (logoClickCount === 1) {
                            logoClickTimer = setTimeout(function() {
                                logoClickCount = 0;
                            }, 3000);
                        }
                        
                        if (logoClickCount === 5) {
                            e.preventDefault();
                            clearTimeout(logoClickTimer);
                            logoClickCount = 0;
                            window.location.href = '{{ route('login') }}';
                        }
                    });
                }
            });
            @endguest
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
        
        <script>
            function toggleMobileMenu() {
                const menu = document.getElementById('mobile-menu');
                menu.classList.toggle('hidden');
            }
            
            // Initialize slick carousel when ready
            $(document).ready(function() {
                $('.memimgs').slick({
                    centerMode: true,
                    centerPadding: '1.5rem',
                    slidesToShow: 4,
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 3
                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }]
                });
            });
        </script>
        
        @stack('scripts')
    </body>
</html>
