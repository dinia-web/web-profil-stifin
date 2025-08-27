<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Tampilkan daftar cabang STIFIn.
     */
    public function index(Request $request)
    {
        $query = Branch::query();

        // Filter / pencarian berdasarkan nama atau kota
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('whatsapp', 'like', "%{$search}%");
            });
        }

        // Urutkan berdasarkan kota, dan pakai pagination 10 per halaman
        $branches = $query->orderBy('city')->paginate(5)->withQueryString();

        // Tampilkan ke view
        return view('branches.index', compact('branches'));
    }
    public function create()
{
    return view('branches.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'address' => 'nullable|string',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'whatsapp' => 'nullable|string|max:20',
    ]);

    Branch::create($data);

    return redirect()->route('branches.index')->with('success', 'Cabang berhasil ditambahkan.');
}

public function edit(Branch $branch)
{
    return view('branches.edit', compact('branch'));
}

public function update(Request $request, Branch $branch)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'address' => 'nullable|string',
        'phone' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'whatsapp' => 'nullable|string|max:20',
    ]);

    $branch->update($data);

    return redirect()->route('branches.index')->with('success', 'Cabang berhasil diupdate.');
}

public function destroy(Branch $branch)
{
    $branch->delete();
    return redirect()->route('branches.index')->with('success', 'Cabang berhasil dihapus.');
}

}
