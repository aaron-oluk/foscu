@extends('layouts.admin')

@section('page-title', 'Edit event')

@section('content')
<div class="mx-auto max-w-2xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Edit event</h2>
            <p class="mt-1 text-sm text-slate-500">Update details for {{ $event->eventname }}.</p>
        </div>
        <a href="{{ route('admin.events.index') }}" class="admin-btn-secondary">Back</a>
    </div>

    <div class="admin-card p-6">
        <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="admin-label">Event name</label>
                <input type="text" name="eventname" id="title" value="{{ old('eventname', $event->eventname) }}" class="admin-input" required>
                @error('eventname')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="description" class="admin-label">Description</label>
                <textarea name="description" id="description" rows="4" class="admin-input">{{ old('description', $event->description) }}</textarea>
                @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="event_date" class="admin-label">Event date</label>
                <input type="date" name="eventdate" id="event_date" value="{{ old('eventdate', $event->eventdate ? $event->eventdate->format('Y-m-d') : '') }}" class="admin-input" required>
                @error('eventdate')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="end_date" class="admin-label">End date</label>
                <input type="date" name="enddate" id="end_date" value="{{ old('enddate', $event->enddate ? $event->enddate->format('Y-m-d') : '') }}" class="admin-input" required>
                @error('enddate')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="event_time" class="admin-label">Event time</label>
                <input type="time" name="event_time" id="event_time" value="{{ old('event_time', $event->event_time) }}" class="admin-input">
                @error('event_time')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="location" class="admin-label">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location', $event->location) }}" class="admin-input">
                @error('location')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="image" class="admin-label">Event image</label>
                @if($event->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Current image" class="h-32 w-32 rounded object-cover">
                        <p class="mt-1 text-xs text-slate-500">Current image</p>
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*" class="admin-file">
                <p class="mt-1 text-xs text-slate-500">Leave empty to keep the current image.</p>
                @error('image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="status" class="admin-label">Status</label>
                <select name="status" id="status" class="admin-input">
                    <option value="upcoming" {{ old('status', $event->status) === 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                    <option value="ongoing" {{ old('status', $event->status) === 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ old('status', $event->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="pt-2">
                <button type="submit" class="admin-btn">Update event</button>
            </div>
        </form>
    </div>
</div>
@endsection
