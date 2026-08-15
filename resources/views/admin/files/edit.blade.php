@extends('layouts.admin')

@section('page-title', 'Rename file')

@section('content')
<div class="mx-auto max-w-2xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Rename file</h2>
            <p class="mt-1 text-sm text-slate-500">Change the title and download name. The file on disk stays in place.</p>
        </div>
        <a href="{{ route('admin.files.index') }}" class="admin-btn-secondary">Back</a>
    </div>

    <div class="admin-card p-6">
        <form method="POST" action="{{ route('admin.files.update', $file) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="admin-label">Display title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $file->display_title) }}" required class="admin-input">
                @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="original_filename" class="admin-label">Download name</label>
                <input type="text" name="original_filename" id="original_filename" value="{{ old('original_filename', $file->download_name) }}" required class="admin-input">
                <p class="mt-1 text-xs text-slate-500">This is the filename people get when they download the file.</p>
                @error('original_filename')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="category" class="admin-label">Category</label>
                <select name="category" id="category" class="admin-input">
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}" @selected(old('category', $file->category) === $key)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_public" value="1" class="rounded border-slate-300 text-primary focus:ring-primary" @checked(old('is_public', $file->is_public))>
                    <span class="ml-2 text-sm text-slate-700">Show on public site (papers / reports / research)</span>
                </label>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.files.index') }}" class="admin-btn-secondary">Cancel</a>
                <button type="submit" class="admin-btn">Save name</button>
            </div>
        </form>
    </div>
</div>
@endsection
