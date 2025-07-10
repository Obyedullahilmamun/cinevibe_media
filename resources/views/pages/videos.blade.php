{{-- @extends('layouts.admin_master')

@section('body')
    <h1 class="text-2xl font-bold text-gray-800 mb-4">🎬 Videos Dashboard</h1>
    <a href="{{ route('videos.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded">+ Add New
        Video</a>

    @if (session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full text-left border border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Description</th>
                <th class="p-2 border">Image</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td class="p-2 border">{{ $post->id }}</td>
                    <td class="p-2 border">{{ $post->name }}</td>
                    <td class="p-2 border">{{ $post->description }}</td>
                    <td class="p-2 border">
                        @if ($post->image)
                            <img src="{{ asset('images/' . $post->image) }}" alt="" width="60">
                        @else
                            No image
                        @endif
                    </td>
                    <td class="p-2 border">
                        <a href="{{ route('videos.edit', $post->id) }}" class="text-blue-500">✏️ Edit</a> |
                        <a href="{{ route('videos.delete', $post->id) }}" class="text-red-500"
                            onclick="return confirm('Are you sure?')">🗑 Delete</a> |
                        <a href="{{ route('videos.show', $post->id) }}" class="text-green-500">👁 View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center">No videos found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@endsection --}}






@extends('layouts.admin_master')

@section('body')
    <h1 class="text-2xl font-bold text-gray-800 mb-4">🎬 Videos Dashboard</h1>
    <a href="{{ route('videos.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded">+ Add New
        Video</a>

    @if (session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full text-left border border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 border">#</th>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Description</th>
                <th class="p-2 border">Image</th>
                <th class="p-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td class="p-2 border">{{ $post->id }}</td>
                    <td class="p-2 border">{{ $post->name }}</td>
                    <td class="p-2 border">{{ $post->description }}</td>
                    <td class="p-2 border">
                        @if ($post->image)
                            <img src="{{ asset('images/' . $post->image) }}" alt="" width="60">
                        @else
                            No image
                        @endif
                    </td>
                    <td class="p-2 border space-x-2">
                        <a href="{{ route('videos.edit', $post->id) }}" class="text-blue-500 hover:underline">✏️ Edit</a>

                        <form action="{{ route('videos.destroy', $post->id) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Are you sure you want to delete this video?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-500 hover:underline bg-transparent border-none p-0 cursor-pointer">🗑
                                Delete</button>
                        </form>

                        <a href="{{ route('videos.show', $post->id) }}" class="text-green-500 hover:underline">👁 View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center">No videos found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
@endsection
