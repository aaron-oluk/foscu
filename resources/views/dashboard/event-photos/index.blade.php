@extends('layouts.admin')

@section('page-title', 'Event photos')

@section('content')
<div class="space-y-6">
    @if(session('success'))
        <div class="admin-flash-ok">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="admin-flash-err">{{ session('error') }}</div>
    @endif

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Event photos</h2>
            <p class="mt-1 text-sm text-slate-500">Organize gallery photos by category.</p>
        </div>
        <a href="{{ route('dashboard.event-photos.categories.create') }}" class="admin-btn">Add category</a>
    </div>

    <div class="space-y-4">
        @forelse($categories as $category)
            <div class="admin-card">
                <div class="flex flex-col gap-4 border-b border-slate-100 px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="font-semibold text-slate-900">{{ $category->name }}</h3>
                        @if($category->description)
                            <p class="mt-1 text-sm text-slate-500">{{ $category->description }}</p>
                        @endif
                        <div class="mt-2 flex flex-wrap items-center gap-3">
                            <span class="rounded px-2 py-0.5 text-xs font-medium {{ $category->status === 'active' ? 'bg-emerald-50 text-emerald-700' : 'bg-red-50 text-red-700' }}">
                                {{ ucfirst($category->status) }}
                            </span>
                            <span class="text-xs text-slate-500">Order: {{ $category->display_order }}</span>
                            <span class="text-xs text-slate-500">Photos: {{ $category->photos->count() }}</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('dashboard.event-photos.photos.create', $category->id) }}" class="admin-btn">Add photo</a>
                        <a href="{{ route('dashboard.event-photos.categories.edit', $category->id) }}" class="admin-btn-secondary">Edit</a>
                        <form action="{{ route('dashboard.event-photos.categories.delete', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category and all its photos?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center rounded border border-red-200 bg-white px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50">Delete</button>
                        </form>
                    </div>
                </div>

                @if($category->photos->count() > 0)
                    <div class="grid grid-cols-1 gap-4 p-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach($category->photos as $photo)
                            <div>
                                <div class="relative overflow-hidden rounded bg-slate-100">
                                    <img src="{{ $photo->image_url }}" alt="{{ $photo->alt_text }}" class="h-40 w-full object-cover">
                                    <div class="absolute inset-0 flex items-center justify-center gap-2 bg-slate-900/0 opacity-0 transition hover:bg-slate-900/50 hover:opacity-100">
                                        <a href="{{ route('dashboard.event-photos.photos.edit', $photo->id) }}" class="admin-btn">Edit</a>
                                        <form action="{{ route('dashboard.event-photos.photos.delete', $photo->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center justify-center rounded bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <h4 class="mt-2 text-sm font-medium text-slate-900">{{ $photo->title }}</h4>
                                <div class="mt-1 flex items-center justify-between">
                                    <span class="rounded px-2 py-0.5 text-xs font-medium {{ $photo->status === 'active' ? 'bg-emerald-50 text-emerald-700' : 'bg-red-50 text-red-700' }}">
                                        {{ ucfirst($photo->status) }}
                                    </span>
                                    <span class="text-xs text-slate-500">Order: {{ $photo->display_order }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="px-6 py-10 text-center text-sm text-slate-500">
                        No photos in this category yet.
                        <a href="{{ route('dashboard.event-photos.photos.create', $category->id) }}" class="font-medium text-primary">Add the first photo</a>.
                    </div>
                @endif
            </div>
        @empty
            <div class="admin-card px-6 py-10 text-center">
                <h3 class="font-semibold text-slate-900">No event categories</h3>
                <p class="mt-1 text-sm text-slate-500">Create a category to start organizing photos.</p>
                <a href="{{ route('dashboard.event-photos.categories.create') }}" class="admin-btn mt-4">Create category</a>
            </div>
        @endforelse
    </div>
</div>
@endsection
