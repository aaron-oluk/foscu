@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-96 bg-cover bg-center" style="background-image: url('{{ asset('posters/Poster5.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-4">Audio Resources</h1>
            <p class="text-xl">Audio resources and radio programs on food safety awareness in multiple languages</p>
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

        <!-- Role of Consumers in Food Safety -->
        <div class="mb-12">
            <h2 class="text-2xl font-semibold mb-6 text-primary">Role of Consumers in Food Safety</h2>
            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-5">
                    <button onclick="toggleAudio(this, 'consumer-en')" class="flex-shrink-0 w-14 h-14 rounded-full bg-primary hover:bg-orange-600 text-white flex items-center justify-center transition-colors duration-200">
                        <i class="fas fa-play text-lg play-icon"></i>
                    </button>
                    <audio id="consumer-en" src="{{ asset('audio-files/Consumers/Audio_English_food_safety_hazards_CONSUMER_ROLE.mp3') }}" preload="none"></audio>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">English</h3>
                        <p class="text-gray-600 text-sm">Food safety hazards and consumer role</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-5">
                    <button onclick="toggleAudio(this, 'consumer-lg')" class="flex-shrink-0 w-14 h-14 rounded-full bg-primary hover:bg-orange-600 text-white flex items-center justify-center transition-colors duration-200">
                        <i class="fas fa-play text-lg play-icon"></i>
                    </button>
                    <audio id="consumer-lg" src="{{ asset('audio-files/Consumers/Audio_luganda_food_safety_hazards_CONSUMER_ROLE.mp3') }}" preload="none"></audio>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Luganda</h3>
                        <p class="text-gray-600 text-sm">Food safety hazards and consumer role</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-5">
                    <button onclick="toggleAudio(this, 'consumer-lm')" class="flex-shrink-0 w-14 h-14 rounded-full bg-primary hover:bg-orange-600 text-white flex items-center justify-center transition-colors duration-200">
                        <i class="fas fa-play text-lg play-icon"></i>
                    </button>
                    <audio id="consumer-lm" src="{{ asset('audio-files/Consumers/Audio_Lumasaba_food_safety_hazards_CONSUMER_ROLE.mp3') }}" preload="none"></audio>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Lumasaba</h3>
                        <p class="text-gray-600 text-sm">Food safety hazards and consumer role</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-5">
                    <button onclick="toggleAudio(this, 'consumer-ry')" class="flex-shrink-0 w-14 h-14 rounded-full bg-primary hover:bg-orange-600 text-white flex items-center justify-center transition-colors duration-200">
                        <i class="fas fa-play text-lg play-icon"></i>
                    </button>
                    <audio id="consumer-ry" src="{{ asset('audio-files/Consumers/Audio_Runyoro_food_safety_hazards_CONSUMER_ROLE.mp3') }}" preload="none"></audio>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Runyoro</h3>
                        <p class="text-gray-600 text-sm">Food safety hazards and consumer role</p>
                    </div>
                </div>

            </div>
        </div>

        <!-- Role of Farmers in Food Safety -->
        <div>
            <h2 class="text-2xl font-semibold mb-6 text-primary">Role of Farmers in Food Safety</h2>
            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-5">
                    <button onclick="toggleAudio(this, 'farmer-en')" class="flex-shrink-0 w-14 h-14 rounded-full bg-primary hover:bg-orange-600 text-white flex items-center justify-center transition-colors duration-200">
                        <i class="fas fa-play text-lg play-icon"></i>
                    </button>
                    <audio id="farmer-en" src="{{ asset('audio-files/Farmers/Audio_English_Chemical_food_contamination_FARMER_ROLE.mp3') }}" preload="none"></audio>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">English</h3>
                        <p class="text-gray-600 text-sm">Chemical food contamination and farmer role</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-5">
                    <button onclick="toggleAudio(this, 'farmer-lg')" class="flex-shrink-0 w-14 h-14 rounded-full bg-primary hover:bg-orange-600 text-white flex items-center justify-center transition-colors duration-200">
                        <i class="fas fa-play text-lg play-icon"></i>
                    </button>
                    <audio id="farmer-lg" src="{{ asset('audio-files/Farmers/Audio_luganda_Chemical_food_contamination_FARMER_ROLE.mp3') }}" preload="none"></audio>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Luganda</h3>
                        <p class="text-gray-600 text-sm">Chemical food contamination and farmer role</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-5">
                    <button onclick="toggleAudio(this, 'farmer-lm')" class="flex-shrink-0 w-14 h-14 rounded-full bg-primary hover:bg-orange-600 text-white flex items-center justify-center transition-colors duration-200">
                        <i class="fas fa-play text-lg play-icon"></i>
                    </button>
                    <audio id="farmer-lm" src="{{ asset('audio-files/Farmers/Audio_lumasaba_Chemical_food_contamination_FARMER_ROLE.mp3') }}" preload="none"></audio>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Lumasaba</h3>
                        <p class="text-gray-600 text-sm">Chemical food contamination and farmer role</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 flex items-center gap-5">
                    <button onclick="toggleAudio(this, 'farmer-ry')" class="flex-shrink-0 w-14 h-14 rounded-full bg-primary hover:bg-orange-600 text-white flex items-center justify-center transition-colors duration-200">
                        <i class="fas fa-play text-lg play-icon"></i>
                    </button>
                    <audio id="farmer-ry" src="{{ asset('audio-files/Farmers/Audio_Runyoro_Chemical_food_contamination_FARMER_ROLE.mp3') }}" preload="none"></audio>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">Runyoro</h3>
                        <p class="text-gray-600 text-sm">Chemical food contamination and farmer role</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    let currentAudio = null;
    let currentBtn = null;

    function toggleAudio(btn, id) {
        const audio = document.getElementById(id);
        const icon = btn.querySelector('.play-icon');

        if (currentAudio && currentAudio !== audio) {
            currentAudio.pause();
            currentAudio.currentTime = 0;
            currentBtn.querySelector('.play-icon').classList.replace('fa-pause', 'fa-play');
        }

        if (audio.paused) {
            audio.play();
            icon.classList.replace('fa-play', 'fa-pause');
            currentAudio = audio;
            currentBtn = btn;
        } else {
            audio.pause();
            icon.classList.replace('fa-pause', 'fa-play');
            currentAudio = null;
            currentBtn = null;
        }

        audio.addEventListener('ended', () => {
            icon.classList.replace('fa-pause', 'fa-play');
            currentAudio = null;
            currentBtn = null;
        }, { once: true });
    }
</script>
@endsection
