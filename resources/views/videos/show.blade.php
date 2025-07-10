<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Show Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-bold text-green-600 mb-4">📄 Post Details</h2>

        <div class="bg-white p-6 rounded shadow">
            <p class="mb-2"><strong>ID:</strong> {{ $post->id }}</p>
            <p class="mb-2"><strong>Name:</strong> {{ $post->name }}</p>
            <p class="mb-2"><strong>Description:</strong></p>
            <div class="text-gray-700 mb-4">{!! $post->description !!}</div>

            <p class="mb-2"><strong>Image:</strong></p>
            @if ($post->image)
                <img src="{{ asset('images/' . $post->image) }}" width="200" alt="Image" class="my-2 rounded">
            @else
                <p class="text-gray-500 italic">No image available.</p>
            @endif

            <a href="{{ route('videos.index') }}"
                class="inline-block mt-4 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
                ← Back to Videos
            </a>
        </div>
    </div>
</body>

</html>
