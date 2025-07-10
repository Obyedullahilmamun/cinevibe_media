@extends('layouts.admin_master')
@section('body')
    <!-- Main Section -->
    <main class="flex-1 overflow-y-auto p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-gray-700 text-lg font-semibold mb-2">Total Users</h2>
                <p class="text-2xl font-bold text-blue-600">1,024</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-gray-700 text-lg font-semibold mb-2">New Orders</h2>
                <p class="text-2xl font-bold text-green-600">245</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-gray-700 text-lg font-semibold mb-2">Pending Tasks</h2>
                <p class="text-2xl font-bold text-red-600">7</p>
            </div>
        </div>

        <div class="mt-8 bg-white p-6 rounded-lg shadow text-gray-800 text-lg">
            You're logged in! Welcome to your dashboard.
        </div>
    </main>
@endsection
