@php
    // Mencoba berbagai kemungkinan path di cPanel dan Local
    $paths = [
        public_path('images/surat.jpeg'),
        base_path('../public_html/images/surat.jpeg'),
        $_SERVER['DOCUMENT_ROOT'] . '/images/surat.jpeg',
        public_path('public_html/images/surat.jpeg')
    ];

    $base64 = '';
    $foundPath = null;
    
    foreach ($paths as $p) {
        if (file_exists($p)) {
            $foundPath = $p;
            break;
        }
    }

    if ($foundPath) {
        $type = pathinfo($foundPath, PATHINFO_EXTENSION);
        $data = file_get_contents($foundPath);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    } else {
        // Fallback langsung menggunakan URL (Pastikan setting isRemoteEnabled true pada DOMPDF jika butuh ini)
        $base64 = url('images/surat.jpeg');
    }
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Keuangan PPMU</title>
    <style>
        @page {
            margin: 0;
        }
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            color: #333333;
            font-size: 11pt;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            background-image: url('{{ $base64 }}');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
        }
        .content-wrapper {
            padding: 150px 70px 80px 60px;
        }
        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .header-logo {
            width: 80px;
            text-align: center;
        }
        .header-text {
            text-align: center;
        }
        .header-text h2 {
            margin: 0;
            font-size: 16pt;
            color: #0f4c3a;
            text-transform: uppercase;
            font-weight: bold;
        }
        .header-text h3 {
            margin: 5px 0 0 0;
            font-size: 12pt;
            font-weight: normal;
        }
        .header-text p {
            margin: 5px 0 0 0;
            font-size: 8pt;
            color: #666;
            font-style: italic;
        }
        .double-line {
            border-top: 2px solid #000;
            border-bottom: 1px solid #000;
            height: 3px;
            margin-bottom: 20px;
        }
        .title-section {
            text-align: center;
            margin-bottom: 25px;
        }
        .title-section h1 {
            margin: 0;
            font-size: 14pt;
            font-weight: bold;
            color: #111;
        }
        .title-section p {
            margin: 5px 0 0 0;
            font-size: 11pt;
            color: #555;
        }
        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        .summary-card {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            background-color: #fafafa;
        }
        .summary-card-title {
            font-size: 9pt;
            color: #666;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .summary-card-value {
            font-size: 12pt;
            font-weight: bold;
        }
        .text-pemasukan { color: #2e7d32; }
        .text-pengeluaran { color: #c62828; }
        .text-saldo { color: #1565c0; }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .data-table th {
            background-color: #0f4c3a;
            color: #ffffff;
            font-size: 9.5pt;
            font-weight: bold;
            text-transform: uppercase;
            padding: 8px 10px;
            border: 1px solid #0f4c3a;
        }
        .data-table td {
            padding: 8px 10px;
            font-size: 9.5pt;
            border: 1px solid #dddddd;
        }
        .data-table tr:nth-child(even) td {
            background-color: #fcfcfc;
        }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .fw-bold { font-weight: bold; }

        /* Signature block */
        .signature-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
            page-break-inside: avoid;
        }
        .signature-title {
            font-size: 10pt;
            margin-bottom: 60px;
        }
        .signature-name {
            font-size: 10pt;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="content-wrapper">

    <!-- Judul Laporan -->
    <div class="title-section">
        <h1>LAPORAN BULANAN BUKU KAS DONASI</h1>
        <p>Periode: <strong>{{ \Carbon\Carbon::create()->month((int) $bulan)->isoFormat('MMMM') }} {{ $tahun }}</strong></p>
    </div>

    <!-- Ringkasan Keuangan -->
    <table class="summary-table">
        <tr>
            <td class="summary-card" style="width: 33%;">
                <div class="summary-card-title">Pemasukan Bulan Ini</div>
                <div class="summary-card-value text-pemasukan">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</div>
            </td>
            <td class="summary-card" style="width: 33%;">
                <div class="summary-card-title">Pengeluaran Bulan Ini</div>
                <div class="summary-card-value text-pengeluaran">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</div>
            </td>
            <td class="summary-card" style="width: 33%;">
                <div class="summary-card-title">Sisa Saldo Kas</div>
                <div class="summary-card-value text-saldo">Rp {{ number_format($saldoKumulatif, 0, ',', '.') }}</div>
            </td>
        </tr>
    </table>

    <!-- Rincian Buku Kas -->
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 15%;">Tanggal</th>
                <th style="width: 18%;">Kategori</th>
                <th style="width: 32%;">Keterangan</th>
                <th style="width: 15%; text-align: right;">Pemasukan</th>
                <th style="width: 15%; text-align: right;">Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            @php $currentSaldo = 0; @endphp
            @forelse ($items as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $item->tanggal->format('d/m/Y') }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td class="text-right text-pemasukan">
                        {{ $item->tipe == 'pemasukan' ? 'Rp ' . number_format($item->nominal, 0, ',', '.') : '-' }}
                    </td>
                    <td class="text-right text-pengeluaran">
                        {{ $item->tipe == 'pengeluaran' ? 'Rp ' . number_format($item->nominal, 0, ',', '.') : '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center" style="color: #666; font-style: italic;">
                        Tidak ada transaksi keuangan pada periode ini.
                    </td>
                </tr>
            @endforelse
            <tr style="background-color: #eaeaea; font-weight: bold;">
                <td colspan="4" class="text-right fw-bold">TOTAL BULANAN:</td>
                <td class="text-right text-pemasukan">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
                <td class="text-right text-pengeluaran">Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
            </tr>
            <tr style="background-color: #f1f8e9; font-weight: bold; border-top: 2px solid #0f4c3a;">
                <td colspan="4" class="text-right fw-bold">SISA SALDO KAS KESELURUHANN:</td>
                <td colspan="2" class="text-center text-saldo" style="font-size: 11pt;">
                    Rp {{ number_format($saldoKumulatif, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Tanda Tangan -->
    <table class="signature-table">
        <tr>
            <td style="width: 50%; text-align: center; vertical-align: top;">
                <div class="signature-title">Ketua Panitia</div>
                <br><br><br><br>
                <div class="signature-name">MOHAMAD FUAD</div>
            </td>
            <td style="width: 50%; text-align: center; vertical-align: top;">
                <div class="signature-title">Sekretaris</div>
                <br><br><br><br>
                <div class="signature-name">MUHAMMAD FADIL</div>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding-top: 30px;">
                <div class="signature-title">Mengetahui;<br><strong>Pengasuh PP. MIftahul Ulum</strong></div>
                <br><br><br><br>
                <div class="signature-name">K.H. ABD. MUIZ ALI</div>
            </td>
        </tr>
    </table>
    </div>
</body>
</html>
