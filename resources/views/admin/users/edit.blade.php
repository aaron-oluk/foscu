@extends('layouts.admin')

@section('page-title', 'Edit user')

@section('content')
<div class="mx-auto max-w-xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Edit user</h2>
            <p class="mt-1 text-sm text-slate-500">Update account details for {{ $user->name }}.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-slate-600 hover:text-primary">Back</a>
    </div>

    <div class="admin-card p-6">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="admin-label">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required class="admin-input">
                @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="email" class="admin-label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required class="admin-input">
                @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="password" class="admin-label">New password</label>
                <input type="password" name="password" id="password" class="admin-input">
                <p class="mt-1 text-xs text-slate-500">Leave blank to keep the current password.</p>
                @error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="password_confirmation" class="admin-label">Confirm new password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="admin-input">
            </div>
            <div class="pt-2">
                <button type="submit" class="admin-btn w-full">Save changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
