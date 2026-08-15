@extends('layouts.admin')

@section('page-title', 'Edit category')

@section('content')
<div class="mx-auto max-w-2xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Edit event category</h2>
            <p class="mt-1 text-sm text-slate-500">Update {{ $category->name }}.</p>
        </div>
        <a href="{{ route('dashboard.event-photos.index') }}" class="admin-btn-secondary">Back</a>
    </div>

    <div class="admin-card p-6">
        <form action="{{ route('dashboard.event-photos.categories.update', $category->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="grid gap-4 md:grid-cols-2">
                <div>
                    <label for="name" class="admin-label">Category name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required class="admin-input @error('name') border-red-500 @enderror">
                    @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="status" class="admin-label">Status *</label>
                    <select id="status" name="status" required class="admin-input @error('status') border-red-500 @enderror">
                        <option value="active" {{ old('status', $category->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $category->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
            <div>
                <label for="description" class="admin-label">Description</label>
                <textarea id="description" name="description" rows="4" class="admin-input @error('description') border-red-500 @enderror">{{ old('description', $category->description) }}</textarea>
                @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="display_order" class="admin-label">Display order *</label>
                <input type="number" id="display_order" name="display_order" value="{{ old('display_order', $category->display_order) }}" min="0" required class="admin-input @error('display_order') border-red-500 @enderror">
                <p class="mt-1 text-xs text-slate-500">Lower numbers appear first.</p>
                @error('display_order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('dashboard.event-photos.index') }}" class="admin-btn-secondary">Cancel</a>
                <button type="submit" class="admin-btn">Update category</button>
            </div>
        </form>
    </div>
</div>
@endsection
