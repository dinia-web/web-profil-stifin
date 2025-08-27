<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
     public function index(Request $request)
{
    $query = Testimonial::query();

    if ($request->has('search') && $request->search != '') {
         $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('role', 'like', "%{$search}%")
              ->orWhere('message', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%");
        });
    }
    $testimonials = $query->orderBy('created_at', 'desc')->paginate(5); // tampilkan 10 per halaman

    return view('testimonials.index', compact('testimonials'));
}

    // Tampilkan form tambah testimonial
    public function create()
    {
        return view('testimonials.create');
    }

    // Simpan testimonial baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'role' => 'nullable|string|max:100',
            'message' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:published,draft',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil ditambahkan');
    }

    // Tampilkan form edit testimonial
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('testimonials.edit', compact('testimonial'));
    }

    // Update testimonial
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'role' => 'nullable|string|max:100',
            'message' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:published,draft',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil diperbarui');
    }

    // Hapus testimonial
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil dihapus');
    }
}
