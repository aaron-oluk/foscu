@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-64 bg-cover bg-center" style="background-image: url('{{ asset('images/analyze.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-4xl font-bold mb-2">Research Briefs</h1>
            <p class="text-lg">Evidence-based insights on food safety in agricultural value chains</p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-16">
    <div class="max-w-6xl mx-auto">
        
        <div class="mb-8">
            <a href="{{ route('information-resources') }}" class="text-primary hover:text-orange-600 font-medium">
                <i class="fas fa-arrow-left mr-2"></i>Back to Information Resources
            </a>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($researchBriefs as $brief)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                    <div class="text-center text-white">
                        <i class="fas fa-microscope text-4xl mb-2"></i>
                        <p class="text-sm">Research Brief</p>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-3 text-gray-800">{{ $brief['title'] }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $brief['description'] }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">PDF Document</span>
                        <a href="{{ route('track-download', ['file' => $brief['file']]) }}" 
                           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm transition-colors">
                            <i class="fas fa-download mr-2"></i>Download
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Additional Info Section -->
        <div class="mt-16 bg-gray-50 rounded-lg p-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">About Our Research</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Our research briefs provide comprehensive analysis of food safety challenges and opportunities 
                    across different agricultural value chains in Uganda. Each brief is based on rigorous field 
                    research and stakeholder consultations.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Stakeholder Engagement</h3>
                    <p class="text-gray-600">Involving farmers, processors, and policy makers in research</p>
                </div>
                
                <div>
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-bar text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Data-Driven Insights</h3>
                    <p class="text-gray-600">Evidence-based recommendations for food safety improvements</p>
                </div>
                
                <div>
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-white text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">Practical Solutions</h3>
                    <p class="text-gray-600">Actionable strategies for different value chain actors</p>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
