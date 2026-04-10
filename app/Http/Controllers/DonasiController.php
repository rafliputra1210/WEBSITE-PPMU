<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    /**
     * Tampilkan halaman donasi/investasi akhirat.
     */
    public function index()
    {
        // Hitung total donasi yang berstatus 'berhasil'
        $totalTerkumpul = Donatur::where('status', 'berhasil')->sum('jumlah_donasi');
        $targetDonasi = 500000000; // Rp 500 juta
        $persentase = $targetDonasi > 0 ? min(round(($totalTerkumpul / $targetDonasi) * 100), 100) : 0;
        $jumlahDonatur = Donatur::where('status', 'berhasil')->count();

        // Ambil 10 donatur terbaru yang berhasil (untuk ditampilkan di halaman)
        $donaturTerbaru = Donatur::where('status', 'berhasil')
            ->orderBy('tanggal_donasi', 'desc')
            ->limit(10)
            ->get();

        return view('pesantren.donasi', compact(
            'totalTerkumpul',
            'targetDonasi',
            'persentase',
            'jumlahDonatur',
            'donaturTerbaru'
        ));
    }

    /**
     * Simpan donasi baru dari form publik.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_donatur' => 'nullable|string|max:255',
            'jumlah_donasi' => 'required|numeric|min:10000',
            'pesan' => 'nullable|string|max:1000',
        ]);

        Donatur::create([
            'nama_donatur' => $validated['nama_donatur'] ?: 'Hamba Allah',
            'jumlah_donasi' => $validated['jumlah_donasi'],
            'pesan' => $validated['pesan'],
            'tanggal_donasi' => now()->toDateString(),
            'status' => 'pending', // Admin akan mengonfirmasi setelah pembayaran
        ]);

        return redirect()->route('pesantren.donasi')
            ->with('success', 'Jazakallah khairan! Donasi Anda telah tercatat. Silakan lakukan transfer sesuai instruksi di bawah, kemudian admin akan memverifikasi.');
    }
}
