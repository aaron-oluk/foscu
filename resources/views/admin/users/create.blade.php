@extends('layouts.admin')

@section('page-title', 'Add user')

@section('content')
<div class="mx-auto max-w-xl space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-semibold text-slate-900">Add user</h2>
            <p class="mt-1 text-sm text-slate-500">Create a new dashboard account.</p>
        </div>
        <a href="{{ route('admin.users.index') }}" class="text-sm font-medium text-slate-600 hover:text-primary">Back</a>
    </div>

    <div class="admin-card p-6">
        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="admin-label">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="admin-input">
                @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="email" class="admin-label">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="admin-input">
                @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="password" class="admin-label">Password</label>
                <input type="password" name="password" id="password" required class="admin-input">
                @error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>
            <div>
                <label for="password_confirmation" class="admin-label">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="admin-input">
            </div>
            <div class="pt-2">
                <button type="submit" class="admin-btn w-full">Create user</button>
            </div>
        </form>
    </div>
</div>
@endsection
