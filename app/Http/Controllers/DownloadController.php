<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Download;
use App\Models\DownloadCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
   public function index()
{
    $downloads = Download::with('category')->latest()->get();
    return view('downloads.index', compact('downloads'));
}

public function create()
{
    $categories = DownloadCategory::all();
    return view('downloads.create', compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'file' => 'required|mimes:pdf,docx,xlsx,zip|max:10240',
        'status' => 'required|in:draft,published,archived',
    ]);

    $file = $request->file('file');
    $path = $file->store('downloads', 'public');

    Download::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'description' => $request->description,
        'file_path' => '/storage/' . $path,
        'file_type' => $file->getClientOriginalExtension(),
        'file_size' => $file->getSize(),
        'category_id' => $request->category_id,
        'uploader' => $request->uploader,
        'status' => $request->status,
        'download_count' => 0,
    ]);

    return redirect()->route('downloads.index')->with('success', 'Berhasil diunggah.');
}
public function edit(Download $download)
{
    $categories = DownloadCategory::all();
    return view('downloads.edit', compact('download', 'categories'));
}


public function destroy($id)
{
    $download = Download::findOrFail($id);
    $download->delete();
    return redirect()->route('downloads.index')->with('success', 'Berhasil dihapus.');
}
}


