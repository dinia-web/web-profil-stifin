<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pendaftaran::latest();

        // Filter berdasarkan search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('whatsapp', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('paket', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%")
                  ->orWhere('catatan', 'like', "%{$search}%")
                  ->orWhere('created_at', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan status (opsional)
        if ($request->has('status') && in_array($request->status, [1,2,3])) {
            $query->where('status', $request->status);
        }

        $pendaftaran = $query->paginate(10)->withQueryString();

        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:1,2,3',
    ]);

    $pendaftaran = Pendaftaran::findOrFail($id);
    $pendaftaran->status = $request->status;
    $pendaftaran->save();

    return redirect()->back()->with('success', 'Status pendaftar berhasil diupdate.');
}


    public function show($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        return view('admin.pendaftaran.views', compact('pendaftaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'whatsapp'   => 'required|string|max:20',
            'email'      => 'nullable|email',
            'paket'      => 'required|string',
            'lokasi'     => 'nullable|string',
            'sidik_jari' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'catatan'    => 'nullable|string',
        ]);

        // Validasi tambahan untuk lokasi Online
        if ($request->lokasi === 'Online' && !$request->hasFile('sidik_jari')) {
            return back()
                ->withErrors(['sidik_jari' => 'Foto sidik jari wajib diunggah jika memilih lokasi Online.'])
                ->withInput();
        }

        $pathSidikJari = null;
        if ($request->hasFile('sidik_jari')) {
            $pathSidikJari = $request->file('sidik_jari')->store('sidik_jari', 'public');
        }

        Pendaftaran::create([
            'nama'       => $request->nama,
            'whatsapp'   => $request->whatsapp,
            'email'      => $request->email,
            'paket'      => $request->paket,
            'lokasi'     => $request->lokasi,
            'sidik_jari' => $pathSidikJari,
            'catatan'    => $request->catatan,
            'status'     => 1 // default baru daftar
        ]);

        return redirect()->back()->with('success', 'Pendaftaran berhasil dikirim!');
    }

    public function destroy($id)
    {
        $data = Pendaftaran::findOrFail($id);

        // Hapus file sidik jari jika ada
        if ($data->sidik_jari && \Storage::disk('public')->exists($data->sidik_jari)) {
            \Storage::disk('public')->delete($data->sidik_jari);
        }

        $data->delete();

        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data berhasil dihapus');
    }
}
