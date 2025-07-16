@extends('layouts.admin_master')

@section('body')
    <div class="min-h-screen bg-gray-50 flex flex-col">
        <!-- Navbar for Small Devices -->
        <nav class="w-full flex items-center justify-end px-4 py-3 md:hidden">
            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="focus:outline-none">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden flex-col bg-white shadow-md border rounded-md mx-4 mt-2 md:hidden">
            <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Dashboard</a>
            <a href="{{ url('/admin-gallery') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Gallery</a>
            <a href="{{ url('/admin-videos') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Videos</a>
            <a href="{{ url('/admin-contact') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Contacts</a>
        </div>

        <!-- Dashboard Content -->
        <div class="p-4 md:p-6 flex-1">
            <h1 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-6 text-center md:text-left">Quick Overview</h1>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Gallery -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition">
                    <h2 class="text-gray-600 text-sm font-semibold mb-1 uppercase tracking-wide">Total Gallery</h2>
                    <p class="text-2xl md:text-3xl font-bold text-blue-600">{{ $totalGallery }}</p>
                </div>

                <!-- Total Videos -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition">
                    <h2 class="text-gray-600 text-sm font-semibold mb-1 uppercase tracking-wide">Total Videos</h2>
                    <p class="text-2xl md:text-3xl font-bold text-blue-600">{{ $totalVideos }}</p>
                </div>

                <!-- Total Contact Submissions -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition">
                    <h2 class="text-gray-600 text-sm font-semibold mb-1 uppercase tracking-wide">Total Contact Submissions
                    </h2>
                    <p class="text-2xl md:text-3xl font-bold text-blue-600">{{ $totalMessages }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
@endsection


{{-- @extends('layouts.admin_master')
@section('body')
    <div class="p-6 bg-gray-50 min-h-screen">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Quick Overview</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Total Gallery -->
            <div
                class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300 ease-in-out">
                <h2 class="text-gray-600 text-base font-semibold mb-1 uppercase tracking-wide">Total Gallery</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $totalGallery }}</p>
            </div>

            <!-- Total Videos -->
            <div
                class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300 ease-in-out">
                <h2 class="text-gray-600 text-base font-semibold mb-1 uppercase tracking-wide">Total Videos</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $totalVideos }}</p>
            </div>

            <!-- Total Form Messages -->
            <div
                class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition duration-300 ease-in-out">
                <h2 class="text-gray-600 text-base font-semibold mb-1 uppercase tracking-wide">Total Contact Submissions
                </h2>
                <p class="text-3xl font-bold text-blue-600">{{ $totalMessages }}</p>
            </div>
        </div>
    </div>
@endsection --}}
