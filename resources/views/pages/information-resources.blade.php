@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-96 bg-cover bg-center" style="background-image: url('{{ asset('images/research.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-4">Information Resources</h1>
            <p class="text-xl">Access our comprehensive collection of food safety resources</p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-16">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Videos -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/agric.jpg') }}');">
                    <div class="h-full bg-black bg-opacity-40 flex items-center justify-center">
                        <i class="fas fa-play-circle text-6xl text-white"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Videos</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Watch educational videos on food safety practices and agricultural innovations.
                    </p>
                    <a 
                        href="{{ route('videos') }}" 
                        class="bg-primary hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-flex items-center font-semibold transition-colors duration-200"
                    >
                        <i class="fas fa-play mr-2"></i>
                        Watch Videos
                    </a>
                </div>
            </div>

            <!-- Research Briefs -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/research.png') }}');">
                    <div class="h-full bg-black bg-opacity-40 flex items-center justify-center">
                        <i class="fas fa-microscope text-6xl text-white"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Research Briefs</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Comprehensive research findings on food safety in various agricultural value chains.
                    </p>
                    <a 
                        href="{{ route('research') }}" 
                        class="bg-primary hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-flex items-center font-semibold transition-colors duration-200"
                    >
                        <i class="fas fa-file-alt mr-2"></i>
                        View Research
                    </a>
                </div>
            </div>

            <!-- Reports -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/docu1.jpg') }}');">
                    <div class="h-full bg-black bg-opacity-40 flex items-center justify-center">
                        <i class="fas fa-chart-line text-6xl text-white"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Reports</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Detailed reports on food safety initiatives, assessments, and organizational activities.
                    </p>
                    <a 
                        href="{{ route('reports') }}" 
                        class="bg-primary hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-flex items-center font-semibold transition-colors duration-200"
                    >
                        <i class="fas fa-file-pdf mr-2"></i>
                        View Reports
                    </a>
                </div>
            </div>

            <!-- Posters -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/work.png') }}');">
                    <div class="h-full bg-black bg-opacity-40 flex items-center justify-center">
                        <i class="fas fa-image text-6xl text-white"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Posters</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Visual educational materials and campaign posters for food safety awareness.
                    </p>
                    <a 
                        href="{{ route('posters') }}" 
                        class="bg-primary hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-flex items-center font-semibold transition-colors duration-200"
                    >
                        <i class="fas fa-images mr-2"></i>
                        View Posters
                    </a>
                </div>
            </div>

            <!-- Policy Briefs -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/docu2.jpg') }}');">
                    <div class="h-full bg-black bg-opacity-40 flex items-center justify-center">
                        <i class="fas fa-gavel text-6xl text-white"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Policy Briefs</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Policy recommendations and briefs on food safety regulations and standards.
                    </p>
                    <a 
                        href="{{ route('policy-briefs') }}" 
                        class="bg-primary hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-flex items-center font-semibold transition-colors duration-200"
                    >
                        <i class="fas fa-file-contract mr-2"></i>
                        View Policy Briefs
                    </a>
                </div>
            </div>

            <!-- Articles -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/docu3.jpg') }}');">
                    <div class="h-full bg-black bg-opacity-40 flex items-center justify-center">
                        <i class="fas fa-newspaper text-6xl text-white"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Articles</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Published articles, news pieces, and thought leadership on food safety topics.
                    </p>
                    <a 
                        href="{{ route('articles') }}" 
                        class="bg-primary hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-flex items-center font-semibold transition-colors duration-200"
                    >
                        <i class="fas fa-newspaper mr-2"></i>
                        Read Articles
                    </a>
                </div>
            </div>

            <!-- E-Learning -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/edu6.jpg') }}');">
                    <div class="h-full bg-black bg-opacity-40 flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-6xl text-white"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">E-Learning</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Online learning modules and training materials for food safety education.
                    </p>
                    <a 
                        href="{{ route('e-learning') }}" 
                        class="bg-primary hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-flex items-center font-semibold transition-colors duration-200"
                    >
                        <i class="fas fa-laptop mr-2"></i>
                        Start Learning
                    </a>
                </div>
            </div>

            <!-- Audio -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/edu1.jpg') }}');">
                    <div class="h-full bg-black bg-opacity-40 flex items-center justify-center">
                        <i class="fas fa-headphones text-6xl text-white"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Audio</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Audio resources and radio programs on food safety awareness in multiple languages.
                    </p>
                    <a 
                        href="{{ route('audio') }}" 
                        class="bg-primary hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-flex items-center font-semibold transition-colors duration-200"
                    >
                        <i class="fas fa-volume-up mr-2"></i>
                        Listen to Audio
                    </a>
                </div>
            </div>

            <!-- Relevant Sites -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ asset('images/veges.png') }}');">
                    <div class="h-full bg-black bg-opacity-40 flex items-center justify-center">
                        <i class="fas fa-external-link-alt text-6xl text-white"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">Relevant Sites</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        Links to important food safety organizations and regulatory bodies.
                    </p>
                    <a 
                        href="{{ route('relevant-sites') }}" 
                        class="bg-primary hover:bg-orange-600 text-white px-6 py-3 rounded-lg inline-flex items-center font-semibold transition-colors duration-200"
                    >
                        <i class="fas fa-link mr-2"></i>
                        Visit Sites
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
