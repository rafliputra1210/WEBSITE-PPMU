<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    /**
     * Simpan data pendaftaran dari form publik
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:100',
            'tanggal_lahir' => 'required|string|max:50',
            'asal_sekolah'  => 'required|string|max:255',
            'mendaftar_ke'  => 'required|in:pesantren,madrasah',
            'nama_wali'     => 'required|string|max:255',
            'no_wa'         => 'required|string|max:20',
        ], [
            'nama_lengkap.required'  => 'Nama lengkap wajib diisi.',
            'tempat_lahir.required'  => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'asal_sekolah.required'  => 'Asal sekolah wajib diisi.',
            'mendaftar_ke.required'  => 'Pilih tujuan pendaftaran.',
            'mendaftar_ke.in'        => 'Tujuan pendaftaran tidak valid.',
            'nama_wali.required'     => 'Nama wali wajib diisi.',
            'no_wa.required'         => 'Nomor WhatsApp wajib diisi.',
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
     * Halaman daftar pendaftar di admin
     */
    public function adminIndex(Request $request)
    {
        $query = Pendaftaran::latest();

        if ($request->filled('filter')) {
            $query->where('mendaftar_ke', $request->filter);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                  ->orWhere('no_wa', 'like', '%' . $request->search . '%')
                  ->orWhere('asal_sekolah', 'like', '%' . $request->search . '%');
            });
        }

        $pendaftarans = $query->paginate(15)->withQueryString();

        return view('admin.pendaftaran.index', compact('pendaftarans'));
    }

    /**
     * Hapus data pendaftaran
     */
    public function adminDestroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();
        return redirect()
            ->route('admin.pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }
}
