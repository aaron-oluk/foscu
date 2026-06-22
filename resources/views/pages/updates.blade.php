@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-64 bg-cover bg-center" style="background-image: url('{{ asset('images/research.png') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-2">FoSCU Updates</h1>
            <p class="text-xl">News and activities from the Food Safety Coalition of Uganda.</p>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-16">
    <div class="max-w-4xl mx-auto space-y-16">

        <!-- Update 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <h2 class="text-xl font-bold text-orange-500 mb-4">1. Launching Evidence to Strengthen Food Safety and Sustainable Crop Protection</h2>
                <p class="text-gray-700 leading-relaxed mb-6">Representatives of member organizations of the Food Safety Coalition of Uganda (FoSCU) participated in the launch of the "Food Safety–Crop Protection Nexus: Insights from Uganda's Agriculture Sector" synthesis report. The report presents evidence-based analysis on the current state of agrochemical use in Uganda and its implications for food safety, environmental sustainability, and public health. It further outlines targeted, actionable recommendations for policymakers, regulators, agricultural actors, and development partners to advance sustainable crop protection practices and strengthen food safety systems across the country.</p>
            </div>
            <img src="{{ asset('gallery/updates-2025/launching-evidence-crop-protection.png') }}" alt="Launching Evidence on Crop Protection" class="w-full object-cover">
        </div>

        <!-- Update 2 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <h2 class="text-xl font-bold text-orange-500 mb-4">2. FoSCU Spearheads Aflatoxin Awareness Campaign to Safeguard Uganda's Food Value Chain</h2>
                <p class="text-gray-700 leading-relaxed mb-6">FoSCU led a major aflatoxin awareness campaign aimed at protecting Uganda's food value chain from the dangers of aflatoxin contamination. The campaign brought together key stakeholders including farmers, traders, processors, and policymakers to sign a commitment towards reducing aflatoxin levels in food and feed. The initiative included the official launch and signing of an aflatoxin action report that outlines practical steps for prevention and control across Uganda's agricultural sectors.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
                <img src="{{ asset('gallery/updates-2025/aflatoxins-report-launch.png') }}" alt="Aflatoxins Report Launch" class="w-full h-64 object-cover">
                <img src="{{ asset('gallery/updates-2025/aflatoxins-report-signing.png') }}" alt="Aflatoxins Report Signing" class="w-full h-64 object-cover">
                <img src="{{ asset('gallery/updates-2025/aflatoxins-report-group.png') }}" alt="Aflatoxins Report Group" class="w-full h-64 object-cover">
            </div>
        </div>

        <!-- Update 3 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <h2 class="text-xl font-bold text-orange-500 mb-4">3. FoSCU Participates in the CAADP Biennial Review</h2>
                <p class="text-gray-700 leading-relaxed mb-6">FoSCU participated in the Comprehensive Africa Agriculture Development Programme (CAADP) Biennial Review process, contributing FoSCU's expertise and evidence on food safety to continental agricultural policy discussions. Representatives presented findings on Uganda's food safety landscape and engaged with regional counterparts on strategies to integrate food safety into broader agricultural development frameworks. The participation underscores FoSCU's commitment to shaping policy at both national and continental levels.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
                <img src="{{ asset('gallery/updates-2025/caadp-banner-trio.png') }}" alt="CAADP Banner" class="w-full h-64 object-cover">
                <img src="{{ asset('gallery/updates-2025/caadp-speaker.png') }}" alt="CAADP Speaker" class="w-full h-64 object-cover">
                <img src="{{ asset('gallery/updates-2025/caadp-group.png') }}" alt="CAADP Group" class="w-full h-64 object-cover">
            </div>
        </div>

        <!-- Update 4 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <h2 class="text-xl font-bold text-orange-500 mb-4">4. Community Capacity Building on Food Safety</h2>
                <p class="text-gray-700 leading-relaxed mb-6">FoSCU conducted community-level capacity building workshops targeting grassroots actors in the food value chain. Participants were equipped with practical knowledge on food safety hazards, safe food handling practices, and their roles in preventing contamination. The workshops emphasized the importance of community-led food safety monitoring and highlighted how everyday actors — from farmers to market vendors — can contribute to a safer food system in Uganda.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                <img src="{{ asset('gallery/updates-2025/community-capacity-workshop.png') }}" alt="Community Capacity Workshop" class="w-full h-72 object-cover">
                <img src="{{ asset('gallery/updates-2025/community-capacity-group.png') }}" alt="Community Capacity Group" class="w-full h-72 object-cover">
            </div>
        </div>

        <!-- Update 5 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <h2 class="text-xl font-bold text-orange-500 mb-4">5. Engaging Religious Leaders on Food Safety</h2>
                <p class="text-gray-700 leading-relaxed mb-6">FoSCU engaged religious leaders across Uganda as trusted community influencers in driving food safety messaging at the grassroots level. Religious leaders from various faith communities gathered to discuss how places of worship can serve as platforms for food safety education. The initiative recognises that religious leaders hold significant influence over community behaviour and can play a vital role in promoting safe food practices and discouraging the use of harmful substances in food production.</p>
            </div>
            <img src="{{ asset('gallery/updates-2025/religious-leaders-food-safety.png') }}" alt="Religious Leaders on Food Safety" class="w-full object-cover">
        </div>

        <!-- Update 6 -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <h2 class="text-xl font-bold text-orange-500 mb-4">6. World Food Safety Day Commemoration</h2>
                <p class="text-gray-700 leading-relaxed mb-6">FoSCU joined global celebrations of World Food Safety Day with a series of public awareness activities including a community walk and public demonstrations. The events brought together FoSCU members, government officials, civil society organisations, and the general public to amplify the message that food safety is a shared responsibility. Participants carried banners and signs promoting safe food practices and called on all Ugandans to be vigilant about the food they consume and produce.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
                <img src="{{ asset('gallery/updates-2025/wfsd-walk-1.png') }}" alt="WFSD Walk" class="w-full h-64 object-cover">
                <img src="{{ asset('gallery/updates-2025/wfsd-walk-2.png') }}" alt="WFSD Walk 2" class="w-full h-64 object-cover">
                <img src="{{ asset('gallery/updates-2025/wfsd-signs.png') }}" alt="WFSD Signs" class="w-full h-64 object-cover">
            </div>
        </div>

    </div>
</div>
@endsection
