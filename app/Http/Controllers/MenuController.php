<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('order')->get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $parents = Menu::whereNull('parent_id')->get();
        return view('menus.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        Menu::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'url' => $request->url,
            'parent_id' => $request->parent_id,
            'order' => $request->order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil dibuat');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $parents = Menu::whereNull('parent_id')->where('id', '!=', $id)->get();
        return view('menus.edit', compact('menu', 'parents'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'status' => 'required|in:active,inactive',
        ]);

        $menu->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'url' => $request->url,
            'parent_id' => $request->parent_id,
            'order' => $request->order ?? 0,
            'status' => $request->status,
        ]);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus');
    }
}