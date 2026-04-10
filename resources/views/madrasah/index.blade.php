<x-layout>
    <section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-indigo-900 py-32 overflow-hidden mt-10">
        <div class="absolute top-[-20%] left-[10%] w-[500px] h-[500px] bg-blue-500/20 rounded-full blur-[150px] pointer-events-none"></div>
        <div class="absolute bottom-[-30%] right-[-10%] w-[400px] h-[400px] bg-indigo-500/30 rounded-full blur-[120px] pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10">
            <span class="inline-block py-1 px-4 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-blue-100 text-sm font-medium mb-6">
                Madrasah Unggulan Terpadu
            </span>
            <h1 class="text-5xl md:text-6xl font-bold mb-6 drop-shadow-lg">Portal Madrasah</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Menyediakan pendidikan formal berstandar nasional yang dipadukan dengan keunggulan nilai-nilai islami dan teknologi modern.
            </p>
        </div>
    </section>

    <section class="py-20 bg-slate-50 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <a href="{{ route('madrasah.profil') }}" class="group bg-white p-8 rounded-3xl shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 hover:shadow-xl hover:shadow-blue-900/5 hover:-translate-y-2 transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-4xl group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">🏫</div>
                    <h3 class="font-bold text-slate-800 text-lg">Profil Madrasah</h3>
                    <p class="text-sm text-slate-500 mt-2">Visi, misi, dan identitas madrasah.</p>
                </a>

                <a href="{{ route('madrasah.fasilitas') }}" class="group bg-white p-8 rounded-3xl shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 hover:shadow-xl hover:shadow-blue-900/5 hover:-translate-y-2 transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-4xl group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">🔬</div>
                    <h3 class="font-bold text-slate-800 text-lg">Fasilitas Belajar</h3>
                    <p class="text-sm text-slate-500 mt-2">Laboratorium dan sarana pendukung.</p>
                </a>

                <a href="{{ route('madrasah.galeri') }}" class="group bg-white p-8 rounded-3xl shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 hover:shadow-xl hover:shadow-blue-900/5 hover:-translate-y-2 transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-4xl group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">🏆</div>
                    <h3 class="font-bold text-slate-800 text-lg">Galeri Prestasi</h3>
                    <p class="text-sm text-slate-500 mt-2">Kumpulan medali dan kejuaraan siswa.</p>
                </a>

                <a href="{{ route('madrasah.berita') }}" class="group bg-white p-8 rounded-3xl shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-gray-100 hover:shadow-xl hover:shadow-blue-900/5 hover:-translate-y-2 transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 text-4xl group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">📢</div>
                    <h3 class="font-bold text-slate-800 text-lg">Berita & Artikel</h3>
                    <p class="text-sm text-slate-500 mt-2">Informasi akademik dan non-akademik.</p>
                </a>

                <a href="{{ route('madrasah.pendaftaran') }}" class="lg:col-span-4 group relative overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-700 p-10 rounded-3xl shadow-xl hover:shadow-2xl hover:shadow-blue-600/30 transition-all duration-300 flex flex-col md:flex-row items-center justify-between border border-blue-500/50 mt-4">
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10 mix-blend-overlay"></div>
                    
                    <div class="relative z-10 flex items-center gap-6 mb-6 md:mb-0 text-center md:text-left">
                        <div class="hidden md:flex w-24 h-24 bg-white/20 backdrop-blur-md text-white rounded-full items-center justify-center text-5xl shadow-inner border border-white/30">🎓</div>
                        <div>
                            <h3 class="font-bold text-white text-3xl">Penerimaan Peserta Didik Baru (PPDB)</h3>
                            <p class="text-blue-100 mt-2 text-lg">Daftarkan putra-putri Anda untuk tahun ajaran baru secara online dengan mudah dan cepat.</p>
                        </div>
                    </div>
                    
                    <div class="relative z-10 shrink-0">
                        <span class="inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-blue-700 bg-white rounded-full hover:bg-blue-50 transition-colors shadow-lg group-hover:scale-105 transform duration-300">
                            Daftar Sekarang →
                        </span>
                    </div>
                </a>

            </div>
        </div>
    </section>
</x-layout>