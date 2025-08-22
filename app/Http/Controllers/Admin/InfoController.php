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
        $query->where('title', 'like', '%' . $request->search . '%');
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
    \Log::info('STORE DIPANGGIL', $request->all());

    $request->validate([
        'kategori_id' => 'required',
        'judul' => 'required|string|max:255',
        'isi' => 'nullable|string',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'author' => 'nullable|string|max:255',
        'status' => 'required|string',
        'published_at' => 'nullable|date',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
    ]);

    // Proses upload gambar jika ada
    $gambarPath = null;
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('infos', 'public');
    }

    $info = Info::create([
        'kategori_id' => $request->kategori_id,
        'judul' => $request->judul,
        'slug' => Str::slug($request->judul),
        'isi' => $request->isi,
        'gambar' => $gambarPath,
        'author' => $request->author,
        'is_homepage' => $request->has('is_homepage') ? 1 : 0,
        'status' => $request->status,
        'published_at' => $request->published_at,
    ]);

    // Simpan relasi tag jika ada
    if ($request->has('tags')) {
        $info->tags()->sync($request->tags);
    }

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
        'author' => 'nullable|string|max:255',
        'status' => 'required|string',
        'published_at' => 'nullable|date',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id',
    ]);

    // Upload gambar jika ada gambar baru
    $gambarPath = $info->gambar;
    if ($request->hasFile('gambar')) {
        $gambarPath = $request->file('gambar')->store('infos', 'public');
    }

    $info->update([
        'kategori_id' => $request->kategori_id,
        'judul' => $request->judul,
        'slug' => Str::slug($request->judul),
        'isi' => $request->isi,
        'gambar' => $gambarPath,
        'author' => $request->author,
        'is_homepage' => $request->has('is_homepage') ? 1 : 0,
        'status' => $request->status,
        'published_at' => $request->published_at,
    ]);

    // Sinkronisasi tag
    $info->tags()->sync($request->tags ?? []);

    return redirect()->route('admin.infos.index')->with('success', 'Info berhasil diupdate');
}

    public function destroy(Info $info)
    {
        $info->tags()->detach();
        $info->delete();

        return redirect()->route('admin.infos.index')->with('success', 'Info berhasil dihapus');
    }
}

