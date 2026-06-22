@extends('layouts.admin')

@section('page-title', 'Add New Event')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold">Add New Event</h1>
                    <a href="{{ route('admin.events.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Back to Events
                    </a>
                </div>

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Upcoming Events Form -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-4">Add Upcoming Event</h2>
                        <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="upcoming">
                            
                            <div class="mb-4">
                                <label for="eventname_upcoming" class="block text-sm font-medium text-gray-700 mb-2">Event Name</label>
                                <input 
                                    type="text" 
                                    id="eventname_upcoming" 
                                    name="eventname" 
                                    value="{{ old('eventname') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required
                                >
                            </div>

                            <div class="mb-4">
                                <label for="description_upcoming" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                                <textarea 
                                    id="description_upcoming" 
                                    name="description" 
                                    rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >{{ old('description') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="eventdate_upcoming" class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                                <input 
                                    type="date" 
                                    id="eventdate_upcoming" 
                                    name="eventdate" 
                                    value="{{ old('eventdate') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required
                                >
                            </div>

                            <div class="mb-4">
                                <label for="enddate" class="block text-sm font-medium text-gray-700 mb-2">End Date</label>
                                <input 
                                    type="date" 
                                    id="enddate" 
                                    name="enddate" 
                                    value="{{ old('enddate') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required
                                >
                            </div>

                            <div class="mb-4">
                                <label for="event_time_upcoming" class="block text-sm font-medium text-gray-700 mb-2">Event Time</label>
                                <input 
                                    type="time" 
                                    id="event_time_upcoming" 
                                    name="event_time" 
                                    value="{{ old('event_time') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                            </div>

                            <div class="mb-4">
                                <label for="location_upcoming" class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                                <input 
                                    type="text" 
                                    id="location_upcoming" 
                                    name="location" 
                                    value="{{ old('location') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                            </div>

                            <div class="mb-4">
                                <label for="image_upcoming" class="block text-sm font-medium text-gray-700 mb-2">Event Image</label>
                                <input 
                                    type="file" 
                                    id="image_upcoming" 
                                    name="image" 
                                    accept="image/*"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                            </div>

                            <div class="mb-6">
                                <label for="status_upcoming" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select 
                                    id="status_upcoming" 
                                    name="status" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                                    <option value="upcoming" {{ old('status', 'upcoming') === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                    <option value="ongoing" {{ old('status') === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                    <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add Upcoming Event
                            </button>
                        </form>
                    </div>

                    <!-- Recent Events Form -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h2 class="text-xl font-semibold mb-4">Add Recent Event</h2>
                        <form method="POST" action="{{ route('admin.events.store') }}">
                            @csrf
                            <input type="hidden" name="type" value="recent">
                            
                            <div class="mb-4">
                                <label for="eventname_recent" class="block text-sm font-medium text-gray-700 mb-2">Event Name</label>
                                <input 
                                    type="text" 
                                    id="eventname_recent" 
                                    name="eventname" 
                                    value="{{ old('eventname') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required
                                >
                            </div>

                            <div class="mb-6">
                                <label for="eventdate_recent" class="block text-sm font-medium text-gray-700 mb-2">Event Date</label>
                                <input 
                                    type="date" 
                                    id="eventdate_recent" 
                                    name="eventdate" 
                                    value="{{ old('eventdate') }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    required
                                >
                            </div>

                            <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Add Recent Event
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
