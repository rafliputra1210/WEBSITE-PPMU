<x-layout>
    <section class="bg-emerald-800 py-20 mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Portal Pesantren</h1>
            <p class="text-lg text-emerald-100 max-w-2xl mx-auto">Membentuk generasi qurani yang mandiri, berilmu, dan berakhlakul karimah.</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                <a href="{{ route('pesantren.profil') }}" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">📖</div>
                    <h3 class="font-bold text-gray-800">Profil & Tentang</h3>
                </a>

                <a href="{{ route('pesantren.fasilitas') }}" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">🏢</div>
                    <h3 class="font-bold text-gray-800">Fasilitas</h3>
                </a>

                <a href="{{ route('pesantren.galeri') }}" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">📸</div>
                    <h3 class="font-bold text-gray-800">Galeri & Prestasi</h3>
                </a>

                <a href="{{ route('pesantren.berita') }}" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">📰</div>
                    <h3 class="font-bold text-gray-800">Berita Pesantren</h3>
                </a>

                <a href="{{ route('pesantren.donasi') }}" class="group bg-gradient-to-br from-emerald-600 to-emerald-800 p-6 rounded-2xl shadow-md hover:shadow-xl transition-all text-center lg:col-span-2">
                    <div class="w-16 h-16 bg-white/20 text-white rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">🤲</div>
                    <h3 class="font-bold text-white text-lg">Investasi Akhirat</h3>
                    <p class="text-emerald-100 text-sm mt-2">Salurkan donasi dan infaq terbaik Anda.</p>
                </a>

                <a href="{{ route('pesantren.pendaftaran') }}" class="group bg-gradient-to-br from-amber-500 to-orange-500 p-6 rounded-2xl shadow-md hover:shadow-xl transition-all text-center lg:col-span-2">
                    <div class="w-16 h-16 bg-white/20 text-white rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">📝</div>
                    <h3 class="font-bold text-white text-lg">Pendaftaran Santri Baru</h3>
                    <p class="text-amber-50 text-sm mt-2">Bergabunglah bersama keluarga besar kami.</p>
                </a>

            </div>
        </div>
    </section>
</x-layout>