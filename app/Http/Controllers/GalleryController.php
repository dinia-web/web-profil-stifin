<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with(['category', 'album'])->latest()->get();
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        $categories = GalleryCategory::all();
        $albums = Album::all();
        return view('galleries.create', compact('categories', 'albums'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'status' => 'required|in:draft,published,archived',
    ]);

    $imagePath = null;

    if ($request->hasFile('image_file')) {
        $imagePath = $request->file('image_file')->store('gallery', 'public');
    }

    Gallery::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'image_path' => '/storage/' . $imagePath,
        'category_id' => $request->category_id,
        'album_id' => $request->album_id,
        'uploader' => $request->uploader,
        'status' => $request->status,
        'taken_at' => $request->taken_at,
        'is_featured' => $request->has('is_featured'),
    ]);

    return redirect()->route('galleries.index')->with('success', 'Galeri berhasil ditambahkan.');
}

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $categories = GalleryCategory::all();
        $albums = Album::all();
        return view('galleries.edit', compact('gallery', 'categories', 'albums'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'status' => 'required|in:draft,published,archived',
        ]);

        $gallery->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image_path' => $request->image_path,
            'category_id' => $request->category_id,
            'album_id' => $request->album_id,
            'uploader' => $request->uploader,
            'status' => $request->status,
            'taken_at' => $request->taken_at,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil dihapus.');
    }
}

