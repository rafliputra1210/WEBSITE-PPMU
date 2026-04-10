<x-layout>
    <section class="relative bg-gradient-to-br from-blue-900 via-slate-800 to-teal-900 pt-32 pb-24 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-teal-500/20 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-600/20 rounded-full blur-[100px]"></div>

        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
            <div>
                <span class="inline-block py-1 px-3 rounded-full bg-teal-500/20 text-teal-300 font-semibold text-sm mb-6 border border-teal-500/30 backdrop-blur-sm">
                    ✨ Welcome to the New Era of Learning
                </span>
                <h1 class="text-5xl lg:text-7xl font-bold text-white leading-tight">
                    Empowering <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-blue-400">Future Education</span>
                </h1>
                <p class="mt-6 text-lg text-gray-300 max-w-xl leading-relaxed">
                    Join the ultimate destination for knowledge seekers. Discover world-class courses, expert instructors, and a supportive community to elevate your skills.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 mt-10">
                    <a href="{{ route('pesantren.index') }}" class="bg-teal-500 text-white px-8 py-4 rounded-full font-bold text-lg text-center hover:bg-teal-400 transition shadow-lg shadow-teal-500/30">
                        Jelajahi Pesantren
                    </a>
                    <a href="{{ route('madrasah.index') }}" class="bg-white/10 backdrop-blur-md border border-white/20 text-white px-8 py-4 rounded-full font-bold text-lg text-center hover:bg-white/20 transition">
                        Portal Madrasah ▶
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="relative rounded-3xl overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.3)] border border-white/10">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Students on Campus" class="w-full object-cover h-[500px]">
                </div>
                <div class="absolute -bottom-8 -left-8 bg-white/10 backdrop-blur-xl border border-white/20 p-6 rounded-2xl shadow-xl hidden md:block">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-teal-500 rounded-full flex items-center justify-center text-2xl">🎓</div>
                        <div>
                            <p class="text-white font-bold text-xl">100+</p>
                            <p class="text-teal-200 text-sm">Pengajar Ahli</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white relative -mt-10 z-20 max-w-6xl mx-auto rounded-3xl shadow-xl shadow-blue-900/5 border border-gray-100">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center px-6">
            <div>
                <h3 class="text-4xl font-bold text-slate-800">15K+</h3>
                <p class="text-gray-500 mt-2 font-medium">Santri Aktif</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-slate-800">98%</h3>
                <p class="text-gray-500 mt-2 font-medium">Tingkat Kelulusan</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-slate-800">300+</h3>
                <p class="text-gray-500 mt-2 font-medium">Program Belajar</p>
            </div>
            <div>
                <h3 class="text-4xl font-bold text-slate-800">50+</h3>
                <p class="text-gray-500 mt-2 font-medium">Penghargaan</p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <div class="w-4/5 rounded-3xl overflow-hidden shadow-2xl border-4 border-white relative z-10">
                    <img src="https://images.unsplash.com/photo-1571260899304-425eee4c25ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Campus Life" class="w-full object-cover">
                </div>
                <div class="absolute -bottom-10 right-0 w-3/5 rounded-3xl overflow-hidden shadow-xl border-4 border-white z-20">
                    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Students Learning" class="w-full object-cover">
                </div>
            </div>
            <div>
                <span class="text-sm font-bold text-teal-600 tracking-wider uppercase bg-teal-50 px-3 py-1 rounded-full">Tentang Institusi Kami</span>
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mt-4 leading-tight">
                    Membentuk Pemimpin Masa Depan
                </h2>
                <p class="text-lg text-gray-600 mt-6 leading-relaxed">
                    Educate is committed to transforming education through innovation, global connectivity, and accessible learning. We provide a platform that bridges the gap between ambition and success.
                </p>
                <ul class="mt-8 space-y-4">
                    <li class="flex items-center gap-4 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                        <div class="w-10 h-10 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center text-xl">💡</div>
                        <span class="text-slate-700 font-medium">Kurikulum Modern & Interaktif</span>
                    </li>
                    <li class="flex items-center gap-4 bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                        <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl">🌍</div>
                        <span class="text-slate-700 font-medium">Jaringan Pendidik Global</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Top Trending</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-3">Berita Terkini</h2>
                <p class="text-gray-600 mt-4">Ikuti perkembangan, kegiatan, dan prestasi terbaru dari lingkungan pesantren kami.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg shadow-gray-200/50 border border-gray-100 group hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Web Dev" class="w-full h-56 object-cover">
                        <span class="absolute top-4 right-4 bg-white text-slate-900 px-3 py-1 rounded-full text-sm font-bold shadow-sm">Prestasi</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-teal-600 transition">Santri Meraih Medali Emas</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">Kabar membanggakan datang dari ananda yang berhasil menjuarai lomba tingkat nasional.</p>
                        <hr class="border-gray-100 mb-4">
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-sm text-slate-500">10 Apr 2026</span>
                            <a href="{{ route('pesantren.berita') }}" class="text-teal-600 font-semibold hover:text-teal-700">Baca Berita →</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl overflow-hidden shadow-lg shadow-gray-200/50 border border-gray-100 group hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Code" class="w-full h-56 object-cover">
                        <span class="absolute top-4 right-4 bg-white text-slate-900 px-3 py-1 rounded-full text-sm font-bold shadow-sm">Kegiatan</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-teal-600 transition">Kajian Kitab Akbar Bulanan</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">Menghidupkan tradisi keilmuan pesantren melalui kajian kitab kuning bersama para Kyai.</p>
                        <hr class="border-gray-100 mb-4">
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-sm text-slate-500">08 Apr 2026</span>
                            <a href="{{ route('pesantren.berita') }}" class="text-teal-600 font-semibold hover:text-teal-700">Baca Berita →</a>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl overflow-hidden shadow-lg shadow-gray-200/50 border border-gray-100 group hover:-translate-y-2 transition duration-300">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Business" class="w-full h-56 object-cover">
                        <span class="absolute top-4 right-4 bg-white text-slate-900 px-3 py-1 rounded-full text-sm font-bold shadow-sm">Pengumuman</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-teal-600 transition">Penerimaan Santri Baru Dibuka</h3>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">Segera daftarkan putra-putri Anda. Kuota gelombang pertama sangat terbatas.</p>
                        <hr class="border-gray-100 mb-4">
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-sm text-slate-500">05 Apr 2026</span>
                            <a href="{{ route('pesantren.berita') }}" class="text-teal-600 font-semibold hover:text-teal-700">Baca Berita →</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('pesantren.berita') }}" class="inline-block border-2 border-teal-500 text-teal-600 px-8 py-3 rounded-full font-bold hover:bg-teal-500 hover:text-white transition">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

</x-layout>