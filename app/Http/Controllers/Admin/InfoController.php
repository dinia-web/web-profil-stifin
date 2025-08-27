<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use App\Models\Kategori;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfoController extends Controller
{
  public function index(Request $request)
{
    $query = Info::with('kategori', 'tags');

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            // Kolom langsung di tabel infos
            $q->where('judul', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%");
        })
        // Relasi kategori
        ->orWhereHas('kategori', function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%");
        })
        // Relasi tags
        ->orWhereHas('tags', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });
    }

    $infos = $query->latest()->paginate(5)->withQueryString();

    return view('admin.infos.index', compact('infos'));
}


    public function create()
    {
        $kategoris = Kategori::all();
        $tags = Tag::all();
        return view('admin.infos.create', compact('kategoris', 'tags'));
    }

public function store(Request $request)
{
    $request->validate([
        'kategori_id' => 'required',
        'judul' => 'required|string|max:255',
        'isi' => 'nullable|string',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:102400',
        'youtube_urls' => 'nullable|array',
        'youtube_urls.*' => 'nullable|url',
        'author' => 'nullable|string|max:255',
        'status' => 'required|string',
        'published_at' => 'nullable|date',
        'tags' => 'nullable|array',
    ]);

    // Upload file jika ada
    $gambarPath = $request->hasFile('gambar') ? $request->file('gambar')->store('infos', 'public') : null;
    $videoPath = $request->hasFile('video') ? $request->file('video')->store('infos/videos', 'public') : null;

    // Simpan data info
    $info = Info::create([
        'kategori_id' => $request->kategori_id,
        'judul' => $request->judul,
        'slug' => Str::slug($request->judul),
        'isi' => $request->isi,
        'gambar' => $gambarPath,
        'video' => $videoPath,
        'youtube_url' => !empty(array_filter($request->youtube_urls ?? [])) ? json_encode(array_filter($request->youtube_urls)) : null,
        'author' => $request->author,
        'is_homepage' => $request->has('is_homepage') ? 1 : 0,
        'status' => $request->status,
        'published_at' => $request->published_at,
    ]);

    // Simpan tags (buat baru jika belum ada)
    $tagIds = [];
    if ($request->filled('tags')) {
        foreach ($request->tags as $tag) {
            $tagIds[] = is_numeric($tag) ? $tag : Tag::firstOrCreate(['name' => $tag])->id;
        }
    }
    $info->tags()->sync($tagIds);

    return redirect()->route('admin.infos.index')->with('success', 'Info berhasil ditambahkan');
}


    public function edit(Info $info)
    {
        $kategoris = Kategori::all();
        $tags = Tag::all();
        return view('admin.infos.edit', compact('info', 'kategoris', 'tags'));
    }

  public function update(Request $request, Info $info)
{
    $request->validate([
        'kategori_id' => 'required',
        'judul' => 'required|string|max:255',
        'isi' => 'nullable|string',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'video' => 'nullable|mimetypes:video/mp4,video/quicktime|max:102400',
        'youtube_urls' => 'nullable|array',
        'youtube_urls.*' => 'nullable|url',
        'author' => 'nullable|string|max:255',
        'status' => 'required|string',
        'published_at' => 'nullable|date',
        'tags' => 'nullable|array',
    ]);

    $gambarPath = $request->hasFile('gambar') ? $request->file('gambar')->store('infos', 'public') : $info->gambar;
    $videoPath = $request->hasFile('video') ? $request->file('video')->store('infos/videos', 'public') : $info->video;

   $info->update([
    'kategori_id' => $request->kategori_id,
    'judul' => $request->judul,
    'slug' => Str::slug($request->judul),
    'isi' => $request->isi,
    'gambar' => $gambarPath,
    'video' => $videoPath,
    'youtube_url' => !empty($request->youtube_urls) ? json_encode($request->youtube_urls) : null,
    'author' => $request->author,
    'is_homepage' => $request->has('is_homepage') ? 1 : 0,
    'status' => $request->status,
    'published_at' => $request->published_at,
]);

    // Update tags
    $tagIds = [];
    if ($request->filled('tags')) {
        foreach ($request->tags as $tag) {
            $tagIds[] = is_numeric($tag) ? $tag : Tag::firstOrCreate(['name' => $tag])->id;
        }
    }
    $info->tags()->sync($tagIds);

    return redirect()->route('admin.infos.index')->with('success', 'Info berhasil diupdate');
}
    public function destroy(Info $info)
    {
        $info->tags()->detach();
        $info->delete();

        return redirect()->route('admin.infos.index')->with('success', 'Info berhasil dihapus');
    }
}

