<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();
        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'video_url' => 'required|url'
        ]);

        $videoId = $this->getYouTubeId($request->video_url);
        if (!$videoId) {
            return back()->withErrors(['video_url' => 'Invalid YouTube URL'])->withInput();
        }

        Video::create([
            'description' => $request->description,
            'video_url' => $request->video_url,
            'video_path' => $videoId
        ]);

        return redirect()->route('admin-videos.index')
               ->with('success', 'Video added successfully!');
    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'video_url' => 'required|url'
        ]);

        $videoId = $this->getYouTubeId($request->video_url);
        if (!$videoId) {
            return back()->withErrors(['video_url' => 'Invalid YouTube URL'])->withInput();
        }

        $video->update([
            'description' => $request->description,
            'video_url' => $request->video_url,
            'video_path' => $videoId
        ]);

        return redirect()->route('admin-videos.index')
               ->with('success', 'Video updated successfully!');
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('admin-videos.index')
               ->with('success', 'Video deleted successfully!');
    }

    private function getYouTubeId($url)
    {
        // More reliable YouTube ID extraction
        $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/\s]{11})%i';
        if (preg_match($pattern, $url, $match)) {
            return $match[1];
        }
        return null;
    }
}