@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-96 bg-cover bg-center" style="background-image: url('{{ asset('images/work.png') }}');">
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-transparent flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-4">Our Work</h1>
            <p class="text-xl">Building food safety capacity across Uganda</p>
        </div>
    </div>
</div>

<!-- Main Content with Orange Background -->
<div class="relative min-h-screen bg-primary">
    <!-- Content -->
    <div class="relative z-10 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
            
            <!-- TWG1: Food safety documentation, research, and development -->
            <div class="mb-16">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/3">
                        <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-full p-8 mx-auto w-48 h-48 flex items-center justify-center">
                            <img src="{{ asset('images/docu1.jpg') }}" alt="Documentation" class="w-32 h-32 object-cover rounded-full">
                        </div>
                    </div>
                    <div class="lg:w-2/3">
                        <h2 class="text-4xl font-bold text-white mb-6 drop-shadow-lg">TWG1: Food safety documentation, research, and development</h2>
                        <p class="text-white text-lg leading-relaxed drop-shadow-md">
                            The group's work forms the core of our involvement in food safety scientific research the systemic generation and synthesis of evidence on food safety, that is context-specific. We put great emphasis on analysing food safety hazards through a value-chain approach. TGW1's work is guided by a research and development long-term strategy, agreed upon by all FoSCU members.
                        </p>
                    </div>
                </div>
            </div>

            <!-- TWG2: Food safety communication and awareness creation -->
            <div class="mb-16">
                <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                    <div class="lg:w-1/3">
                        <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-full p-8 mx-auto w-48 h-48 flex items-center justify-center">
                            <img src="{{ asset('images/edu1.jpg') }}" alt="Communication" class="w-32 h-32 object-cover rounded-full">
                        </div>
                    </div>
                    <div class="lg:w-2/3">
                        <h2 class="text-4xl font-bold text-white mb-6 drop-shadow-lg">TWG2: Food safety communication and awareness creation</h2>
                        <p class="text-white text-lg leading-relaxed drop-shadow-md">
                            Coalition members with communication expertise constitute this groups. Guided by an all agreed long-term communication strategy, TWG2 packages food safety information in innovative and interactive communication tools for use in awareness creation, targeting consumers of diverse categories.
                        </p>
                    </div>
                </div>
            </div>

            <!-- TWG3: Food safety technical assistance and capacity building -->
            <div class="mb-16">
                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/3">
                        <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-full p-8 mx-auto w-48 h-48 flex items-center justify-center">
                            <img src="{{ asset('images/edu2.jpg') }}" alt="Training" class="w-32 h-32 object-cover rounded-full">
                        </div>
                    </div>
                    <div class="lg:w-2/3">
                        <h2 class="text-4xl font-bold text-white mb-6 drop-shadow-lg">TWG3: Food safety technical assistance and capacity building</h2>
                        <p class="text-white text-lg leading-relaxed drop-shadow-md">
                            This group of FoSCU members coordinates trainings and knowledge transfer engagements targeting members of the coalition, and other stakeholders (farmers, consumers, input dealers, food food vendors among others). Its work is guided by a long-term capacity building strategy.
                        </p>
                    </div>
                </div>
            </div>

            <!-- TWG4: Food safety governance, compliance, and normative -->
            <div class="mb-16">
                <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                    <div class="lg:w-1/3">
                        <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-full p-8 mx-auto w-48 h-48 flex items-center justify-center">
                            <img src="{{ asset('images/docu2.jpg') }}" alt="Governance" class="w-32 h-32 object-cover rounded-full">
                        </div>
                    </div>
                    <div class="lg:w-2/3">
                        <h2 class="text-4xl font-bold text-white mb-6 drop-shadow-lg">TWG4: Food safety governance, compliance, and normative</h2>
                        <p class="text-white text-lg leading-relaxed drop-shadow-md">
                            This group coordinates activities related to food safety governance, policy advocacy, and regulatory compliance. Working closely with government institutions and regulatory bodies, TWG4 ensures that food safety standards are properly implemented and monitored across all sectors.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-16">
                <h3 class="text-3xl font-bold text-white mb-6 drop-shadow-lg">Join Our Mission</h3>
                <p class="text-white text-lg mb-8 drop-shadow-md">
                    Be part of Uganda's food safety transformation. Together, we can build a safer food system for all.
                </p>
                <div class="space-x-4">
                    <a href="{{ route('information-resources') }}" class="bg-white text-orange-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors inline-block shadow-lg">
                        Learn More
                    </a>
                    <a href="{{ route('focus') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-orange-600 transition-colors inline-block shadow-lg">
                        Our Focus
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
