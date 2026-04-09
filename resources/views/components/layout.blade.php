<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pesantren & Madrasah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50">

    <nav class="bg-white shadow-md fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-emerald-700">LogoPesantren</a>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-600 hover:text-emerald-600 font-medium transition">Beranda</a>
                    <a href="{{ route('pesantren.index') }}" class="text-gray-600 hover:text-emerald-600 font-medium transition">Pesantren</a>
                    <a href="{{ route('madrasah.index') }}" class="text-gray-600 hover:text-emerald-600 font-medium transition">Madrasah</a>
                    <a href="#" class="bg-emerald-600 text-white px-6 py-2 rounded-full font-medium hover:bg-emerald-700 transition shadow-lg shadow-emerald-200">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-20">
        {{ $slot }}
    </main>

    <footer class="bg-gray-900 text-white py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2026 Yayasan Pesantren & Madrasah. Semua Hak Dilindungi.</p>
        </div>
    </footer>

</body>
</html>