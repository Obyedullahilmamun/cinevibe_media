<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts | Video Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply px-10 mx-auto;
            }

            .btn {
                @apply bg-green-600 text-white rounded px-4 py-2;
            }
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container">
        <div class="flex justify-between my-5 items-center">
            <h2 class="text-red-500 text-xl">🎬 Videos Dashboard</h2>
            <div class="flex gap-2">
                <a href="{{ route('videos.information') }}" class="btn">Information</a>
                <a href="{{ route('videos.create') }}" class="btn">Add New Post</a>
            </div>
        </div>

        @if (session('success'))
            <h2 class="text-green-600 py-3">{{ session('success') }}</h2>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 border border-green-300 my-5">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-start text-xs font-medium uppercase">ID</th>
                        <th class="px-6 py-3 text-start text-xs font-medium uppercase">Name</th>
                        <th class="px-6 py-3 text-start text-xs font-medium uppercase">Description</th>
                        <th class="px-6 py-3 text-center text-xs font-medium uppercase">Image</th>
                        <th class="px-6 py-3 text-center text-xs font-medium uppercase">Show</th>
                        <th class="px-6 py-3 text-end text-xs font-medium uppercase">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="odd:bg-white even:bg-gray-100">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $post->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $post->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{!! $post->description !!}</td>
                            <td class="px-6 py-4 text-center">
                                @if ($post->image)
                                    <img src="{{ asset('images/' . $post->image) }}" width="80" alt="Image"
                                        class="rounded">
                                @else
                                    <span class="text-gray-400 italic">No image</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('videos.show', $post->id) }}" class="btn">View</a>
                            </td>
                            <td class="px-6 py-4 text-end">
                                <a href="{{ route('videos.edit', $post->id) }}" class="btn">Edit</a>
                                <a href="{{ route('videos.delete', $post->id) }}"
                                    class="bg-red-600 text-white rounded px-4 py-2 ml-2">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Laravel pagination -->
            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</body>

</html>
