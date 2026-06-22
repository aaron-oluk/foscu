@extends('layouts.admin')

@section('page-title')
    @yield('title', 'Dashboard')
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @yield('content')
    </div>
</div>
@endsection
