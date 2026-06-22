@extends('layouts.main')

@section('content')
<!-- Main Focus Section with Green Background -->
<div class="relative min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/agric.jpg') }}');">
    <!-- Green Overlay -->
    <div class="absolute inset-0 bg-green-700 bg-opacity-80"></div>
    
    <!-- Content -->
    <div class="relative z-10 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                
                <!-- Guiding Question -->
                <div class="text-center mb-16">
                    <p class="text-white text-xl mb-8">Our existence and direction is guided by the question:</p>
                    
                    <!-- Quote with Orange Quotation Marks -->
                    <div class="relative">
                        <div class="text-primary text-8xl font-bold absolute -top-4 -left-4 opacity-80">"</div>
                        <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight px-8">
                            How can contamination-free food be realised in Uganda's agri-food system?
                        </h1>
                        <div class="text-primary text-8xl font-bold absolute -bottom-4 -right-4 opacity-80">"</div>
                    </div>
                </div>
                
                <!-- Detailed Explanation -->
                <div class="max-w-4xl mx-auto">
                    <div class="bg-black bg-opacity-20 rounded-lg p-8 backdrop-blur-sm">
                        <p class="text-white text-lg leading-relaxed mb-6">
                            At FoSCU we acknowledge at least four broad categories of food safety hazards: 
                            <span class="text-primary font-semibold">Chemical, Biological, Physical and Allergenic</span>. 
                            Of these, chemical contamination is the most commonly spread across different value chain nodes. 
                            From a broader technical perspective, FoSCU promotes the concept of 
                            <span class="text-primary font-semibold">Integrated Pest Management (IPM)</span> 
                            as the most realistic vehicle for transitioning to safe food from current food production 
                            (predominantly conventional), towards the desired food production (predominantly agroecological measures), 
                            taking into consideration sustainable management of the high burden of the crop and animal pests, 
                            vectors and diseases.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Orange Vision Statement Banner -->
<div class="bg-primary py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto text-center">
            <p class="text-white text-xl md:text-2xl font-semibold leading-relaxed">
                We are strategically focused by a broad vision and a resounding motto that reminds us that we all have a 
                <span class="font-bold">RIGHT</span> to consume and a <span class="font-bold">RESPONSIBILITY</span> 
                to contribute to realization of safe food!!
            </p>
        </div>
    </div>
</div>

<!-- Vision, Mission, Motto Section -->
<div class="bg-gray-100 py-16" style="background-image: url('{{ asset('images/agric.jpg') }}'); background-size: cover; background-position: center;">
    <div class="bg-white bg-opacity-90 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl shadow-xl p-12">
                    
                    <!-- Our Vision -->
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold text-primary mb-4">Our Vision</h2>
                        <p class="text-xl text-gray-700 leading-relaxed">
                            A society where all people sustainably access safe food
                        </p>
                    </div>
                    
                    <!-- Our Mission -->
                    <div class="text-center mb-12">
                        <h2 class="text-4xl font-bold text-primary mb-4">Our Mission</h2>
                        <p class="text-xl text-gray-700 leading-relaxed">
                            To harness partnerships towards promoting sustainable food safety for all consumers in Uganda and beyond
                        </p>
                    </div>
                    
                    <!-- Our Motto -->
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-primary mb-4">Our Motto</h2>
                        <p class="text-2xl text-gray-700 font-semibold">
                            "Safe food for all by all"
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
