@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-96 bg-cover bg-center" style="background-image: url('{{ asset('images/foscu1.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-4">Who We Are</h1>
            <p class="text-xl">Building safer food systems across Uganda</p>
        </div>
    </div>
</div>

<!-- Green Background Section -->
<div class="relative bg-green-600 py-16">
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('{{ asset('images/agric.jpg') }}');"></div>
    <div class="relative z-10 container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-white">
                    <h2 class="text-3xl font-bold mb-6">About FoSCU</h2>
                    <p class="text-lg mb-6 leading-relaxed">
                        The Food Safety Coalition Uganda (FoSCU) is a multi-stakeholder platform that brings together diverse organizations and individuals committed to improving food safety standards across Uganda's agricultural and food systems.
                    </p>
                    <p class="text-lg mb-6 leading-relaxed">
                        We operate through collaborative working modalities spelt out in our Governance Charter.
                    </p>
                    
                    <div class="mt-8">
                        <h3 class="text-2xl font-bold mb-4">Our structures include:</h3>
                        <ul class="space-y-3 text-lg">
                            <li class="flex items-center">
                                <i class="fas fa-circle text-orange-400 mr-3 text-xs"></i>
                                General Assembly
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-circle text-orange-400 mr-3 text-xs"></i>
                                Steering Committee
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-circle text-orange-400 mr-3 text-xs"></i>
                                Technical Working Groups
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-circle text-orange-400 mr-3 text-xs"></i>
                                Secretariat
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-8 border border-white border-opacity-20">
                    <h3 class="text-2xl font-bold text-white mb-4">Our Mission</h3>
                    <p class="text-white text-lg mb-6">
                        To promote safe food systems in Uganda through advocacy, capacity building, research, and multi-stakeholder collaboration.
                    </p>
                    
                    <h3 class="text-2xl font-bold text-white mb-4">Our Vision</h3>
                    <p class="text-white text-lg">
                        A Uganda where all people have access to safe, nutritious food throughout the value chain from farm to fork.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- White Section with Benefits -->
<div class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">By breaking silos and working jointly, we foresee the following benefits:</h2>
            </div>
            
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-circle text-white text-xs"></i>
                        </div>
                        <div>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                An ecosystem of influence resulting from diversity, capabilities, and inter-connection of different members of the coalition. This will ensure that network members add up to more than their parts, permitting simultaneous push for safer food using different methods, platforms, financial resources, talents, and knowledge.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-circle text-white text-xs"></i>
                        </div>
                        <div>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                An opportunity for active cultivation that will facilitate shared learning, resource mobilization and convening around the issue of sustainability.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-circle text-white text-xs"></i>
                        </div>
                        <div>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                Increased likelihood of closing the salience and political deficits around food contamination in Uganda, leveraging on the already existing context-specific evidence that has greatly narrowed the information gap.
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-orange-500 rounded-full flex items-center justify-center mr-4 mt-1">
                            <i class="fas fa-circle text-white text-xs"></i>
                        </div>
                        <div>
                            <p class="text-gray-700 text-lg leading-relaxed">
                                An opportunity to catalyse and facilitate review of policies, regulations and standards frameworks for better food safety governance whilst trantraitioning towards more sustainable agri-food systems.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="relative">
                    <div class="bg-cover bg-center h-96 rounded-lg shadow-lg" style="background-image: url('{{ asset('images/tomatoes.jpg') }}');">
                        <div class="absolute inset-0 bg-black bg-opacity-30 rounded-lg"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action Section -->
<div class="bg-primary py-16">
    <div class="container mx-auto px-4 text-center">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-white mb-4">Join Our Coalition</h2>
            <p class="text-xl text-white mb-8">
                Be part of Uganda's food safety transformation. Together, we can build a safer food system for all.
            </p>
            <div class="space-x-4">
                <a href="{{ route('our-work') }}" class="bg-white text-primary px-8 py-3 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors inline-block">
                    Our Work
                </a>
                <a href="{{ route('information-resources') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-white hover:text-primary transition-colors inline-block">
                    Resources
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
