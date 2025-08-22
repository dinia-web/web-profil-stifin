<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
// Tampilkan semua user
public function index(Request $request)
{
    $query = User::query();

    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $users = $query->orderBy('id', 'DESC')->paginate(5)->withQueryString();

    return view('users.index', compact('users'));
}


// Tampilkan form tambah user
public function create()
{
return view('users.create');
}

// Simpan user baru
public function store(Request $request)
{
$request->validate([
'name' => 'required|string|max:255',
'email' => 'required|string|email|unique:users',
'password' => 'required|string|min:6|confirmed',
'role' => 'required|string',
]);

User::create([
'name' => $request->name,
'email' => $request->email,
'password' => Hash::make($request->password),

'role' => $request->role, // pastikan kolom `role` ada
]);

return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
}

// Tampilkan form edit user
public function edit(User $user)
{
return view('users.edit', compact('user'));
}

// Update data user
public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'role' => 'required|in:admin,dosen,mahasiswa',
        'password' => 'nullable|min:6|confirmed',
    ]);

    $data = $request->only('name', 'email', 'role');

    if ($request->filled('password')) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data); // INI HARUS ADA

    return redirect()->route('users.index')->with('success', 'Data berhasil diperbarui.');
}

// Hapus user
public function destroy(User $user)

{
$user->delete();
return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
}
}
