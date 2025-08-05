<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);
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
        ]);

        $slug = $request->slug ?: Str::slug($request->title);

        Page::create([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'author' => auth()->user()->name ?? 'admin',
            'status' => $request->status ?? 'draft',
            'published_at' => $request->published_at,
            'featured_image' => $request->featured_image,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'is_homepage' => $request->is_homepage ? 1 : 0,
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
        ]);

        $slug = $request->slug ?: Str::slug($request->title);

        $page->update([
            'title' => $request->title,
            'slug' => $slug,
            'content' => $request->content,
            'author' => auth()->user()->name ?? $page->author,
            'status' => $request->status,
            'published_at' => $request->published_at,
            'featured_image' => $request->featured_image,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'is_homepage' => $request->is_homepage ? 1 : 0,
        ]);

        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil diperbarui.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Halaman berhasil dihapus.');
    }
}
