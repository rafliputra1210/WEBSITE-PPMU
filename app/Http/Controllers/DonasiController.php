<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Setting;
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
        $targetDonasi = Setting::get('donasi_target', 500000000); // Rp 500 juta default
        $persentase = $targetDonasi > 0 ? min(round(($totalTerkumpul / $targetDonasi) * 100), 100) : 0;
        $jumlahDonatur = Donatur::where('status', 'berhasil')->count();

        // Ambil 10 donatur terbaru yang berhasil (untuk ditampilkan di halaman)
        $donaturTerbaru = Donatur::where('status', 'berhasil')
            ->orderBy('tanggal_donasi', 'desc')
            ->limit(10)
            ->get();

        // Ambil donatur untuk leaderboard
        $leaderboardDonasi = Donatur::where('status', 'berhasil')
            ->orderBy('jumlah_donasi', 'desc')
            ->orderBy('tanggal_donasi', 'desc')
            ->get();

        // Ambil data progres terbaru
        $progres = \App\Models\Progres::latest()->get();

        return view('pesantren.donasi', compact(
            'totalTerkumpul',
            'targetDonasi',
            'persentase',
            'jumlahDonatur',
            'donaturTerbaru',
            'leaderboardDonasi',
            'progres'
        ));
    }

    /**
     * Simpan donasi baru dari form publik.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_donatur' => 'nullable|string|max:255',
            'jenis_donasi' => 'required|in:nominal,material',
            'no_wa' => 'nullable|string|max:20',
            'jumlah_donasi' => 'nullable|required_if:jenis_donasi,nominal|numeric|min:10000',
            'pesan' => 'nullable|string|max:1000',
        ]);

        Donatur::create([
            'nama_donatur' => $validated['nama_donatur'] ?: 'Hamba Allah',
            'jenis_donasi' => $validated['jenis_donasi'],
            'no_wa' => $validated['no_wa'],
            'jumlah_donasi' => $validated['jumlah_donasi'] ?? 0,
            'pesan' => $validated['pesan'],
            'tanggal_donasi' => now()->toDateString(),
            'status' => 'pending', // Admin akan mengonfirmasi setelah pembayaran
        ]);

        return redirect()->route('pesantren.donasi')
            ->with('success', 'Jazakallah khairan! Donasi Anda telah tercatat. Silakan lakukan transfer sesuai instruksi di bawah, kemudian admin akan memverifikasi.');
    }
}
