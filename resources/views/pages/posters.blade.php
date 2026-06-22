@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<div class="relative h-96 bg-cover bg-center" style="background-image: url('{{ asset('images/edu2.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4">
            <h1 class="text-5xl font-bold mb-4">Posters</h1>
            <p class="text-xl">Visual educational materials and campaign posters for food safety awareness</p>
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
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @for($i = 1; $i <= 22; $i++)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="aspect-[3/4]">
                    <img 
                        src="{{ asset('posters/Poster' . $i . '.jpg') }}" 
                        alt="Food Safety Poster {{ $i }}"
                        class="w-full h-full object-cover cursor-pointer"
                        onclick="openPosterModal('{{ asset('posters/Poster' . $i . '.jpg') }}', 'Food Safety Poster {{ $i }}')"
                    >
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2 text-gray-800">Food Safety Poster {{ $i }}</h3>
                    <button 
                        onclick="openPosterModal('{{ asset('posters/Poster' . $i . '.jpg') }}', 'Food Safety Poster {{ $i }}')"
                        class="bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded inline-flex items-center transition-colors"
                    >
                        <i class="fas fa-expand mr-2"></i>
                        View Full Size
                    </button>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<!-- Modal for viewing full-size posters -->
<div id="posterModal" class="fixed inset-0 bg-black bg-opacity-75 z-50 hidden items-center justify-center p-4">
    <div class="relative max-w-4xl max-h-full">
        <button 
            onclick="closePosterModal()" 
            class="absolute top-4 right-4 text-white bg-black bg-opacity-50 rounded-full p-2 hover:bg-opacity-75 z-10"
        >
            <i class="fas fa-times text-xl"></i>
        </button>
        <img id="modalPosterImage" src="" alt="" class="max-w-full max-h-full object-contain">
    </div>
</div>

<script>
function openPosterModal(imageSrc, altText) {
    const modal = document.getElementById('posterModal');
    const modalImage = document.getElementById('modalPosterImage');
    
    modalImage.src = imageSrc;
    modalImage.alt = altText;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
}

function closePosterModal() {
    const modal = document.getElementById('posterModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside the image
document.getElementById('posterModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closePosterModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closePosterModal();
    }
});
</script>
@endsection
