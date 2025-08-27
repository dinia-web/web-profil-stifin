<?php

namespace App\Http\Controllers;

use App\Models\Promotor;
use Illuminate\Http\Request;

class PromotorController extends Controller
{
    public function index(Request $request)
    {
        $query = Promotor::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('whatsapp', 'like', "%{$search}%");
            });
        }

        $promotors = $query->orderBy('name')->paginate(10)->withQueryString();
        return view('promotors.index', compact('promotors'));
    }

    public function create()
    {
        return view('promotors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:20',
        ]);

        Promotor::create($data);
        return redirect()->route('promotors.index')->with('success', 'Promotor berhasil ditambahkan.');
    }

    public function edit(Promotor $promotor)
    {
        return view('promotors.edit', compact('promotor'));
    }

    public function update(Request $request, Promotor $promotor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'whatsapp' => 'nullable|string|max:20',
        ]);

        $promotor->update($data);
        return redirect()->route('promotors.index')->with('success', 'Promotor berhasil diupdate.');
    }

    public function destroy(Promotor $promotor)
    {
        $promotor->delete();
        return redirect()->route('promotors.index')->with('success', 'Promotor berhasil dihapus.');
    }
}
