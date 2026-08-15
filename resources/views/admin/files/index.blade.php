@extends('layouts.admin')

@section('page-title', 'Files')

@section('content')
<div class="space-y-6">
    @if(session('message'))
        <div class="admin-flash-ok">{{ session('message') }}</div>
    @endif
    @if(session('error'))
        <div class="admin-flash-err">{{ session('error') }}</div>
    @endif

    <div>
        <h2 class="text-xl font-semibold text-slate-900">File manager</h2>
        <p class="mt-1 text-sm text-slate-500">Upload documents and keep resource folders in sync.</p>
    </div>

    <div class="admin-card p-6">
        <h3 class="font-semibold text-slate-900">Upload a file</h3>
        <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-2">
            @csrf
            <div>
                <label for="file" class="admin-label">File</label>
                <input type="file" name="file" id="file" required class="admin-file">
                <p class="mt-1 text-xs text-slate-500">The title is taken from the filename. PDF, Excel, PowerPoint, images or ZIP. Max 50MB. Word documents are not accepted.</p>
                @error('file')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="category" class="admin-label">Category</label>
                <select name="category" id="category" class="admin-input">
                    @foreach($categories as $key => $label)
                        <option value="{{ $key }}" @selected(old('category', 'other') === $key)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_public" value="1" class="rounded border-slate-300 text-primary focus:ring-primary" @checked(old('is_public', true))>
                    <span class="ml-2 text-sm text-slate-700">Show on public site (papers / reports / research)</span>
                </label>
            </div>
            <div class="md:col-span-2">
                <button type="submit" class="admin-btn">Upload file</button>
            </div>
        </form>
    </div>

    <div class="admin-card">
        <div class="flex flex-col gap-3 border-b border-slate-100 px-6 py-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h3 class="font-semibold text-slate-900">Available files</h3>
                <p class="mt-1 text-xs text-slate-500">
                    Resource folders are scanned automatically every 2 days.
                    @if(!empty($lastSyncedAt))
                        Last sync: {{ \Illuminate\Support\Carbon::parse($lastSyncedAt)->format('d M Y H:i') }}
                    @else
                        No automatic sync has run yet.
                    @endif
                </p>
            </div>
            <div class="flex items-center gap-2">
                <form method="POST" action="{{ route('admin.files.sync') }}">
                    @csrf
                    <button type="submit" class="admin-btn-secondary">Sync resource folders</button>
                </form>
                <form method="GET">
                    <select name="category" onchange="this.form.submit()" class="rounded border-slate-200 text-sm focus:border-primary focus:ring-primary">
                        <option value="">All categories</option>
                        @foreach($categories as $key => $label)
                            <option value="{{ $key }}" @selected(request('category') === $key)>{{ $label }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Size</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Public</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Added</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($files as $file)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-slate-900">{{ $file->display_title }}</div>
                                <div class="text-xs text-slate-500">{{ $file->display_filename }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $file->extension }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $categories[$file->category] ?? $file->category }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $file->formatted_size }}</td>
                            <td class="px-6 py-4">
                                @if($file->is_public)
                                    <span class="rounded bg-emerald-50 px-2 py-0.5 text-xs font-medium text-emerald-700">Yes</span>
                                @else
                                    <span class="rounded bg-slate-100 px-2 py-0.5 text-xs font-medium text-slate-600">No</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $file->created_at?->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <a href="{{ route('admin.files.edit', $file) }}" class="text-sm font-medium text-slate-700 hover:text-primary">Rename</a>
                                <a href="{{ route('admin.files.download', $file) }}" class="ms-3 text-sm font-medium text-slate-700 hover:text-primary">Download</a>
                                <form method="POST" action="{{ route('admin.files.destroy', $file) }}" class="inline ms-3" onsubmit="return confirm('Delete this file?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-sm text-slate-500">No files found yet. Upload the first one above.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($files->hasPages())
            <div class="border-t border-slate-100 px-6 py-4">{{ $files->links() }}</div>
        @endif
    </div>
</div>
@endsection
