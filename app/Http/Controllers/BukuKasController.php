<?php

namespace App\Http\Controllers;

use App\Models\BukuKas;
use App\Models\Donatur;
use Illuminate\Http\Request;

class BukuKasController extends Controller
{
    /**
     * Tampilkan data buku kas admin.
     */
    public function index(Request $request)
    {
        $bulan = $request->get('bulan', date('m'));
        $tahun = $request->get('tahun', date('Y'));

        // Query data BukuKas berdasarkan bulan dan tahun
        $query = BukuKas::whereYear('tanggal', $tahun)
                        ->whereMonth('tanggal', $bulan)
                        ->orderBy('tanggal', 'asc');

        $items = $query->get();

        // Ringkasan Bulanan
        $totalPemasukan = BukuKas::whereYear('tanggal', $tahun)
                                 ->whereMonth('tanggal', $bulan)
                                 ->where('tipe', 'pemasukan')
                                 ->sum('nominal');

        $totalPengeluaran = BukuKas::whereYear('tanggal', $tahun)
                                   ->whereMonth('tanggal', $bulan)
                                   ->where('tipe', 'pengeluaran')
                                   ->sum('nominal');

        // Total Saldo Kumulatif (Keseluruhan waktu hingga akhir bulan terpilih)
        // Dihitung dengan total pemasukan dikurangi total pengeluaran sampai batas bulan terpilih
        $lastDayOfMonth = date('Y-m-t', strtotime("$tahun-$bulan-01"));
        $saldoKumulatif = BukuKas::where('tanggal', '<=', $lastDayOfMonth)
                                  ->selectRaw("SUM(CASE WHEN tipe = 'pemasukan' THEN nominal ELSE -nominal END) as saldo")
                                  ->value('saldo') ?? 0;

        return view('admin.buku-kas.index', compact('items', 'totalPemasukan', 'totalPengeluaran', 'saldoKumulatif', 'bulan', 'tahun'));
    }

    /**
     * Simpan data transaksi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'nominal' => 'required|numeric|min:0',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        BukuKas::create($validated);

        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan ke Buku Kas.');
    }

    /**
     * Update data transaksi.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'tipe' => 'required|in:pemasukan,pengeluaran',
            'nominal' => 'required|numeric|min:0',
            'kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $kas = BukuKas::findOrFail($id);

        // Jika data terhubung dengan donatur, cegah perubahan tipe, nominal, dan kategori donasi di Buku Kas demi konsistensi data
        if ($kas->donatur_id) {
            unset($validated['tipe']);
            unset($validated['nominal']);
            unset($validated['kategori']);
        }

        $kas->update($validated);

        return redirect()->back()->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Hapus data transaksi.
     */
    public function destroy($id)
    {
        $kas = BukuKas::findOrFail($id);
        
        // Hapus donatur terkait jika dihapus dari Buku Kas (opsional, tapi untuk keamanan kita batasi agar jika berasal dari Donatur, dihapus dari menu Donatur saja)
        if ($kas->donatur_id) {
            return redirect()->back()->with('error', 'Transaksi ini terikat dengan data donasi. Silakan hapus atau ubah status transaksi dari menu Manajemen Donasi.');
        }

        $kas->delete();

        return redirect()->back()->with('success', 'Transaksi berhasil dihapus.');
    }

    /**
     * Sinkronisasikan donasi berhasil masa lalu yang belum tercatat.
     */
    public function syncDonasi()
    {
        $donaturBerhasil = Donatur::where('status', 'berhasil')
                                  ->where('jenis_donasi', 'nominal')
                                  ->get();

        $count = 0;
        foreach ($donaturBerhasil as $donatur) {
            // Cek apakah sudah tercatat
            $exists = BukuKas::where('donatur_id', $donatur->id)->exists();
            if (!$exists) {
                BukuKas::create([
                    'tanggal' => $donatur->tanggal_donasi,
                    'tipe' => 'pemasukan',
                    'nominal' => $donatur->jumlah_donasi,
                    'kategori' => 'Donasi',
                    'keterangan' => 'Donasi dari ' . $donatur->nama_donatur,
                    'donatur_id' => $donatur->id,
                ]);
                $count++;
            }
        }

        return redirect()->back()->with('success', "Sinkronisasi berhasil! $count donasi baru ditambahkan ke Buku Kas.");
    }
}
