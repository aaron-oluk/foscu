@extends('layouts.admin')

@section('page-title', 'Partner Logos Management')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold">Partner Logos Management</h1>
                    <a href="{{ route('admin.logos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Logo
                    </a>
                </div>

                @if(session('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @forelse($logos as $logo)
                        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
                            <div class="aspect-w-16 aspect-h-9 mb-4">
                                @if($logo->image)
                                    <img src="{{ asset('storage/' . $logo->image) }}" alt="{{ $logo->partner_name }}" class="w-full h-32 object-contain bg-gray-50 rounded">
                                @else
                                    <div class="w-full h-32 bg-gray-100 rounded flex items-center justify-center">
                                        <span class="text-gray-400">No Image</span>
                                    </div>
                                @endif
                            </div>
                            
                            <h3 class="font-semibold text-lg mb-2">{{ $logo->partner_name }}</h3>
                            
                            @if($logo->website_url)
                                <p class="text-sm text-gray-600 mb-2">
                                    <a href="{{ $logo->website_url }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                        {{ $logo->website_url }}
                                    </a>
                                </p>
                            @endif
                            
                            <div class="flex justify-between items-center mt-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ $logo->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($logo->status) }}
                                </span>
                                
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.logos.edit', $logo) }}" class="text-indigo-600 hover:text-indigo-900 text-sm">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('admin.logos.destroy', $logo) }}" class="inline" 
                                          onsubmit="return confirm('Are you sure you want to delete this logo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 text-sm">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-8">
                            <p class="text-gray-500">No logos found. <a href="{{ route('admin.logos.create') }}" class="text-blue-600 hover:text-blue-800">Add the first one</a>.</p>
                        </div>
                    @endforelse
                </div>

                @if($logos->hasPages())
                    <div class="mt-6">
                        {{ $logos->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
