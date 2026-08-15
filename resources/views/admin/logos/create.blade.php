@extends('layouts.admin')

@section('page-title', 'Add logo')

@section('content')
<div class="mx-auto max-w-2xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Add partner logo</h2>
            <p class="mt-1 text-sm text-slate-500">Shown on the public homepage carousel.</p>
        </div>
        <a href="{{ route('admin.logos.index') }}" class="admin-btn-secondary">Back</a>
    </div>

    <div class="admin-card p-6">
        <form action="{{ route('admin.logos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="partner_name" class="admin-label">Partner name</label>
                <input type="text" name="partner_name" id="partner_name" value="{{ old('partner_name') }}" class="admin-input" required>
                @error('partner_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="website_url" class="admin-label">Website URL (optional)</label>
                <input type="url" name="website_url" id="website_url" value="{{ old('website_url') }}" class="admin-input" placeholder="https://example.com">
                @error('website_url')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="image" class="admin-label">Logo image</label>
                <input type="file" name="image" id="image" accept="image/*" class="admin-file" required>
                <p class="mt-1 text-xs text-slate-500">PNG, JPG, or SVG. Max 2MB.</p>
                @error('image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="status" class="admin-label">Status</label>
                <select name="status" id="status" class="admin-input">
                    <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="display_order" class="admin-label">Display order</label>
                <input type="number" name="display_order" id="display_order" value="{{ old('display_order', 0) }}" class="admin-input" min="0">
                <p class="mt-1 text-xs text-slate-500">Lower numbers display first.</p>
                @error('display_order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div class="pt-2">
                <button type="submit" class="admin-btn">Add logo</button>
            </div>
        </form>
    </div>
</div>
@endsection
