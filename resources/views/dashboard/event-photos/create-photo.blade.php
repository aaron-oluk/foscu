@extends('layouts.admin')

@section('page-title', 'Add photo')

@section('content')
<div class="mx-auto max-w-2xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Add photo</h2>
            <p class="mt-1 text-sm text-slate-500">Upload a photo to "{{ $category->name }}".</p>
        </div>
        <a href="{{ route('dashboard.event-photos.index') }}" class="admin-btn-secondary">Back</a>
    </div>

    <div class="admin-card p-6">
        <form action="{{ route('dashboard.event-photos.photos.store', $category->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label for="title" class="admin-label">Photo title *</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required class="admin-input @error('title') border-red-500 @enderror">
                    @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="status" class="admin-label">Status *</label>
                    <select id="status" name="status" required class="admin-input @error('status') border-red-500 @enderror">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label for="description" class="admin-label">Description</label>
                <textarea id="description" name="description" rows="3" class="admin-input @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="image" class="admin-label">Photo image *</label>
                <input type="file" id="image" name="image" accept="image/*" required class="admin-file @error('image') border-red-500 @enderror">
                <p class="mt-1 text-xs text-slate-500">Maximum 2MB. JPEG, PNG, JPG, or GIF.</p>
                @error('image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="alt_text" class="admin-label">Alt text</label>
                <input type="text" id="alt_text" name="alt_text" value="{{ old('alt_text') }}" class="admin-input @error('alt_text') border-red-500 @enderror">
                <p class="mt-1 text-xs text-slate-500">Alternative text for accessibility.</p>
                @error('alt_text')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="display_order" class="admin-label">Display order *</label>
                <input type="number" id="display_order" name="display_order" value="{{ old('display_order', 0) }}" min="0" required class="admin-input @error('display_order') border-red-500 @enderror">
                <p class="mt-1 text-xs text-slate-500">Lower numbers appear first.</p>
                @error('display_order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('dashboard.event-photos.index') }}" class="admin-btn-secondary">Cancel</a>
                <button type="submit" class="admin-btn">Upload photo</button>
            </div>
        </form>
    </div>
</div>
@endsection
