<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::all();
        return view('gallery_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('gallery_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|string',
        ]);

        GalleryCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('gallery-categories.index')->with('success', 'Kategori galeri berhasil ditambahkan.');
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        return view('gallery_categories.edit', compact('galleryCategory'));
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|string',
        ]);

        $galleryCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return redirect()->route('gallery-categories.index')->with('success', 'Kategori galeri berhasil diperbarui.');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        $galleryCategory->delete();
        return redirect()->route('gallery-categories.index')->with('success', 'Kategori galeri dihapus.');
    }
}
