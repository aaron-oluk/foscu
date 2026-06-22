@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-96 bg-cover bg-center" style="background-image: url('{{ asset('images/edu7.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-4">Relevant Sites</h1>
            <p class="text-xl">Links to important food safety organizations and regulatory bodies</p>
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
        
        <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-6">
            @foreach($sites as $site)
            <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mr-4">
                        <i class="fas fa-external-link-alt text-3xl text-primary"></i>
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-xl font-semibold mb-2 text-gray-800">{{ $site['name'] }}</h3>
                        <p class="text-gray-600 mb-4">{{ $site['description'] }}</p>
                        <a 
                            href="{{ $site['url'] }}" 
                            target="_blank" 
                            rel="noopener noreferrer"
                            class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded inline-flex items-center transition-colors"
                        >
                            <i class="fas fa-link mr-2"></i>
                            Visit Website
                            <i class="fas fa-external-link-alt ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-12 bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold mb-6 text-primary">Additional Resources</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-3">International Organizations</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li>• World Food Programme (WFP)</li>
                        <li>• International Fund for Agricultural Development (IFAD)</li>
                        <li>• Global Food Safety Initiative (GFSI)</li>
                        <li>• Food Safety and Standards Authority</li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-3">Regional Bodies</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li>• East African Community (EAC)</li>
                        <li>• African Union (AU) Food Safety Initiative</li>
                        <li>• COMESA Food Safety Standards</li>
                        <li>• Regional Food Safety Networks</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
