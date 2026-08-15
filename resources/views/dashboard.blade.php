@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <div class="overflow-hidden rounded bg-gradient-to-r from-slate-950 via-slate-900 to-orange-700 p-6 text-white">
        <p class="text-sm text-orange-200">{{ now()->format('l, d F Y') }}</p>
        <h2 class="mt-2 text-2xl font-semibold">Welcome back, {{ Auth::user()->name }}</h2>
        <p class="mt-2 max-w-2xl text-sm text-slate-200">Manage events, files, users, and backups from one place.</p>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-3">
        <a href="{{ route('admin.events.index') }}" class="admin-card p-5 transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-slate-500">Total events</span>
                <span class="rounded bg-orange-50 p-2 text-primary">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </span>
            </div>
            <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalEvents ?? 0 }}</p>
            <p class="mt-1 text-xs text-slate-500">{{ $upcomingEvents ?? 0 }} upcoming</p>
        </a>

        <a href="{{ route('admin.files.index') }}" class="admin-card p-5 transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-slate-500">Files</span>
                <span class="rounded bg-sky-50 p-2 text-sky-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </span>
            </div>
            <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalFiles ?? 0 }}</p>
            <p class="mt-1 text-xs text-slate-500">Documents in the library</p>
        </a>

        <a href="{{ route('admin.users.index') }}" class="admin-card p-5 transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-slate-500">Users</span>
                <span class="rounded bg-emerald-50 p-2 text-emerald-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </span>
            </div>
            <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalUsers ?? 0 }}</p>
            <p class="mt-1 text-xs text-slate-500">Dashboard accounts</p>
        </a>

        <a href="{{ route('admin.logos.index') }}" class="admin-card p-5 transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-slate-500">Partner logos</span>
                <span class="rounded bg-violet-50 p-2 text-violet-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </span>
            </div>
            <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalLogos ?? 0 }}</p>
            <p class="mt-1 text-xs text-slate-500">Displayed on the site</p>
        </a>

        <a href="{{ route('admin.backups.index') }}" class="admin-card p-5 transition hover:shadow-md">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-slate-500">Backups</span>
                <span class="rounded bg-indigo-50 p-2 text-indigo-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                </span>
            </div>
            <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalBackups ?? 0 }}</p>
            <p class="mt-1 text-xs text-slate-500">Completed system backups</p>
        </a>

        <div class="admin-card p-5">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-slate-500">Recent events</span>
                <span class="rounded bg-amber-50 p-2 text-amber-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
            </div>
            <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalRecentEvents ?? 0 }}</p>
            <p class="mt-1 text-xs text-slate-500">Past activity records</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-5">
        <div class="admin-card lg:col-span-3">
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-4">
                <h3 class="font-semibold text-slate-900">Latest events</h3>
                <a href="{{ route('admin.events.index') }}" class="text-sm font-medium text-primary hover:text-orange-600">View all</a>
            </div>
            <div class="divide-y divide-slate-100">
                @forelse(($recentEvents ?? collect())->take(5) as $event)
                    <div class="flex items-center justify-between px-6 py-4">
                        <div>
                            <p class="text-sm font-medium text-slate-900">{{ $event->eventname }}</p>
                            <p class="text-xs text-slate-500">{{ $event->formatted_event_date }}</p>
                        </div>
                        <span class="rounded px-2.5 py-1 text-xs font-medium
                            {{ ($event->status ?? 'upcoming') === 'upcoming' ? 'bg-sky-50 text-sky-700' :
                               (($event->status ?? '') === 'ongoing' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600') }}">
                            {{ ucfirst($event->status ?? 'upcoming') }}
                        </span>
                    </div>
                @empty
                    <div class="px-6 py-10 text-sm text-slate-500">
                        No events yet. <a href="{{ route('admin.events.create') }}" class="font-medium text-primary">Create one</a>.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="admin-card p-6 lg:col-span-2">
            <h3 class="font-semibold text-slate-900">Quick actions</h3>
            <div class="mt-4 grid grid-cols-1 gap-3">
                <a href="{{ route('admin.events.create') }}" class="flex items-center gap-3 rounded border border-slate-200 px-4 py-3 text-sm font-medium text-slate-800 hover:border-orange-200 hover:bg-orange-50">
                    Add event
                </a>
                <a href="{{ route('admin.files.index') }}" class="flex items-center gap-3 rounded border border-slate-200 px-4 py-3 text-sm font-medium text-slate-800 hover:border-orange-200 hover:bg-orange-50">
                    Upload a file
                </a>
                <a href="{{ route('admin.users.create') }}" class="flex items-center gap-3 rounded border border-slate-200 px-4 py-3 text-sm font-medium text-slate-800 hover:border-orange-200 hover:bg-orange-50">
                    Add a user
                </a>
                <a href="{{ route('admin.backups.index') }}" class="flex items-center gap-3 rounded border border-slate-200 px-4 py-3 text-sm font-medium text-slate-800 hover:border-orange-200 hover:bg-orange-50">
                    Create a backup
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
