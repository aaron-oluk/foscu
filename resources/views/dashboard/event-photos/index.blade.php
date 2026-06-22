@extends('layouts.dashboard')

@section('title', 'Event Photos Management')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Event Photos Management</h1>
        <a href="{{ route('dashboard.event-photos.categories.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
            <i class="fas fa-plus mr-2"></i>Add New Category
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid gap-6">
        @forelse($categories as $category)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">{{ $category->name }}</h2>
                            <p class="text-gray-600 text-sm mt-1">{{ $category->description }}</p>
                            <div class="flex items-center mt-2">
                                <span class="inline-block px-2 py-1 text-xs font-medium rounded-full {{ $category->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($category->status) }}
                                </span>
                                <span class="ml-3 text-sm text-gray-500">Order: {{ $category->display_order }}</span>
                                <span class="ml-3 text-sm text-gray-500">Photos: {{ $category->photos->count() }}</span>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('dashboard.event-photos.photos.create', $category->id) }}" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm transition-colors">
                                <i class="fas fa-plus mr-1"></i>Add Photo
                            </a>
                            <a href="{{ route('dashboard.event-photos.categories.edit', $category->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition-colors">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            <form action="{{ route('dashboard.event-photos.categories.delete', $category->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category and all its photos?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition-colors">
                                    <i class="fas fa-trash mr-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @if($category->photos->count() > 0)
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                            @foreach($category->photos as $photo)
                                <div class="relative group">
                                    <div class="aspect-w-16 aspect-h-9 bg-gray-200 rounded-lg overflow-hidden">
                                        <img src="{{ $photo->image_url }}" alt="{{ $photo->alt_text }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 rounded-lg flex items-center justify-center">
                                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex space-x-2">
                                            <a href="{{ route('dashboard.event-photos.photos.edit', $photo->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm transition-colors">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('dashboard.event-photos.photos.delete', $photo->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this photo?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm transition-colors">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <h4 class="font-medium text-gray-800 text-sm">{{ $photo->title }}</h4>
                                        <div class="flex items-center justify-between mt-1">
                                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full {{ $photo->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($photo->status) }}
                                            </span>
                                            <span class="text-xs text-gray-500">Order: {{ $photo->display_order }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="p-6 text-center text-gray-500">
                        <i class="fas fa-image text-4xl mb-4"></i>
                        <p>No photos in this category yet.</p>
                        <a href="{{ route('dashboard.event-photos.photos.create', $category->id) }}" class="text-blue-500 hover:text-blue-600 mt-2 inline-block">
                            Add the first photo
                        </a>
                    </div>
                @endif
            </div>
        @empty
            <div class="bg-white rounded-lg shadow-md p-8 text-center">
                <i class="fas fa-folder-open text-6xl text-gray-400 mb-4"></i>
                <h2 class="text-xl font-semibold text-gray-600 mb-2">No Event Categories</h2>
                <p class="text-gray-500 mb-4">Create your first event category to start organizing photos.</p>
                <a href="{{ route('dashboard.event-photos.categories.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors">
                    <i class="fas fa-plus mr-2"></i>Create Category
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('styles')
<style>
    .aspect-w-16 {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
    }

    .aspect-w-16 > * {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
@endpush
