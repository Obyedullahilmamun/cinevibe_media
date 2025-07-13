<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin-gallery', compact('galleries'));
    }

    public function create()
    {
        return view('gallery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        /* ── move file straight to /public/gallery ───────────── */
        $file      = $request->file('image');
        $filename  = Str::uuid() . '.' . $file->extension();               // unique
        $targetDir = public_path('gallery');

        if (! is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);                             // create the folder once
        }

        $file->move($targetDir, $filename);                            // ← no Storage facade

        Gallery::create([
            'description' => $validated['description'],
            'image_path'  => 'gallery/' . $filename,                     // save relative path
        ]);

        return redirect()
            ->route('admin-gallery.index')
            ->with('success', 'Gallery item added.');
    }

    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            /* delete old file (best-effort) */
            $old = public_path($gallery->image_path);
            if (is_file($old)) {
                @unlink($old);
            }

            $file      = $request->file('image');
            $filename  = Str::uuid() . '.' . $file->extension();
            $file->move(public_path('gallery'), $filename);

            $gallery->image_path = 'gallery/' . $filename;
        }

        $gallery->description = $validated['description'];
        $gallery->save();

        return redirect()
            ->route('admin-gallery.index')
            ->with('success', 'Gallery item updated.');
    }


    public function destroy(Gallery $gallery)
    {
        $full = public_path($gallery->image_path);
        if (is_file($full)) {
            @unlink($full);
        }

        $gallery->delete();

        return redirect()
            ->route('admin-gallery.index')
            ->with('success', 'Gallery item deleted.');
    }
}
