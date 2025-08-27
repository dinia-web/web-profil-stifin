<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DownloadCategory;
use Illuminate\Support\Str;

class DownloadCategoryController extends Controller
{
 public function index(Request $request)
{
    $query = DownloadCategory::query();

    if ($request->has('search') && $request->search != '') {
         $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('slug', 'like', "%{$search}%");
        });
    }
    $categories = $query->orderBy('created_at', 'desc')->paginate(5); // tampilkan 10 per halaman

    return view('download_categories.index', compact('categories'));
}
    public function create()
    {
        return view('download_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:download_categories,name',
        ]);

        DownloadCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // otomatis bikin slug
        ]);

        return redirect()->route('download_categories.index')
                         ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit(DownloadCategory $downloadCategory)
    {
        return view('download_categories.edit', compact('downloadCategory'));
    }

    public function update(Request $request, DownloadCategory $downloadCategory)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:download_categories,name,' . $downloadCategory->id,
        ]);

        $downloadCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('download_categories.index')
                         ->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(DownloadCategory $downloadCategory)
    {
        $downloadCategory->delete();

        return redirect()->route('download_categories.index')
                         ->with('success', 'Kategori berhasil dihapus');
    }
}
