@extends('layouts.master')
@section('body')
    <!-- Breadcrumb -->
    {{-- <section class="bg-hero-pattern bg-cover bg-center"> --}}
    <section class="bg-cover bg-center" style="background-image: url('{{ asset('assets/img/page-banner/about.jpg') }}');">
        <div class="text-white flex flex-col items-center bg-black bg-opacity-70 md:py-20 py-10">
            <h1 class="text-[30px] font-bold">Gallery</h1>
            <div class="flex items-center">
                <p class="block">Home</p>
                <div class="h-[6px] w-[6px] mx-3 rotate-45 bg-[#C1AB65]"></div>
                <p>Gallery</p>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="bg-[#0C0C0C]">
        <div class="max-w-screen-xl mx-auto px-4 md:py-20 py-10 flex lg:flex-row flex-col gap-10">
            <div class="w-full">
                <h2 class="font-bold text-[25px] text-white mb-5 uppercase">Gallery</h2>
                <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-5">
                    @foreach ($galleries->take(16) as $gallery)
                        <div class="group overflow-hidden">
                            <img class="group-hover:scale-110 transition-all duration-300 w-full h-48 object-cover"
                                src="{{ asset($gallery->image_path) }}" alt="{{ $gallery->title ?? 'Gallery Image' }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Video -->
    <section class="bg-[#0C0C0C]">
        <div class="max-w-screen-xl mx-auto px-4 md:pb-20 pb-10 flex lg:flex-row flex-col gap-10">
            <div class="w-full">
                <h2 class="font-bold text-[25px] text-white mb-5 uppercase">YouTube Videos</h2>
                <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-5">
                    @foreach ($videos as $video)
                        <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/{{ $video->video_path }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen title="{{ $video->title ?? 'YouTube Video' }}">
                        </iframe>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
