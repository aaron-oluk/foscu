@extends('layouts.main')

@section('content')
<!-- Hero Video Section -->
<div class="main relative">
    <video autoplay muted loop class="w-full h-screen object-cover">
        <source src="{{ asset('video/foodharzards.mp4') }}" type="video/mp4">
        <!-- Fallback image if video doesn't work -->
        <img src="{{ asset('images/foscu1.jpg') }}" alt="FoSCU Background" class="w-full h-screen object-cover">
    </video>
</div>

<!-- Food Safety News Section -->
<div class="bg-white py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-3xl font-bold text-center mb-8 text-orange-500">Food Safety News</h3>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
                    <blockquote class="twitter-tweet" data-media-max-width="560">
                        <p lang="en" dir="ltr">FOOD SAFETY ALERT!!<br><br>Watch and learn how SEX-PHEROMONE TRAPS are used to manage
                            FRUIT FLIES!!!<br>NON-CHEMICAL PEST MANAGEMENT promotes food safety.<br><br>Full video 👉 <a
                                href="https://t.co/GIpjuvfZXv">https://t.co/GIpjuvfZXv</a><a
                                href="https://twitter.com/hashtag/FoodSafey?src=hash&amp;ref_src=twsrc%5Etfw">#FoodSafey</a> | <a
                                href="https://twitter.com/foscu23?ref_src=twsrc%5Etfw">@foscu23</a> | <a
                                href="https://t.co/TSeOuEwiKQ">https://t.co/TSeOuEwiKQ</a> <a
                                href="https://t.co/l99rhat6c8">pic.twitter.com/l99rhat6c8</a></p>&mdash; ESAU (@Esau_Matsiko) <a
                            href="https://twitter.com/Esau_Matsiko/status/1769301327522206199?ref_src=twsrc%5Etfw">March 17, 2024</a>
                    </blockquote>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
                    <blockquote class="twitter-tweet" data-media-max-width="560">
                        <p lang="en" dir="ltr">FOOD SAFETY ALERT!!<br><br>Watch and learn how SEX-PHEROMONE TRAPS are used to manage
                            FRUIT FLIES!!!<br>NON-CHEMICAL PEST MANAGEMENT promotes food safety.<br><br>Full video 👉 <a
                                href="https://t.co/GIpjuvfZXv">https://t.co/GIpjuvfZXv</a><a
                                href="https://twitter.com/hashtag/FoodSafey?src=hash&amp;ref_src=twsrc%5Etfw">#FoodSafey</a> | <a
                                href="https://twitter.com/foscu23?ref_src=twsrc%5Etfw">@foscu23</a> | <a
                                href="https://t.co/TSeOuEwiKQ">https://t.co/TSeOuEwiKQ</a> <a
                                href="https://t.co/l99rhat6c8">pic.twitter.com/l99rhat6c8</a></p>&mdash; ESAU (@Esau_Matsiko) <a
                            href="https://twitter.com/Esau_Matsiko/status/1769301327522206199?ref_src=twsrc%5Etfw">March 17, 2024</a>
                    </blockquote>
                </div>

                <div class="bg-gray-50 rounded-lg p-6 shadow-sm">
                    <blockquote class="twitter-tweet" data-media-max-width="560">
                        <p lang="en" dir="ltr">FOOD SAFETY ALERT!!<br><br>PESTICIDES ARE DESIGNED TO HARM!!<br>Watch and learn how
                            their lifecycle can be properly managed to protect human health and the environment!!<br><br>Full video 👉
                            <a href="https://t.co/JSRxhEZAqQ">https://t.co/JSRxhEZAqQ</a><a
                                href="https://twitter.com/hashtag/FoodSafey?src=hash&amp;ref_src=twsrc%5Etfw">#FoodSafey</a> | <a
                                href="https://twitter.com/foscu23?ref_src=twsrc%5Etfw">@foscu23</a> | <a
                                href="https://t.co/TSeOuEwiKQ">https://t.co/TSeOuEwiKQ</a> <a
                                href="https://t.co/0DhugUGeBJ">pic.twitter.com/0DhugUGeBJ</a>
                        </p>&mdash; ESAU (@Esau_Matsiko) <a
                            href="https://twitter.com/Esau_Matsiko/status/1769984057482363209?ref_src=twsrc%5Etfw">March 19, 2024</a>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- YouTube Video Section -->
<div class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h3 class="text-3xl font-bold text-center mb-8 text-orange-500">Our Youtube Videos</h3>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Video 1: Food Safety for Consumers -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe 
                            src="https://youtube.com/embed/ckqaq-Bd1Yo?si=dnQVptnFaTg4QyEN" 
                            title="Food Safety for Consumers" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen
                            class="w-full h-48"
                        ></iframe>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Food Safety for Consumers</h4>
                        <p class="text-gray-600 text-sm">Essential food safety practices for consumers.</p>
                    </div>
                </div>
                
                <!-- Video 2: Agricultural Food Safety -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe 
                            src="https://www.youtube.com/embed/DWUmASq_9V0?si=_sQARHbkV_OXkMSN" 
                            title="Agricultural Food Safety" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen
                            class="w-full h-48"
                        ></iframe>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Agricultural Food Safety</h4>
                        <p class="text-gray-600 text-sm">Food safety practices in agriculture.</p>
                    </div>
                </div>
                
                <!-- Video 3: Food Processing Safety -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe 
                            src="https://www.youtube.com/embed/QQ7G1vUicYc?si=8YHwZ9Tt1nu88W-G" 
                            title="Food Processing Safety" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen
                            class="w-full h-48"
                        ></iframe>
                    </div>
                    <div class="p-4">
                        <h4 class="font-semibold text-gray-800 mb-2">Food Processing Safety</h4>
                        <p class="text-gray-600 text-sm">Safe food processing and handling practices.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Events Section -->
<div class="container mx-auto px-4 py-12">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Our Events</h2>
        
        <!-- Events Accordion -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Upcoming Events -->
            <div class="border-b">
                <button 
                    class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 transition-colors"
                    onclick="toggleAccordion('upcoming')"
                >
                    <h3 class="text-xl font-semibold text-gray-800">Upcoming Events</h3>
                </button>
                <div id="upcoming" class="hidden px-6 py-4">
                    @if($upcomingEvents->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                @foreach($upcomingEvents as $event)
                                <tr class="border-b border-gray-200 last:border-b-0">
                                    <td class="py-3">
                                        <h6 class="font-semibold text-gray-800">{{ $event->eventname }}</h6>
                                        <p class="text-gray-600 text-sm">
                                            <span>{{ $event->formatted_event_date }} to {{ $event->formatted_end_date }}</span>
                                        </p>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600">No upcoming events at this time.</p>
                    @endif
                </div>
            </div>

            <!-- Recent Events -->
            <div>
                <button 
                    class="w-full px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 transition-colors"
                    onclick="toggleAccordion('recent')"
                >
                    <h3 class="text-xl font-semibold text-gray-800">Recent Events</h3>
                </button>
                <div id="recent" class="hidden px-6 py-4">
                    @if($recentEvents->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                @foreach($recentEvents as $event)
                                <tr class="border-b border-gray-200 last:border-b-0">
                                    <td class="py-3">
                                        <h6 class="font-semibold text-gray-800">{{ $event->eventname }}</h6>
                                        <p class="text-gray-600 text-sm">
                                            <span>{{ $event->formatted_event_date }}</span>
                                        </p>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    @else
                        <p class="text-gray-600">No recent events to display.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Our Events Photos Section -->
<div class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-orange-500">Our Events Photos</h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Featured Event 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="h-64 bg-cover bg-center" style="background-image: url('{{ asset('images/docu1.jpg') }}');">
                        <div class="h-full bg-black bg-opacity-30 flex items-end">
                            <div class="p-6 text-white">
                                <h3 class="text-xl font-bold mb-2">Development of food safety video coverage</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Featured Event 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="h-64 bg-cover bg-center" style="background-image: url('{{ asset('images/docu2.jpg') }}');">
                        <div class="h-full bg-black bg-opacity-30 flex items-end">
                            <div class="p-6 text-white">
                                <h3 class="text-xl font-bold mb-2">FoSCU Annual General Meeting</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Partners Section -->
@if($logos->count() > 0)
<div class="bg-gradient-to-br from-orange-50 to-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Partners</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Working together with leading organizations to advance food safety across Uganda</p>
            </div>
            
            <!-- Modern Carousel Container -->
            <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden carousel-container">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-gradient-to-r from-orange-500/5 to-transparent"></div>
                
                <!-- Carousel Wrapper -->
                <div class="relative py-8 px-4">
                    <!-- Carousel Track -->
                    <div id="partners-carousel" class="flex animate-scroll-smooth">
                        @foreach($logos->where('status', 'active')->sortBy('display_order') as $logo)
                        <div class="carousel-item flex-shrink-0 mx-4">
                            <div class="group relative">
                                <!-- Logo Container -->
                                <div class="w-36 h-28 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 group-hover:scale-105 border border-gray-100/50 p-4 flex items-center justify-center">
                                    @if($logo->image)
                                        @if($logo->website_url)
                                            <a href="{{ $logo->website_url }}" target="_blank" class="block w-full h-full">
                                                <img src="{{ asset($logo->image) }}" alt="{{ $logo->partner_name }}" class="w-full h-full object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
                                            </a>
                                        @else
                                            <img src="{{ asset($logo->image) }}" alt="{{ $logo->partner_name }}" class="w-full h-full object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
                                        @endif
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center rounded-xl">
                                            <span class="text-orange-600 text-xs text-center font-medium">{{ $logo->partner_name }}</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Partner Name Tooltip -->
                                <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none">
                                    <div class="bg-gray-800 text-white text-xs px-3 py-1 rounded-lg whitespace-nowrap">
                                        {{ $logo->partner_name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <!-- Duplicate for seamless loop -->
                        @foreach($logos->where('status', 'active')->sortBy('display_order') as $logo)
                        <div class="carousel-item flex-shrink-0 mx-4">
                            <div class="group relative">
                                <!-- Logo Container -->
                                <div class="w-36 h-28 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 group-hover:scale-105 border border-gray-100/50 p-4 flex items-center justify-center">
                                    @if($logo->image)
                                        @if($logo->website_url)
                                            <a href="{{ $logo->website_url }}" target="_blank" class="block w-full h-full">
                                                <img src="{{ asset($logo->image) }}" alt="{{ $logo->partner_name }}" class="w-full h-full object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
                                            </a>
                                        @else
                                            <img src="{{ asset($logo->image) }}" alt="{{ $logo->partner_name }}" class="w-full h-full object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
                                        @endif
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center rounded-xl">
                                            <span class="text-orange-600 text-xs text-center font-medium">{{ $logo->partner_name }}</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Partner Name Tooltip -->
                                <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none">
                                    <div class="bg-gray-800 text-white text-xs px-3 py-1 rounded-lg whitespace-nowrap">
                                        {{ $logo->partner_name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <!-- Partnership CTA -->
            <div class="text-center mt-12">
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">Join our network of partners committed to improving food safety standards across Uganda</p>
                <a href="{{ route('our-work') }}" class="inline-flex items-center bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                    Become a Partner
                </a>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Contact Section -->
<div class="bg-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-12 text-orange-500">Contact Us</h2>
            
            <div class="bg-gray-50 rounded-lg p-8 text-center">
                <h3 class="text-2xl font-bold mb-6 text-gray-800">SECRETARIAT</h3>
                
                <div class="space-y-4">
                    <div class="text-gray-600">
                        <span class="text-lg font-medium">Email: info@foscu.org</span>
                    </div>
                    
                    <div class="text-gray-600">
                        <span class="text-lg font-medium">P.O.Box 154968</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    @keyframes scroll-smooth {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
    }
    
    .animate-scroll-smooth {
        animation: scroll-smooth 20s linear infinite;
        display: flex;
        width: max-content;
        flex-wrap: nowrap;
        will-change: transform;
    }
    
    .animate-scroll-smooth:hover {
        animation-play-state: paused;
    }
    
    /* Ensure smooth scrolling */
    .carousel-container {
        overflow: hidden;
        width: 100%;
        position: relative;
    }
    
    /* Force flex items to not wrap */
    .carousel-track {
        display: flex;
        flex-wrap: nowrap;
        width: fit-content;
    }
    
    /* Ensure minimum width for carousel items */
    .carousel-item {
        flex-shrink: 0;
        width: 160px; /* Fixed width for consistency */
    }
    
    /* Enhanced logo hover effects */
    .group:hover .filter {
        filter: grayscale(0) brightness(1.1) contrast(1.1) !important;
    }
    
    /* Smooth gradient backgrounds */
    .bg-gradient-to-br {
        background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
    }
    
    .bg-gradient-to-r {
        background-image: linear-gradient(to right, var(--tw-gradient-stops));
    }
</style>
@endpush

@push('scripts')
<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<script>
function toggleAccordion(id) {
    const element = document.getElementById(id);
    element.classList.toggle('hidden');
}

document.addEventListener('DOMContentLoaded', function() {
    // Auto-show the first accordion item
    document.getElementById('upcoming').classList.remove('hidden');
    
    // Carousel hover functionality
    const carousel = document.getElementById('partners-carousel');
    
    if (carousel) {
        // Pause animation on hover
        carousel.addEventListener('mouseenter', () => {
            carousel.style.animationPlayState = 'paused';
        });
        
        carousel.addEventListener('mouseleave', () => {
            carousel.style.animationPlayState = 'running';
        });
        
        // Ensure animation starts
        carousel.style.animationPlayState = 'running';
        
        // Optional: Add fallback for browsers that don't support CSS animations
        if (!carousel.style.animationName) {
            // Fallback animation using JavaScript
            let position = 0;
            const speed = 0.5; // pixels per frame
            
            function animate() {
                position -= speed;
                const maxWidth = carousel.scrollWidth / 2;
                
                if (Math.abs(position) >= maxWidth) {
                    position = 0;
                }
                
                carousel.style.transform = `translateX(${position}px)`;
                requestAnimationFrame(animate);
            }
            
            animate();
        }
    }
});
</script>
@endpush
