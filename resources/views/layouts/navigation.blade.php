{{-- <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">CineVibe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin-videos.index') }}">Videos</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}



<!-- resources/views/layouts/navigation.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">CineVibe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link @if(request()->routeIs('admin-videos.*')) active @endif" 
                       href="{{ route('admin-videos.index') }}">
                        <i class="fas fa-video me-1"></i> Videos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>