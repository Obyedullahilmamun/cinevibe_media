<!-- resources/views/videos/index.blade.php -->
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Video Gallery</h1>
        <a href="{{ route('admin-videos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Add Video
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($videos as $video)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/{{ $video->video_path }}" 
                            frameborder="0" 
                            allowfullscreen></iframe>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $video->description }}</h5>
                </div>
                <div class="card-footer bg-white">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('admin-videos.edit', $video->id) }}" 
                           class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit me-1"></i>Edit
                        </a>
                        <form action="{{ route('admin-videos.destroy', $video->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Delete this video?')">
                                <i class="fas fa-trash me-1"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection --}}


@extends('layouts.admin_master')

@section('body')
    <!-- Main Section -->
    <main class="flex-1 overflow-y-auto p-6">
        <!-- Header Actions -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Video Dashboard</h1>
            <a href="{{ route('admin-videos.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                ➕ Add New
            </a>
        </div>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Video Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Video</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($videos as $video)
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $video->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $video->description }}</td>
                            <td class="px-6 py-4">
                                <div class="w-64">
                                    <iframe class="w-full h-32" src="https://www.youtube.com/embed/{{ $video->video_path }}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('admin-videos.edit', $video->id) }}"
                                    class="text-indigo-600 hover:text-indigo-900 mr-4">✏️ Edit</a>

                                <form action="{{ route('admin-videos.destroy', $video->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this video?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">🗑️ Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No videos found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
