<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\PembayaranPpdb;
use App\Models\QrisPpdb;

class PendaftaranController extends Controller
{
    /**
     * Tampilkan form pendaftaran Pesantren dengan data pembayaran
     */
    public function showForm()
    {
        $rekeningList = PembayaranPpdb::where('entitas', 'pesantren')->where('is_active', true)->get();
        $qrisList     = QrisPpdb::where('entitas', 'pesantren')->where('is_active', true)->get();
        return view('pesantren.pendaftaran', compact('rekeningList', 'qrisList'));
    }

    /**
     * Tampilkan form pendaftaran Madrasah dengan data pembayaran
     */
    public function showFormMadrasah()
    {
        $rekeningList = PembayaranPpdb::where('entitas', 'madrasah')->where('is_active', true)->get();
        $qrisList     = QrisPpdb::where('entitas', 'madrasah')->where('is_active', true)->get();
        return view('madrasah.pendaftaran', compact('rekeningList', 'qrisList'));
    }

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

        $pendaftaran = Pendaftaran::create($request->only([
            'nama_lengkap', 'tempat_lahir', 'tanggal_lahir',
            'asal_sekolah', 'mendaftar_ke', 'nama_wali', 'no_wa',
        ]));

        $route = $request->mendaftar_ke == 'madrasah' ? 'madrasah.pendaftaran.pembayaran' : 'pesantren.pendaftaran.pembayaran';

        return redirect()
            ->route($route, $pendaftaran->id)
            ->with('success', 'Data pendaftaran Anda telah berhasil disimpan. Silakan selesaikan proses administrasi di bawah ini.');
    }

    public function storeMadrasah(Request $request)
    {
        return $this->store($request);
    }

    /**
     * Tampilkan halaman pembayaran pendaftaran (Pesantren)
     */
    public function pembayaran($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $rekeningList = PembayaranPpdb::where('entitas', 'pesantren')->where('is_active', true)->get();
        $qrisList     = QrisPpdb::where('entitas', 'pesantren')->where('is_active', true)->get();
        
        return view('pendaftaran_pembayaran', compact('pendaftaran', 'rekeningList', 'qrisList'));
    }

    /**
     * Tampilkan halaman pembayaran pendaftaran (Madrasah)
     */
    public function pembayaranMadrasah($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $rekeningList = PembayaranPpdb::where('entitas', 'madrasah')->where('is_active', true)->get();
        $qrisList     = QrisPpdb::where('entitas', 'madrasah')->where('is_active', true)->get();
        
        return view('pendaftaran_pembayaran', compact('pendaftaran', 'rekeningList', 'qrisList'));
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

    /**
     * Export data pendaftaran ke Excel (CSV)
     */
    public function adminExport(Request $request)
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

        $pendaftarans = $query->get();

        $filename = "data_pendaftaran_" . date('Ymd_His') . ".csv";

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['No', 'Nama Lengkap', 'Tempat Lahir', 'Tanggal Lahir', 'Asal Sekolah', 'Mendaftar Ke', 'Nama Wali', 'No WhatsApp', 'Tanggal Daftar'];

        $callback = function() use($pendaftarans, $columns) {
            $file = fopen('php://output', 'w');
            // Menambahkan BOM agar Excel dapat membaca karakter khusus jika ada (meskipun biasanya CSV comma separator cukup)
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            fputcsv($file, $columns);

            $no = 1;
            foreach ($pendaftarans as $row) {
                fputcsv($file, [
                    $no++,
                    $row->nama_lengkap,
                    $row->tempat_lahir,
                    $row->tanggal_lahir,
                    $row->asal_sekolah,
                    strtoupper($row->mendaftar_ke),
                    $row->nama_wali,
                    // Tambahkan tanda petik tunggal sebelum nomor telp agar Excel tidak mengonversinya ke format scientific/number
                    "'" . $row->no_wa,
                    $row->created_at->format('Y-m-d H:i:s')
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
