@extends('layouts.admin')

@section('page-title', 'Backups')

@section('content')
<div class="space-y-6">
    @if(session('message'))
        <div class="admin-flash-ok">{{ session('message') }}</div>
    @endif
    @if(session('error'))
        <div class="admin-flash-err">{{ session('error') }}</div>
    @endif

    <div class="admin-card p-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-xl font-semibold text-slate-900">System backup</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Creates a ZIP of the application (code, uploads, and a database dump when available).
                    Vendor, node_modules, and previous backups are excluded.
                </p>
            </div>
            <form method="POST" action="{{ route('admin.backups.store') }}">
                @csrf
                <button type="submit" class="admin-btn"
                        onclick="this.disabled=true; this.form.submit(); this.innerText='Creating backup…';">
                    Create backup
                </button>
            </form>
        </div>
    </div>

    <div class="admin-card">
        <div class="border-b border-slate-100 px-6 py-4">
            <h3 class="font-semibold text-slate-900">Backup history</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">File</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Size</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Created</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">By</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($backups as $backup)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-slate-900">{{ $backup->filename }}</div>
                                @if($backup->notes)
                                    <div class="mt-1 text-xs text-slate-500">{{ $backup->notes }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ ucfirst($backup->type) }}</td>
                            <td class="px-6 py-4">
                                @if($backup->status === 'completed')
                                    <span class="rounded bg-emerald-50 px-2 py-0.5 text-xs font-medium text-emerald-700">Completed</span>
                                @elseif($backup->status === 'failed')
                                    <span class="rounded bg-red-50 px-2 py-0.5 text-xs font-medium text-red-700">Failed</span>
                                @else
                                    <span class="rounded bg-amber-50 px-2 py-0.5 text-xs font-medium text-amber-700">Pending</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $backup->formatted_size }}</td>
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $backup->created_at?->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $backup->creator?->name ?? '—' }}</td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                @if($backup->status === 'completed')
                                    <a href="{{ route('admin.backups.download', $backup) }}" class="text-sm font-medium text-slate-700 hover:text-primary">Download</a>
                                @endif
                                <form method="POST" action="{{ route('admin.backups.destroy', $backup) }}" class="inline ms-3" onsubmit="return confirm('Delete this backup?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-sm text-slate-500">No backups yet. Create the first one above.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($backups->hasPages())
            <div class="border-t border-slate-100 px-6 py-4">{{ $backups->links() }}</div>
        @endif
    </div>
</div>
@endsection
