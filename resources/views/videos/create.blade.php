<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply px-10 mx-auto;
            }
        }
    </style>

    <title>Document</title>
</head>

<body>
    <div class = "container">
        <div class="flex justify-between my-5">
            <h2 class = "text-red-500 text-xl">Create</h2>

            <a href="{{ route('dashboardvideos') }}" class="bg-green-600 text-white rounded py-2 px-4">Back to
                Dashboard</a>

        </div>
        <div>
            <form method="POST" action="{{ route('videos.store') }}">

                @csrf
                <div class = "flex flex-col gap-5">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}">
                    @error('name')
                        <p class = "text-red-600">{{ $message }}</p>
                    @enderror


                    <label for="">Description</label>
                    <input type="text" name="description" value="{{ old('description') }}">
                    @error('description')
                        <p class = "text-red-600">{{ $message }}</p>
                    @enderror

                    <label for="">Select Image</label>
                    <input type="file" name="image">
                    @error('image')
                        <p class = "text-red-600">{{ $message }}</p>
                    @enderror

                    <div>
                        <input type="submit" class="bg-green-500 text-white py-2 px-4 rounded inline-block">
                    </div>

                </div>
            </form>
        </div>
    </div>

</body>

</html>
