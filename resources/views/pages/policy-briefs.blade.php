@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-96 bg-cover bg-center" style="background-image: url('{{ asset('images/female.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-4">Policy Briefs</h1>
            <p class="text-xl">Policy recommendations and briefs on food safety regulations and standards</p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-16">
    <div class="max-w-6xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('information-resources') }}" class="text-primary hover:text-orange-600 font-semibold">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Information Resources
            </a>
        </div>

        @if($briefs->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($briefs as $brief)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-file-pdf text-6xl text-red-500"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-3 text-gray-800">{{ $brief->display_title }}</h3>
                    <a
                        href="{{ route('track-download', ['file' => basename($brief->stored_path)]) }}"
                        class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded inline-flex items-center transition-colors"
                    >
                        <i class="fas fa-download mr-2"></i>
                        Download
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <i class="fas fa-gavel text-6xl text-gray-400 mb-4"></i>
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">Policy Briefs Coming Soon</h2>
            <p class="text-gray-600 max-w-md mx-auto">
                We are currently developing comprehensive policy briefs on food safety regulations and standards.
                Please check back soon for updates.
            </p>
        </div>
        @endif
    </div>
</div>
@endsection
