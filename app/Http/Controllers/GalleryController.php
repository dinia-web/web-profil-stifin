<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with(['category', 'album'])->latest()->get();
        return view('galleries.index', compact('galleries'));
    }
    public function publicGallery()
{
    $galleries = Gallery::latest()->get();
    return view('galeri', compact('galleries'));
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
            'title' => 'required|string|max:255',
            'image_file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'nullable|exists:gallery_categories,id',
            'album_id' => 'nullable|exists:albums,id',
            'description' => 'nullable|string',
            'uploader' => 'nullable|string|max:100',
            'status' => 'required|string',
            'taken_at' => 'nullable|date',
        ]);

        // Simpan gambar
        $path = $request->file('image_file')->store('gallery', 'public');

        // Buat slug unik
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;
        while (Gallery::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        Gallery::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'album_id' => $request->album_id,
            'description' => $request->description,
            'image_path' => $path,
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

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'nullable|exists:gallery_categories,id',
            'album_id' => 'nullable|exists:albums,id',
            'description' => 'nullable|string',
            'uploader' => 'nullable|string|max:100',
            'status' => 'required|string',
            'taken_at' => 'nullable|date',
        ]);

        $data = $request->only([
            'title', 'category_id', 'album_id', 'description',
            'uploader', 'status', 'taken_at'
        ]);

        $data['is_featured'] = $request->has('is_featured');

        // Update slug jika title berubah
        if ($gallery->title !== $request->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;
            while (Gallery::where('slug', $slug)->where('id', '!=', $gallery->id)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
            $data['slug'] = $slug;
        }

        // Update gambar jika ada
        if ($request->hasFile('image_file')) {
            // Hapus gambar lama jika ada
            if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }

            $path = $request->file('image_file')->store('gallery', 'public');
            $data['image_path'] = $path;
        }

        $gallery->update($data);

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Hapus gambar dari storage
        if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
