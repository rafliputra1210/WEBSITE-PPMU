<x-layout>
    <section class="bg-blue-800 py-20 mt-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Portal Madrasah</h1>
            <p class="text-lg text-blue-100 max-w-2xl mx-auto">Pendidikan formal berstandar nasional dengan keunggulan nilai-nilai islami.</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                
                <a href="{{ route('madrasah.profil') }}" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">🏫</div>
                    <h3 class="font-bold text-gray-800">Profil & Tentang</h3>
                </a>

                <a href="{{ route('madrasah.fasilitas') }}" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">🔬</div>
                    <h3 class="font-bold text-gray-800">Fasilitas Belajar</h3>
                </a>

                <a href="{{ route('madrasah.galeri') }}" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">🏆</div>
                    <h3 class="font-bold text-gray-800">Galeri & Prestasi</h3>
                </a>

                <a href="{{ route('madrasah.berita') }}" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 text-center">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">📢</div>
                    <h3 class="font-bold text-gray-800">Berita Madrasah</h3>
                </a>

                <a href="{{ route('madrasah.pendaftaran') }}" class="col-span-2 group bg-gradient-to-br from-blue-600 to-blue-800 p-6 rounded-2xl shadow-md hover:shadow-xl transition-all text-center">
                    <div class="w-16 h-16 bg-white/20 text-white rounded-xl flex items-center justify-center mx-auto mb-4 text-3xl group-hover:scale-110 transition-transform">🎓</div>
                    <h3 class="font-bold text-white text-lg">Pendaftaran Siswa Baru (PPDB)</h3>
                    <p class="text-blue-100 text-sm mt-2">Daftarkan putra-putri Anda untuk tahun ajaran baru.</p>
                </a>

            </div>
        </div>
    </section>
</x-layout>