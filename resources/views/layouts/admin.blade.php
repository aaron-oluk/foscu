<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('page-title', 'Dashboard') - FoSCU Admin</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-50 text-slate-900" x-data="{ sidebarOpen: false }">
        <div class="min-h-screen lg:flex">
            <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-slate-900/50 lg:hidden"></div>

            <aside class="fixed inset-y-0 left-0 z-40 flex w-72 flex-col bg-slate-950 text-slate-200 transform transition-transform duration-200 lg:static lg:translate-x-0"
                   :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">
                <div class="flex h-16 items-center gap-3 border-b border-white/10 px-6">
                    <div class="flex h-9 w-9 items-center justify-center rounded-md bg-primary text-sm font-bold text-white">F</div>
                    <div>
                        <div class="text-sm font-semibold text-white">FoSCU Admin</div>
                        <div class="text-xs text-slate-400">Dashboard</div>
                    </div>
                </div>

                <nav class="flex-1 space-y-6 overflow-y-auto px-4 py-6">
                    <div>
                        <p class="px-3 text-[11px] font-semibold uppercase tracking-wider text-slate-500">Overview</p>
                        <div class="mt-2 space-y-1">
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-md px-3 py-2.5 text-sm {{ request()->routeIs('dashboard') ? 'bg-primary text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                Dashboard
                            </a>
                        </div>
                    </div>

                    <div>
                        <p class="px-3 text-[11px] font-semibold uppercase tracking-wider text-slate-500">Content</p>
                        <div class="mt-2 space-y-1">
                            <a href="{{ route('admin.events.index') }}" class="flex items-center gap-3 rounded-md px-3 py-2.5 text-sm {{ request()->routeIs('admin.events.*') ? 'bg-primary text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Events
                            </a>
                            <a href="{{ route('dashboard.event-photos.index') }}" class="flex items-center gap-3 rounded-md px-3 py-2.5 text-sm {{ request()->routeIs('dashboard.event-photos.*') ? 'bg-primary text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Event photos
                            </a>
                            <a href="{{ route('admin.logos.index') }}" class="flex items-center gap-3 rounded-md px-3 py-2.5 text-sm {{ request()->routeIs('admin.logos.*') ? 'bg-primary text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                Partner logos
                            </a>
                            <a href="{{ route('admin.files.index') }}" class="flex items-center gap-3 rounded-md px-3 py-2.5 text-sm {{ request()->routeIs('admin.files.*') ? 'bg-primary text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                Files
                            </a>
                        </div>
                    </div>

                    <div>
                        <p class="px-3 text-[11px] font-semibold uppercase tracking-wider text-slate-500">System</p>
                        <div class="mt-2 space-y-1">
                            <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 rounded-md px-3 py-2.5 text-sm {{ request()->routeIs('admin.users.*') ? 'bg-primary text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Users
                            </a>
                            <a href="{{ route('admin.backups.index') }}" class="flex items-center gap-3 rounded-md px-3 py-2.5 text-sm {{ request()->routeIs('admin.backups.*') ? 'bg-primary text-white' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                                Backups
                            </a>
                            <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-3 rounded-md px-3 py-2.5 text-sm text-slate-300 hover:bg-white/5 hover:text-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                View site
                            </a>
                        </div>
                    </div>
                </nav>

                <div class="border-t border-white/10 p-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex w-full items-center gap-3 rounded-md px-3 py-2.5 text-sm text-slate-300 hover:bg-white/5 hover:text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Log out
                        </button>
                    </form>
                </div>
            </aside>

            <div class="min-h-screen flex-1 lg:pl-0">
                <header class="sticky top-0 z-20 border-b border-slate-200 bg-white/80 backdrop-blur">
                    <div class="flex h-16 items-center justify-between px-4 sm:px-6 lg:px-8">
                        <div class="flex items-center gap-3">
                            <button type="button" class="rounded p-2 text-slate-600 hover:bg-slate-100 lg:hidden" @click="sidebarOpen = true">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/></svg>
                            </button>
                            <h1 class="text-lg font-semibold text-slate-900">@yield('page-title', 'Dashboard')</h1>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="hidden text-right sm:block">
                                <div class="text-sm font-medium text-slate-900">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-slate-500">{{ Auth::user()->email }}</div>
                            </div>
                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-orange-100 text-sm font-semibold text-orange-700">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </div>
                    </div>
                </header>

                <main class="px-4 py-8 sm:px-6 lg:px-8">
                    @yield('content')
                </main>
            </div>
        </div>
        <script defer src="https://analytics.aloflux.com/tracker.js" data-site="foscu.org"></script>
    </body>
</html>
