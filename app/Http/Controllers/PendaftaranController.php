<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    /**
     * Simpan data pendaftaran dari form publik.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|string|max:20',
            'asal_sekolah'  => 'required|string|max:255',
            'mendaftar_ke'  => 'required|in:pesantren,madrasah',
            'nama_wali'     => 'required|string|max:255',
            'no_wa'         => 'required|string|max:20',
        ]);

        Pendaftaran::create($request->only([
            'nama_lengkap', 'tempat_lahir', 'tanggal_lahir',
            'asal_sekolah', 'mendaftar_ke', 'nama_wali', 'no_wa',
        ]));

        return redirect()
            ->route('pesantren.pendaftaran')
            ->with('success', 'Pendaftaran berhasil dikirim! Kami akan menghubungi Anda melalui WhatsApp.');
    }

    /**
     * Tampilkan semua data pendaftaran di admin.
     */
    public function adminIndex(Request $request)
    {
        $query = Pendaftaran::latest();

        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(function ($q2) use ($q) {
                $q2->where('nama_lengkap', 'like', "%$q%")
                   ->orWhere('nama_wali', 'like', "%$q%")
                   ->orWhere('no_wa', 'like', "%$q%");
            });
        }

        if ($request->filled('filter')) {
            $query->where('mendaftar_ke', $request->filter);
        }

        $pendaftarans = $query->paginate(15)->withQueryString();

        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Hapus data pendaftaran.
     */
    public function adminDestroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()->route('admin.pendaftaran.index')->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
