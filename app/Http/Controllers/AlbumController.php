<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
   public function index(Request $request)
{
    $query = Album::query();

    // Filter pencarian berdasarkan nama album
    if ($request->has('search') && $request->search != '') {
         $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('slug', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%");
        });
    }

    // Urutkan dari terbaru dan pakai pagination
    $albums = $query->orderByDesc('created_at')->paginate(5)->withQueryString();

    return view('albums.index', compact('albums'));
}


    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('album_covers', 'public');
        }

        Album::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'cover_image' => $imagePath,
        ]);

        return redirect()->route('albums.index')->with('success', 'Album berhasil ditambahkan.');
    }

    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $album->cover_image;
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('album_covers', 'public');
        }

        $album->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'cover_image' => $imagePath,
        ]);

        return redirect()->route('albums.index')->with('success', 'Album berhasil diperbarui.');
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index')->with('success', 'Album dihapus.');
    }
}
