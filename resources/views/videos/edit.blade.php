@extends('layouts.admin_master')

@section('body')
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-red-500 text-xl">Edit - {{ $ourPost->name }}</h2>
            <a href="{{ route('videos.index') }}" class="bg-green-600 text-white rounded py-2 px-4">← Back to Videos</a>
        </div>

        <form method="POST" action="{{ route('videos.update', $ourPost->id) }}" enctype="multipart/form-data">
            @csrf
            @method('POST') <!-- Optional: use @method('PUT') if route supports PUT -->

            <div class="flex flex-col gap-5">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ old('name', $ourPost->name) }}" class="border p-2">

                @error('name')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror

                <label for="">Description</label>
                <textarea name="description" id="description" rows="8" class="border p-2">{{ old('description', $ourPost->description) }}</textarea>

                @error('description')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror

                <label for="">Select Image</label>
                <input type="file" name="image" class="border p-2">
                @error('image')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror

                <div>
                    <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
