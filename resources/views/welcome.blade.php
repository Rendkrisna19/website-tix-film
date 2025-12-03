<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIX ID - Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .bg-tix-dark { background-color: #1A2C50; }
        .text-tix-dark { color: #1A2C50; }
        .bg-tix-gold { background-color: #FFBE00; }
        .text-tix-gold { color: #FFBE00; }
    </style>
</head>
<body class="bg-white font-sans antialiased">

    <nav class="bg-white shadow-sm fixed w-full z-50 top-0 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="/" class="flex items-center gap-1">
                    <span class="text-4xl font-black text-tix-dark tracking-tighter">TIX</span>
                    <span class="text-4xl font-black text-tix-gold tracking-tighter">ID</span>
                </a>

                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ route('user.home') }}" class="text-tix-dark font-bold hover:underline">
                            Buka Aplikasi <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="text-gray-600 font-semibold hover:text-tix-dark">Daftar</a>
                        <a href="{{ route('login') }}" class="bg-tix-dark text-white px-6 py-2.5 rounded-full font-bold hover:opacity-90 transition shadow-lg shadow-blue-900/20">
                            Masuk
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-32 pb-16 bg-gradient-to-b from-[#F5F7FA] to-white">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h1 class="text-5xl md:text-6xl font-black text-tix-dark leading-tight mb-6">
                    SEWA TIKET<br><span class="text-tix-gold">TANPA ANTRI</span>
                </h1>
                <p class="text-gray-500 text-lg mb-8 leading-relaxed max-w-md">
                    Nikmati kemudahan memesan tiket bioskop Cinema XXI, CGV, dan Cinépolis langsung dari smartphone kamu.
                </p>
                <a href="{{ route('login') }}" class="inline-block bg-tix-gold text-tix-dark px-8 py-4 rounded-full font-bold text-lg hover:shadow-xl transition transform hover:-translate-y-1">
                    Pesan Sekarang
                </a>
            </div>
            <div class="md:w-1/2 relative">
                <div class="relative z-10 grid grid-cols-2 gap-4 transform rotate-[-5deg]">
                    @foreach($movies->take(2) as $heroMovie)
                    <img src="{{ asset('storage/' . $heroMovie->poster) }}" class="rounded-xl shadow-2xl w-full object-cover h-64 md:h-80 border-4 border-white">
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-bold text-tix-dark">Sedang Tayang</h2>
                    <p class="text-gray-500 mt-2">Film-film pilihan terbaik minggu ini.</p>
                </div>
                <a href="{{ route('login') }}" class="text-tix-dark font-bold hover:underline">Lihat Semua film</a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @forelse($movies as $movie)
                <div class="group">
                    <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                        <img src="{{ asset('storage/' . $movie->poster) }}" alt="{{ $movie->title }}" class="w-full h-[380px] object-cover transition transform group-hover:scale-105 duration-500">
                        <a href="{{ route('login') }}" class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                            <span class="bg-tix-gold text-tix-dark px-6 py-2 rounded-full font-bold transform translate-y-4 group-hover:translate-y-0 transition">Beli Tiket</span>
                        </a>
                    </div>
                    <h3 class="font-bold text-lg text-tix-dark truncate">{{ $movie->title }}</h3>
                    <p class="text-gray-500 text-sm">{{ $movie->genre }}</p>
                </div>
                @empty
                <div class="col-span-full text-center py-10 text-gray-400">Belum ada film yang ditambahkan Admin.</div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="py-16 bg-gray-50 border-t">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-tix-dark mb-10">TIX Spotlight & Promo</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($spotlights as $promo)
                <a href="{{ route('login') }}" class="block group">
                    <div class="overflow-hidden rounded-xl shadow-md bg-white">
                        <img src="{{ asset('storage/' . $promo->banner) }}" alt="{{ $promo->title }}" class="w-full h-48 object-cover transition transform group-hover:scale-105 duration-500">
                        <div class="p-5">
                            <h3 class="font-bold text-xl text-tix-dark mb-2 group-hover:text-blue-900">{{ $promo->title }}</h3>
                            <p class="text-gray-500 text-sm line-clamp-2">{{ $promo->description }}</p>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center text-gray-400">Belum ada promo aktif.</div>
                @endforelse
            </div>
        </div>
    </div>

    <footer class="bg-tix-dark text-white py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h2 class="text-2xl font-bold mb-4">TIX ID</h2>
            <p class="text-gray-400">&copy; 2025 TIX ID Clone. Company Profile & Booking System.</p>
        </div>
    </footer>

</body>
</html>