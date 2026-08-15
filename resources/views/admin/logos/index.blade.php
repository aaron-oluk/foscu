@extends('layouts.admin')

@section('page-title', 'Partner logos')

@section('content')
<div class="space-y-6">
    @if(session('message'))
        <div class="admin-flash-ok">{{ session('message') }}</div>
    @endif

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Partner logos</h2>
            <p class="mt-1 text-sm text-slate-500">Logos displayed on the public site.</p>
        </div>
        <a href="{{ route('admin.logos.create') }}" class="admin-btn">Add logo</a>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @forelse($logos as $logo)
            <div class="admin-card p-4">
                @if($logo->image)
                    <img src="{{ $logo->image_url }}" alt="{{ $logo->partner_name }}" class="h-32 w-full rounded bg-slate-50 object-contain">
                @else
                    <div class="flex h-32 items-center justify-center rounded bg-slate-50 text-sm text-slate-400">No image</div>
                @endif

                <h3 class="mt-3 font-semibold text-slate-900">{{ $logo->partner_name }}</h3>
                @if($logo->website_url)
                    <a href="{{ $logo->website_url }}" target="_blank" class="mt-1 block truncate text-sm text-primary hover:text-orange-600">{{ $logo->website_url }}</a>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <span class="rounded px-2 py-0.5 text-xs font-medium {{ $logo->status === 'active' ? 'bg-emerald-50 text-emerald-700' : 'bg-red-50 text-red-700' }}">
                        {{ ucfirst($logo->status) }}
                    </span>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.logos.edit', $logo) }}" class="text-sm font-medium text-slate-700 hover:text-primary">Edit</a>
                        <form method="POST" action="{{ route('admin.logos.destroy', $logo) }}" class="inline" onsubmit="return confirm('Are you sure you want to delete this logo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="admin-card col-span-full px-6 py-10 text-center text-sm text-slate-500">
                No logos found. <a href="{{ route('admin.logos.create') }}" class="font-medium text-primary">Add the first one</a>.
            </div>
        @endforelse
    </div>

    @if($logos->hasPages())
        <div>{{ $logos->links() }}</div>
    @endif
</div>
@endsection
