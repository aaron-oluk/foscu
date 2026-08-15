@extends('layouts.admin')

@section('page-title', 'Events')

@section('content')
<div class="space-y-6">
    @if(session('message'))
        <div class="admin-flash-ok">{{ session('message') }}</div>
    @endif

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Event management</h2>
            <p class="mt-1 text-sm text-slate-500">Upcoming and recent events shown on the public site.</p>
        </div>
        <a href="{{ route('admin.events.create') }}" class="admin-btn">Add event</a>
    </div>

    <div class="admin-card">
        <div class="border-b border-slate-100 px-6 py-4">
            <h3 class="font-semibold text-slate-900">Upcoming events</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Event</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Start</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">End</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($events as $event)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $event->eventname }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $event->formatted_event_date }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $event->formatted_end_date }}</td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="text-sm font-medium text-slate-700 hover:text-primary">Edit</a>
                                <form method="POST" action="{{ route('admin.events.destroy', $event->id) }}" class="inline ms-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-sm text-slate-500">No upcoming events found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($events->hasPages())
            <div class="border-t border-slate-100 px-6 py-4">{{ $events->links() }}</div>
        @endif
    </div>

    <div class="admin-card">
        <div class="border-b border-slate-100 px-6 py-4">
            <h3 class="font-semibold text-slate-900">Recent events</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Event</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Date</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($recentEvents as $event)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $event->eventname }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $event->formatted_event_date }}</td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <form method="POST" action="{{ route('admin.events.recent.destroy', $event->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-sm text-slate-500">No recent events found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($recentEvents->hasPages())
            <div class="border-t border-slate-100 px-6 py-4">{{ $recentEvents->links() }}</div>
        @endif
    </div>
</div>
@endsection
