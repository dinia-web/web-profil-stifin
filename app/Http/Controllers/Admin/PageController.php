<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
   public function index(Request $request)
{
    $query = Page::query();

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('slug', 'like', "%{$search}%")
              ->orWhere('published_at', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%");
        });
    }

    $pages = $query->orderByDesc('created_at')->paginate(5)->withQueryString();

    return view('admin.pages.index', compact('pages'));
}


    public function create()
    {
        return view('admin.pages.create');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|unique:pages,title',
        'slug' => 'nullable|unique:pages,slug',
        'content' => 'required',
        'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'show_as_button' => 'nullable|boolean', // tambahin validasi
    ]);

    $slug = $request->slug ?: Str::slug($request->title);

    $featuredImagePath = null;
    if ($request->hasFile('featured_image')) {
        $featuredImagePath = $request->file('featured_image')->store('pages', 'public');
    }

    Page::create([
        'title' => $request->title,
        'slug' => $slug,
        'content' => $request->content,
        'author' => auth()->user()->name ?? 'admin',
        'status' => $request->status ?? 'draft',
        'published_at' => $request->published_at,
        'featured_image' => $featuredImagePath,
        'meta_description' => $request->meta_description,
        'meta_keywords' => $request->meta_keywords,
        'is_homepage' => $request->is_homepage ? 1 : 0,
        'show_as_button' => $request->show_as_button ? 1 : 0, // tambahin
    ]);

    return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil dibuat.');
}



    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
{
    $request->validate([
        'title' => 'required|unique:pages,title,' . $page->id,
        'slug' => 'nullable|unique:pages,slug,' . $page->id,
        'content' => 'required',
        'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'show_as_button' => 'nullable|boolean', // validasi juga
    ]);

    $slug = $request->slug ?: Str::slug($request->title);

    $data = [
        'title' => $request->title,
        'slug' => $slug,
        'content' => $request->content,
        'author' => auth()->user()->name ?? $page->author,
        'status' => $request->status,
        'published_at' => $request->published_at,
        'meta_description' => $request->meta_description,
        'meta_keywords' => $request->meta_keywords,
        'is_homepage' => $request->is_homepage ? 1 : 0,
        'show_as_button' => $request->show_as_button ? 1 : 0, // tambahin
    ];

    if ($request->hasFile('featured_image')) {
        if ($page->featured_image && \Storage::disk('public')->exists($page->featured_image)) {
            \Storage::disk('public')->delete($page->featured_image);
        }
        $data['featured_image'] = $request->file('featured_image')->store('pages', 'public');
    }

    $page->update($data);

    return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil diperbarui.');
}


    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil dihapus.');
    }
}
