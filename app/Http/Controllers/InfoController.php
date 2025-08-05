<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $infos = Info::with('kategori', 'tags')
            ->where('status', 'published')
            ->orderByDesc('published_at')
            ->paginate(6);

        return view('homepage', compact('infos'));
    }

    public function indexPublic()
{
    $infos = Info::with('kategori', 'tags')
        ->where('status', 'published')
        ->orderByDesc('published_at')
        ->paginate(6);

    return view('public.index', compact('infos'));
}

    public function show($slug)
    {
        $info = Info::with('kategori', 'tags')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('public.show', compact('info'));
    }
}
