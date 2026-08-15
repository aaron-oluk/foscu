@extends('layouts.admin')

@section('page-title', 'Users')

@section('content')
<div class="space-y-6">
    @if(session('message'))
        <div class="admin-flash-ok">{{ session('message') }}</div>
    @endif
    @if(session('error'))
        <div class="admin-flash-err">{{ session('error') }}</div>
    @endif

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">User management</h2>
            <p class="mt-1 text-sm text-slate-500">Create, update, and remove dashboard accounts.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="admin-btn">Add user</a>
    </div>

    <div class="admin-card">
        <div class="border-b border-slate-100 px-6 py-4">
            <form method="GET" class="max-w-sm">
                <input type="search" name="q" value="{{ request('q') }}" placeholder="Search name or email"
                       class="w-full rounded border-slate-200 text-sm focus:border-primary focus:ring-primary">
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-100">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">User</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">Joined</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($users as $user)
                        <tr class="hover:bg-slate-50/80">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 items-center justify-center rounded bg-orange-100 text-sm font-semibold text-orange-700">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900">{{ $user->name }}</div>
                                        @if($user->id === auth()->id())
                                            <div class="text-xs text-orange-600">You</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $user->created_at?->format('d M Y') }}</td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <a href="{{ route('admin.users.edit', $user) }}" class="text-sm font-medium text-slate-700 hover:text-primary">Edit</a>
                                @if($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline ms-3" onsubmit="return confirm('Delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-sm text-slate-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($users->hasPages())
            <div class="border-t border-slate-100 px-6 py-4">{{ $users->links() }}</div>
        @endif
    </div>
</div>
@endsection
