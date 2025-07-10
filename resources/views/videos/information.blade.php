<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Information</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-green-600">📊 Information</h2>
            <a href="{{ route('videos.index') }}"
                class="bg-green-600 text-white rounded px-4 py-2 hover:bg-green-700 transition">← Back to Videos</a>
        </div>

        <!-- Filter & Search Form -->
        <form method="GET" action="{{ route('videos.information') }}"
            class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Search by name or description..."
                class="w-full md:w-2/3 border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">

            <div class="flex items-center gap-2">
                <label for="sort" class="text-gray-700 text-sm">Sort:</label>
                <select name="sort" id="sort" onchange="this.form.submit()"
                    class="border border-gray-300 rounded px-2 py-1">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                    <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>A-Z</option>
                    <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Z-A</option>
                </select>
            </div>
        </form>

        <!-- Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($posts as $post)
                <div class="bg-white rounded shadow p-4 flex flex-col items-center">
                    @if ($post->image)
                        <img src="{{ asset('images/' . $post->image) }}" alt="Image"
                            class="w-32 h-32 object-cover rounded mb-3">
                    @else
                        <div class="w-32 h-32 bg-gray-200 rounded mb-3 flex items-center justify-center text-gray-400">
                            No Image</div>
                    @endif
                    <div class="font-semibold text-lg mb-1">{{ $post->name }}</div>
                    <div class="text-gray-600 text-sm text-center">{!! $post->description !!}</div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">No posts found.</div>
            @endforelse
        </div>
    </div>
</body>

</html>
