<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StaticPage;
class StaticPageController extends Controller
{
public function show($slug)
    {
        $viewName = "stifin.halaman." . $slug;

        // Cek apakah file Blade untuk slug itu tersedia
        if (!view()->exists($viewName)) {
            abort(404, 'Halaman tidak ditemukan');
        }

        return view($viewName);
    }

public function index()
{
    $staticPages = StaticPage::all();
    return view('admin.index', compact('staticPages'));
}

}
