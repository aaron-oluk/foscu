@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-64 bg-cover bg-center" style="background-image: url('{{ asset('images/research.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-4xl font-bold mb-2">Papers &amp; Reports</h1>
            <p class="text-lg">Synthesis reports and organisational capacity assessments</p>
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
            @foreach($pdfs as $pdf)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="h-48 bg-gradient-to-br from-green-500 to-green-700 flex items-center justify-center">
                    <div class="text-center text-white">
                        <i class="fas fa-file-alt text-4xl mb-2"></i>
                        <p class="text-sm">PDF Document</p>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">{{ $pdf['title'] }}</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">PDF</span>
                        <a href="{{ route('track-download', ['file' => $pdf['file']]) }}"
                           class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded text-sm transition-colors">
                            <i class="fas fa-download mr-2"></i>Download
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
