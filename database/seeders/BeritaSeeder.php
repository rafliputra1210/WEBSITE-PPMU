<?php

namespace Database\Seeders;

use App\Models\Berita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $beritaData = [
            [
                'judul'             => 'Santri Pesantren Raih Juara 1 Musabaqah Tilawatil Quran Tingkat Provinsi',
                'ringkasan'         => 'Ahmad Fauzi, santri kelas 5 program Tahfidz, berhasil meraih juara pertama dalam kompetisi MTQ tingkat Provinsi Jawa Timur yang digelar di Surabaya.',
                'konten'            => '<p>Ahmad Fauzi, santri kelas 5 program Tahfidz di Pesantren kami, berhasil meraih juara pertama dalam kompetisi Musabaqah Tilawatil Quran (MTQ) tingkat Provinsi Jawa Timur yang digelar di Surabaya pada 5–8 April 2026.</p><p>Prestasi membanggakan ini menjadi bukti nyata kualitas program tahfidz dan tilawah yang kami jalankan selama bertahun-tahun. Ahmad Fauzi berlatih setiap hari selama 3 bulan di bawah bimbingan Ustadz Mahmud, pengajar senior kami.</p><p>"Saya bersyukur atas nikmat Allah ini. Semua berkat doa orang tua, bimbingan asatidz, dan dukungan teman-teman di pesantren," ucap Ahmad setelah menerima piala dari gubernur.</p><p>Kepala Pesantren, KH. Abdullah Rahman, menyampaikan kebanggaannya dan mendorong seluruh santri untuk terus meningkatkan kualitas ibadah dan prestasi akademik.</p>',
                'gambar'            => 'https://images.unsplash.com/photo-1584464491033-06628f3a6b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'kategori'          => 'Prestasi',
                'penulis'           => 'Tim Redaksi Pesantren',
                'tanggal_publikasi' => now()->subDays(1)->toDateString(),
                'is_published'      => true,
            ],
            [
                'judul'             => 'Kegiatan PHBI Maulid Nabi Muhammad SAW 1447 H Berlangsung Meriah',
                'ringkasan'         => 'Peringatan Maulid Nabi Muhammad SAW tahun ini diselenggarakan dengan penuh semangat dan dihadiri oleh lebih dari 1.000 santri, wali santri, dan tamu undangan.',
                'konten'            => '<p>Pesantren menyelenggarakan peringatan Maulid Nabi Muhammad SAW 1447 H dengan serangkaian kegiatan yang meriah dan penuh makna. Acara yang berlangsung selama dua hari ini dihadiri lebih dari 1.000 santri, wali santri, serta tamu undangan dari berbagai daerah.</p><p>Rangkaian acara meliputi pawai santri, pembacaan sholawat bersama, lomba kaligrafi, dan puncaknya adalah tausiyah dari ulama kondang KH. Hasyim Muzadi yang membahas tentang pentingnya meneladani akhlak Rasulullah SAW dalam kehidupan modern.</p><p>Kegiatan ini rutin diselenggarakan setiap tahun sebagai bentuk kecintaan warga pesantren terhadap Nabi Muhammad SAW dan sebagai sarana mempererat ukhuwah islamiyah.</p>',
                'gambar'            => 'https://images.unsplash.com/photo-1564121211835-e88c852648ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'kategori'          => 'Kegiatan',
                'penulis'           => 'Humas Pesantren',
                'tanggal_publikasi' => now()->subDays(5)->toDateString(),
                'is_published'      => true,
            ],
            [
                'judul'             => 'Pembangunan Masjid Pesantren Memasuki Tahap Finishing, Target Selesai Pertengahan 2026',
                'ringkasan'         => 'Proyek pembangunan masjid baru pesantren yang mampu menampung 2.000 jamaah kini memasuki tahap finishing. Donasi masyarakat terus mengalir mendukung pembangunan ini.',
                'konten'            => '<p>Pembangunan masjid baru pesantren yang telah dimulai sejak awal tahun 2025 kini memasuki tahap finishing. Masjid berlantai tiga yang mampu menampung hingga 2.000 jamaah ini direncanakan rampung pada pertengahan tahun 2026.</p><p>Ketua Panitia Pembangunan, Ustadz Ridwan, menyampaikan bahwa pekerjaan saat ini meliputi pengecatan, pemasangan ornamen kaligrafi, dan instalasi sistem audio visual yang modern.</p><p>Dana pembangunan berasal dari donasi masyarakat yang terus mengalir dari berbagai penjuru Indonesia. Hingga saat ini, dana yang terkumpul telah mencapai 30% dari total target Rp 500 juta. Pesantren mengajak seluruh masyarakat untuk turut berpartisipasi melalui program Investasi Akhirat.</p>',
                'gambar'            => 'https://images.unsplash.com/photo-1519817650390-64a93db51149?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'kategori'          => 'Pembangunan',
                'penulis'           => 'Tim Redaksi Pesantren',
                'tanggal_publikasi' => now()->subDays(8)->toDateString(),
                'is_published'      => true,
            ],
            [
                'judul'             => '50 Santri Lulus Hafidz 30 Juz di Wisuda Akbar Tahun Ajaran 2025/2026',
                'ringkasan'         => 'Wisuda Akbar Tahfidz tahun ini menjadi momentum bersejarah dengan kelulusan 50 santri hafidz 30 juz, angka tertinggi dalam sejarah pesantren.',
                'konten'            => '<p>Wisuda Akbar Program Tahfidz Al-Quran 30 Juz Tahun Ajaran 2025/2026 resmi digelar di aula utama pesantren. Sebanyak 50 santri diwisuda sebagai hafidz/hafidzah 30 juz — angka tertinggi dalam sejarah pesantren.</p><p>Acara yang dihadiri oleh para orang tua dan undangan ini berlangsung dengan penuh haru dan kebanggaan. Para wisudawan menampilkan bacaan Al-Quran secara bergantian disaksikan ribuan hadirin.</p><p>Direktur Program Tahfidz, Ustadzah Halimah, mengungkapkan bahwa pencapaian luar biasa ini merupakan hasil dari metode pembelajaran yang terus diperbaharui, mulai dari setoran harian, muraja\'ah terstruktur, hingga karantina akhir selama 3 bulan.</p>',
                'gambar'            => 'https://images.unsplash.com/photo-1607453998774-d533f65dac99?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'kategori'          => 'Akademik',
                'penulis'           => 'Tim Redaksi Pesantren',
                'tanggal_publikasi' => now()->subDays(14)->toDateString(),
                'is_published'      => true,
            ],
            [
                'judul'             => 'Workshop Kewirausahaan Santri: Membangun Jiwa Entrepreneur Berbasis Syariah',
                'ringkasan'         => 'Pesantren menyelenggarakan workshop kewirausahaan intensif untuk santri senior, menghadirkan narasumber pengusaha sukses yang juga alumni pesantren.',
                'konten'            => '<p>Program pengembangan diri santri kembali hadir melalui Workshop Kewirausahaan Santri yang diselenggarakan selama dua hari penuh. Kegiatan ini menghadirkan tiga narasumber yang merupakan alumni pesantren yang kini menjadi pengusaha sukses.</p><p>Materi yang disampaikan meliputi konsep bisnis syariah, digital marketing halal, manajemen keuangan islami, dan studi kasus berbagai usaha rintisan yang telah berhasil. Para santri juga diajak praktik langsung membuat proposal bisnis sederhana.</p><p>"Kami ingin santri tidak hanya kuat dalam ilmu agama, tetapi juga siap menghadapi tantangan ekonomi setelah lulus," ujar Kepala Pesantren dalam sambutannya.</p>',
                'gambar'            => 'https://images.unsplash.com/photo-1551836022-deb4988cc6c0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'kategori'          => 'Kegiatan',
                'penulis'           => 'Humas Pesantren',
                'tanggal_publikasi' => now()->subDays(20)->toDateString(),
                'is_published'      => true,
            ],
            [
                'judul'             => 'Pesantren Terima Kunjungan Delegasi Pendidikan Islam dari Malaysia dan Singapura',
                'ringkasan'         => 'Delegasi dari tiga lembaga pendidikan Islam terkemuka di Malaysia dan Singapura berkunjung untuk studi banding dan penjajakan kerja sama.',
                'konten'            => '<p>Pesantren menerima kunjungan kehormatan dari delegasi pendidikan Islam internasional yang terdiri dari perwakilan tiga institusi pendidikan terkemuka dari Malaysia dan Singapura. Kunjungan selama dua hari ini bertujuan untuk studi banding sistem pendidikan integral yang menggabungkan kurikulum modern dengan tradisi pesantren.</p><p>Para delegasi mengunjungi kelas-kelas tahfidz, ruang kajian kitab kuning, laboratorium sains, dan asrama santri. Mereka sangat terkesan dengan metode pembelajaran yang unik dan suasana kehidupan pesantren yang disiplin namun tetap nyaman.</p><p>Kunjungan ini diharapkan menjadi awal dari kerja sama internasional yang lebih erat, termasuk program pertukaran santri dan pengiriman pengajar.</p>',
                'gambar'            => 'https://images.unsplash.com/photo-1529070538774-1843cb3265df?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'kategori'          => 'Internasional',
                'penulis'           => 'Humas Pesantren',
                'tanggal_publikasi' => now()->subDays(25)->toDateString(),
                'is_published'      => true,
            ],
            [
                'judul'             => 'Pendaftaran Santri Baru PPDB 2026/2027 Resmi Dibuka, Kuota Terbatas',
                'ringkasan'         => 'Penerimaan Santri Baru tahun ajaran 2026/2027 resmi dibuka. Tersedia kuota 150 santri mukim untuk program reguler dan tahfidz intensif.',
                'konten'            => '<p>Pesantren resmi membuka pendaftaran Santri Baru (PPDB) Tahun Ajaran 2026/2027. Tersedia kuota 150 santri mukim yang terbagi dalam dua jalur: Program Reguler (100 santri) dan Program Tahfidz Intensif (50 santri).</p><p>Persyaratan pendaftaran meliputi: (1) Lulusan SD/MI/sederajat, (2) Usia maksimal 14 tahun, (3) Mampu membaca Al-Quran, (4) Surat keterangan sehat, (5) Pas foto 3x4 sebanyak 4 lembar, dan (6) Fotokopi akta kelahiran.</p><p>Proses seleksi meliputi tes membaca dan hafalan Al-Quran, tes wawancara, dan tes akademik dasar. Pendaftaran dapat dilakukan secara online melalui website ini atau langsung datang ke kantor pesantren pada hari dan jam kerja.</p><p>Batas akhir pendaftaran: 30 Juni 2026. Pengumuman hasil seleksi: 15 Juli 2026.</p>',
                'gambar'            => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'kategori'          => 'Pengumuman',
                'penulis'           => 'Panitia PPDB',
                'tanggal_publikasi' => now()->subDays(3)->toDateString(),
                'is_published'      => true,
            ],
            [
                'judul'             => 'Tim Futsal Pesantren Juara 2 dalam Turnamen Antar Pesantren Se-Jawa Timur',
                'ringkasan'         => 'Tim futsal kebanggaan pesantren berhasil meraih posisi runner-up dalam turnamen antar pesantren se-Jawa Timur yang diikuti 32 tim.',
                'konten'            => '<p>Tim futsal Pesantren berhasil meraih posisi runner-up (juara 2) dalam turnamen futsal antar pesantren se-Jawa Timur yang berlangsung selama 4 hari di Malang. Turnamen yang diikuti 32 tim ini merupakan ajang bergengsi yang rutin digelar setiap tahun.</p><p>Tim kita yang dilatih oleh Ustadz Bambang berhasil mengalahkan tim-tim kuat sebelum akhirnya harus mengakui keunggulan Pesantren Al-Amin Jombang di babak final dengan skor 2-3.</p><p>"Ini pencapaian luar biasa. Kami bangga dan ini akan jadi motivasi untuk berlatih lebih keras demi juara 1 tahun depan," ujar kapten tim, Rafi Hamdani.</p>',
                'gambar'            => 'https://images.unsplash.com/photo-1547347298-4074fc3086f0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'kategori'          => 'Prestasi',
                'penulis'           => 'Tim Redaksi Pesantren',
                'tanggal_publikasi' => now()->subDays(30)->toDateString(),
                'is_published'      => true,
            ],
            [
                'judul'             => 'Peluncuran Program Beasiswa Santri Berprestasi dari Donatur Luar Negeri',
                'ringkasan'         => 'Yayasan mendapatkan kepercayaan mengelola beasiswa dari diaspora Indonesia di Arab Saudi untuk 20 santri berprestasi dari keluarga kurang mampu.',
                'konten'            => '<p>Yayasan Pesantren mendapat kepercayaan besar dari komunitas diaspora Indonesia di Arab Saudi untuk mengelola program beasiswa bagi santri berprestasi dari keluarga kurang mampu. Program perdana ini menyasar 20 santri untuk tahun ajaran 2026/2027.</p><p>Beasiswa mencakup biaya mondok penuh (SPP, asrama, makan) selama 3 tahun dan dilengkapi dengan tunjangan buku dan perlengkapan belajar. Syarat penerima meliputi hafalan minimal 10 juz, nilai akademik di atas rata-rata, dan berasal dari keluarga yang membutuhkan.</p><p>Ketua Yayasan menyampaikan apresiasi yang setinggi-tingginya kepada para donatur dan berkomitmen untuk mengelola kepercayaan ini dengan sebaik-baiknya dan penuh transparansi.</p>',
                'gambar'            => 'https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'kategori'          => 'Beasiswa',
                'penulis'           => 'Humas Pesantren',
                'tanggal_publikasi' => now()->subDays(35)->toDateString(),
                'is_published'      => true,
            ],
        ];

        foreach ($beritaData as $data) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['judul']);
            Berita::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
