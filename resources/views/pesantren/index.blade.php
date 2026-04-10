<x-layout>
    <section class="relative bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-900 py-32 overflow-hidden mt-10">
        <div class="absolute top-[-50%] left-[-10%] w-96 h-96 bg-emerald-500/30 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-96 h-96 bg-teal-400/20 rounded-full blur-[100px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
            <span class="inline-block py-1 px-4 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-emerald-100 text-sm font-medium mb-6">
                Lembaga Pendidikan Islam
            </span>
            <h1 class="text-5xl md:text-6xl font-bold mb-6 drop-shadow-md">Portal Pesantren</h1>
            <p class="text-xl text-emerald-100/90 max-w-2xl mx-auto font-light leading-relaxed">
                Membentuk generasi qurani yang mandiri, berilmu, modern, dan berakhlakul karimah untuk menyongsong masa depan.
            </p>
        </div>
    </section>

    <section class="py-20 bg-gray-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <a href="{{ route('pesantren.profil') }}" class="group bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:shadow-[0_8px_30px_rgba(16,185,129,0.15)] hover:-translate-y-2 transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-100 to-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-4xl shadow-inner group-hover:scale-110 transition-transform">📖</div>
                    <h3 class="font-bold text-gray-800 text-lg">Profil & Tentang</h3>
                    <p class="text-sm text-gray-500 mt-2">Mengenal sejarah dan visi misi kami.</p>
                </a>

                <a href="{{ route('pesantren.fasilitas') }}" class="group bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:shadow-[0_8px_30px_rgba(16,185,129,0.15)] hover:-translate-y-2 transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-100 to-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-4xl shadow-inner group-hover:scale-110 transition-transform">🏢</div>
                    <h3 class="font-bold text-gray-800 text-lg">Fasilitas</h3>
                    <p class="text-sm text-gray-500 mt-2">Sarana pendukung belajar santri.</p>
                </a>

                <a href="{{ route('pesantren.galeri') }}" class="group bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:shadow-[0_8px_30px_rgba(16,185,129,0.15)] hover:-translate-y-2 transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-100 to-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-4xl shadow-inner group-hover:scale-110 transition-transform">📸</div>
                    <h3 class="font-bold text-gray-800 text-lg">Galeri Prestasi</h3>
                    <p class="text-sm text-gray-500 mt-2">Dokumentasi kegiatan dan pencapaian.</p>
                </a>

                <a href="{{ route('pesantren.berita') }}" class="group bg-white/80 backdrop-blur-xl p-8 rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-white hover:shadow-[0_8px_30px_rgba(16,185,129,0.15)] hover:-translate-y-2 transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-emerald-100 to-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-4xl shadow-inner group-hover:scale-110 transition-transform">📰</div>
                    <h3 class="font-bold text-gray-800 text-lg">Berita Pesantren</h3>
                    <p class="text-sm text-gray-500 mt-2">Informasi dan pengumuman terbaru.</p>
                </a>

                <a href="{{ route('pesantren.donasi') }}" class="group relative overflow-hidden bg-gradient-to-br from-emerald-600 to-teal-800 p-8 rounded-3xl shadow-lg hover:shadow-2xl hover:shadow-emerald-600/40 hover:-translate-y-1 transition-all duration-300 sm:col-span-2 flex items-center gap-6 text-left border border-emerald-500/30">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full blur-2xl transform translate-x-1/2 -translate-y-1/2"></div>
                    <div class="w-20 h-20 shrink-0 bg-white/20 backdrop-blur-md text-white rounded-2xl flex items-center justify-center text-4xl group-hover:scale-110 transition-transform shadow-inner">🤲</div>
                    <div>
                        <h3 class="font-bold text-white text-2xl">Investasi Akhirat</h3>
                        <p class="text-emerald-100 mt-2">Salurkan donasi, infaq, dan sedekah terbaik Anda untuk pengembangan pendidikan Islam.</p>
                    </div>
                </a>

                <a href="{{ route('pesantren.pendaftaran') }}" class="group relative overflow-hidden bg-gradient-to-br from-amber-500 to-orange-600 p-8 rounded-3xl shadow-lg hover:shadow-2xl hover:shadow-amber-500/40 hover:-translate-y-1 transition-all duration-300 sm:col-span-2 flex items-center gap-6 text-left border border-amber-400/30">
                    <div class="absolute bottom-0 right-0 w-40 h-40 bg-white/20 rounded-full blur-2xl transform translate-x-1/3 translate-y-1/3"></div>
                    <div class="w-20 h-20 shrink-0 bg-white/20 backdrop-blur-md text-white rounded-2xl flex items-center justify-center text-4xl group-hover:scale-110 transition-transform shadow-inner">📝</div>
                    <div>
                        <h3 class="font-bold text-white text-2xl">Pendaftaran Santri</h3>
                        <p class="text-amber-50 mt-2">Bergabunglah bersama keluarga besar kami. Pendaftaran santri baru tahun ajaran 2026 telah dibuka.</p>
                    </div>
                </a>

            </div>
        </div>
    </section>
</x-layout>