<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Dashboard - {{ config('app.name', 'FoSCU') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            <!-- Sidebar -->
            <div class="w-64 bg-white shadow-sm">
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800">FoSCU Admin</h2>
                </div>
                
                <nav class="mt-4">
                    <div class="px-4 py-2">
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                            </svg>
                            Dashboard
                        </a>
                    </div>
                    
                    <div class="px-4 py-2">
                        <a href="{{ route('admin.events.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md {{ request()->routeIs('admin.events.*') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2-2v16a2 2 0 002 2z"></path>
                            </svg>
                            Events
                        </a>
                    </div>
                    
                    <div class="px-4 py-2">
                        <a href="{{ route('admin.logos.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md {{ request()->routeIs('admin.logos.*') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Partner Logos
                        </a>
                    </div>
                    
                    <div class="px-4 py-2">
                        <a href="{{ route('dashboard.event-photos.index') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md {{ request()->routeIs('dashboard.event-photos.*') ? 'bg-blue-50 text-blue-700' : '' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Event Photos
                        </a>
                    </div>
                    
                    <div class="px-4 py-2">
                        <a href="{{ route('home') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md" target="_blank">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                            View Site
                        </a>
                    </div>
                </nav>
                
                <div class="absolute bottom-4 w-64 px-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                <!-- Top Bar -->
                <header class="bg-white shadow-sm border-b">
                    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between items-center">
                            <h1 class="text-2xl font-semibold text-gray-900">
                                @yield('page-title', 'Dashboard')
                            </h1>
                            <div class="flex items-center space-x-4">
                                <span class="text-sm text-gray-500">Welcome, {{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
