@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-96 bg-cover bg-center" style="background-image: url('{{ asset('images/edu6.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-4">E-Learning</h1>
            <p class="text-xl">Online learning modules and training materials for food safety education</p>
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
        
        <div class="text-center py-16">
            <i class="fas fa-graduation-cap text-6xl text-gray-400 mb-4"></i>
            <h2 class="text-2xl font-semibold mb-4 text-gray-700">E-Learning Platform Coming Soon</h2>
            <p class="text-gray-600 max-w-md mx-auto">
                We are developing interactive online learning modules for food safety education. 
                This platform will feature comprehensive training materials and assessments.
            </p>
            <div class="mt-8 text-left max-w-2xl mx-auto">
                <h3 class="text-xl font-semibold mb-4 text-primary">Planned Features:</h3>
                <ul class="space-y-2 text-gray-600">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                        Interactive food safety training modules
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                        Value chain specific courses
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                        Progress tracking and certificates
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                        Multilingual support
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mr-3 mt-1"></i>
                        Mobile-friendly platform
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
