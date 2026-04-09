<x-layout>
    <section class="relative bg-emerald-900 text-white overflow-hidden">
        <div class="absolute inset-0 bg-black/40 z-10"></div>
        <img src="https://images.unsplash.com/photo-1542820229-081e0c12af0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Background" class="absolute inset-0 w-full h-full object-cover opacity-60">

        <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 lg:py-48 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight mb-6">
                Membangun Generasi Cerdas & Berakhlak Mulia
            </h1>
            <p class="mt-4 text-xl md:text-2xl text-emerald-100 max-w-3xl mx-auto mb-10">
                Pusat pendidikan Islam terpadu yang menggabungkan keunggulan Pesantren modern dan kurikulum Madrasah berprestasi.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('pesantren.index') }}" class="bg-white text-emerald-900 px-8 py-4 rounded-full font-bold text-lg hover:bg-gray-100 transition shadow-xl">
                    Jelajahi Pesantren
                </a>
                <a href="{{ route('madrasah.index') }}" class="border-2 border-white text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-emerald-900 transition shadow-xl">
                    Informasi Madrasah
                </a>
            </div>
        </div>
    </section>
</x-layout>