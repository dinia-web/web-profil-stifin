<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $kategoris = Kategori::orderBy('created_at', 'desc')->get();
return view('kategoris.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategoris.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
'nama' => 'required|string|max:255',
'deskripsi' => 'nullable|string',
]);

Kategori::create($request->only(['nama', 'deskripsi']));

return redirect()->route('kategoris.index')->with('success', 'Kategori
berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategoris.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
       $request->validate([
'nama' => 'required|string|max:255',
'deskripsi' => 'nullable|string',
]);

$kategori->update($request->only(['nama', 'deskripsi']));

return redirect()->route('kategoris.index')->with('success', 'Kategori
berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
return redirect()->route('kategoris.index')->with('success', 'Kategori
berhasil dihapus.');
    }
}
