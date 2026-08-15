@extends('layouts.admin')

@section('page-title', 'Add event')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Add event</h2>
            <p class="mt-1 text-sm text-slate-500">Create an upcoming or recent event.</p>
        </div>
        <a href="{{ route('admin.events.index') }}" class="admin-btn-secondary">Back</a>
    </div>

    @if($errors->any())
        <div class="admin-flash-err">
            <ul class="list-disc ps-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid gap-6 md:grid-cols-2">
        <div class="admin-card p-6">
            <h3 class="font-semibold text-slate-900">Upcoming event</h3>
            <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data" class="mt-4 space-y-4">
                @csrf
                <input type="hidden" name="type" value="upcoming">

                <div>
                    <label for="eventname_upcoming" class="admin-label">Event name</label>
                    <input type="text" id="eventname_upcoming" name="eventname" value="{{ old('eventname') }}" class="admin-input" required>
                </div>
                <div>
                    <label for="description_upcoming" class="admin-label">Description</label>
                    <textarea id="description_upcoming" name="description" rows="3" class="admin-input">{{ old('description') }}</textarea>
                </div>
                <div>
                    <label for="eventdate_upcoming" class="admin-label">Start date</label>
                    <input type="date" id="eventdate_upcoming" name="eventdate" value="{{ old('eventdate') }}" class="admin-input" required>
                </div>
                <div>
                    <label for="enddate" class="admin-label">End date</label>
                    <input type="date" id="enddate" name="enddate" value="{{ old('enddate') }}" class="admin-input" required>
                </div>
                <div>
                    <label for="event_time_upcoming" class="admin-label">Event time</label>
                    <input type="time" id="event_time_upcoming" name="event_time" value="{{ old('event_time') }}" class="admin-input">
                </div>
                <div>
                    <label for="location_upcoming" class="admin-label">Location</label>
                    <input type="text" id="location_upcoming" name="location" value="{{ old('location') }}" class="admin-input">
                </div>
                <div>
                    <label for="image_upcoming" class="admin-label">Event image</label>
                    <input type="file" id="image_upcoming" name="image" accept="image/*" class="admin-file">
                </div>
                <div>
                    <label for="status_upcoming" class="admin-label">Status</label>
                    <select id="status_upcoming" name="status" class="admin-input">
                        <option value="upcoming" {{ old('status', 'upcoming') === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="ongoing" {{ old('status') === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <button type="submit" class="admin-btn w-full">Add upcoming event</button>
            </form>
        </div>

        <div class="admin-card p-6">
            <h3 class="font-semibold text-slate-900">Recent event</h3>
            <form method="POST" action="{{ route('admin.events.store') }}" class="mt-4 space-y-4">
                @csrf
                <input type="hidden" name="type" value="recent">

                <div>
                    <label for="eventname_recent" class="admin-label">Event name</label>
                    <input type="text" id="eventname_recent" name="eventname" value="{{ old('eventname') }}" class="admin-input" required>
                </div>
                <div>
                    <label for="eventdate_recent" class="admin-label">Event date</label>
                    <input type="date" id="eventdate_recent" name="eventdate" value="{{ old('eventdate') }}" class="admin-input" required>
                </div>
                <button type="submit" class="admin-btn w-full">Add recent event</button>
            </form>
        </div>
    </div>
</div>
@endsection
