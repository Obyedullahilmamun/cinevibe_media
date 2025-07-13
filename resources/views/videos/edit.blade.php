{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Edit Video</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-videos.update', $video->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" 
                                   name="description" value="{{ $video->description }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="video_url" class="form-label">YouTube URL</label>
                            <input type="url" class="form-control" id="video_url" 
                                   name="video_url" value="{{ $video->video_url }}" required>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin-videos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i>Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


<!-- resources/views/videos/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Video')

@section('header')
    <h1>Edit Video</h1>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin-videos.update', $video->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description"
                                value="{{ $video->description }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="video_url" class="form-label">YouTube URL</label>
                            <input type="url" class="form-control" id="video_url" name="video_url"
                                value="{{ $video->video_url }}" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin-videos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Update Video
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
