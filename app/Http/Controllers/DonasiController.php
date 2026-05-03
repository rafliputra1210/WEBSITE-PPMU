<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Setting;
use App\Models\Qris;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    /**
     * Tampilkan halaman donasi/investasi akhirat.
     */
    public function index()
    {
        // Hitung total donasi (semua status agar langsung tertambah pada target)
        $totalTerkumpul = Donatur::sum('jumlah_donasi');
        $targetDonasi = Setting::get('donasi_target', 500000000); // Rp 500 juta default
        $persentase = $targetDonasi > 0 ? min(round(($totalTerkumpul / $targetDonasi) * 100), 100) : 0;
        $jumlahDonatur = Donatur::count();

        // Ambil 10 donatur terbaru (untuk ditampilkan di halaman)
        $donaturTerbaru = Donatur::orderBy('tanggal_donasi', 'desc')
            ->limit(10)
            ->get();

        // Ambil donatur untuk leaderboard
        $leaderboardDonasi = Donatur::orderBy('jumlah_donasi', 'desc')
            ->orderBy('tanggal_donasi', 'desc')
            ->get();

        // Ambil data progres terbaru
        $progres = \App\Models\Progres::latest()->get();

        // Ambil daftar QRIS aktif
        $listQris = Qris::where('is_active', true)->latest()->get();

        return view('pesantren.donasi', compact(
            'totalTerkumpul',
            'targetDonasi',
            'persentase',
            'jumlahDonatur',
            'donaturTerbaru',
            'leaderboardDonasi',
            'progres',
            'listQris'
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

        $donatur = Donatur::create([
            'nama_donatur' => $validated['nama_donatur'] ?: 'Hamba Allah',
            'jenis_donasi' => $validated['jenis_donasi'],
            'no_wa' => $validated['no_wa'],
            'jumlah_donasi' => $validated['jumlah_donasi'] ?? 0,
            'pesan' => $validated['pesan'],
            'tanggal_donasi' => now()->toDateString(),
            'status' => 'pending', // Admin akan mengonfirmasi setelah pembayaran
        ]);

        return redirect()->route('pesantren.donasi.pembayaran', $donatur->id)
            ->with('success', 'Formulir berhasil dikirim! Silakan pilih metode pembayaran dan unggah bukti transfer/donasi Anda.');
    }

    /**
     * Tampilkan halaman pilihan pembayaran & upload bukti.
     */
    public function pembayaran($id)
    {
        $donatur = Donatur::findOrFail($id);
        
        // Pastikan hanya yang status pending yang bisa akses
        if ($donatur->status !== 'pending') {
            return redirect()->route('pesantren.donasi')->with('error', 'Donasi ini sudah diverifikasi.');
        }

        // Ambil daftar QRIS aktif
        $listQris = Qris::where('is_active', true)->latest()->get();

        return view('pesantren.donasi_pembayaran', compact('donatur', 'listQris'));
    }

    /**
     * Proses upload bukti pembayaran/donasi.
     */
    public function uploadBukti(Request $request, $id)
    {
        $donatur = Donatur::findOrFail($id);

        $request->validate([
            'metode_pembayaran' => 'required|string',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096', // Max 4MB
        ], [
            'bukti_pembayaran.required' => 'Bukti donasi/transfer wajib diunggah.',
            'bukti_pembayaran.image' => 'File bukti harus berupa gambar.',
            'bukti_pembayaran.max' => 'Ukuran gambar maksimal 4MB.'
        ]);

        $path = $request->file('bukti_pembayaran')->store('bukti_donasi', 'public');

        $donatur->update([
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_pembayaran' => $path,
            // Status tetap pending menunggu verifikasi admin
        ]);

        return redirect()->route('pesantren.donasi')
            ->with('success', 'Jazakallah khairan! Bukti donasi berhasil dikirim dan sedang menunggu verifikasi admin.');
    }
}
