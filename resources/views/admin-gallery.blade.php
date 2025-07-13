@extends('layouts.admin_master')

@section('body')
    <!-- Main Section -->
    <main class="flex-1 overflow-y-auto p-6">
        <!-- Header Actions -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Gallery Dashboard</h1>
            <a href="{{ route('admin-gallery.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                ➕ Add New
            </a>
        </div>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Gallery Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($galleries as $gallery)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $gallery->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $gallery->description }}</td>
                            <td class="px-6 py-4">
                                <img src="{{ asset($gallery->image_path) }}" alt="…" class="h-32 w-32 object-cover">
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('admin-gallery.edit', $gallery->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900 mr-4">✏️ Edit</a>

                                <form action="{{ route('admin-gallery.destroy', $gallery->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">🗑️ Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No gallery items found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
