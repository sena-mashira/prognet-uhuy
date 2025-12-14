<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAPAK | Langkah Awal Menuju Masa Depan</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white antialiased">
    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <div class="flex items-center space-x-2 flex-shrink-0">
                    
                   <img src="{{ asset('image/tapaklogo.jpeg') }}" alt="Logo TAPAK" class="h-16 w-auto, rounded-full">
                    <span class="text-3xl font-extrabold tracking-wider text-blue-800">TAPAK</span>
                </div>
                <div class="flex items-center space-x-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-blue-700 font-semibold transition duration-150">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-700 font-medium transition duration-150">Login</a>
                        
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2.5 bg-sky-600 text-white font-semibold rounded-lg shadow-md hover:bg-sky-800 transition duration-300">
                                Mulai Menapak
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-sky-600 text-white py-24 sm:py-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-90 bg-gradient-to-br from-sky-500 to-blue-700"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-6xl sm:text-7xl font-extrabold tracking-tight leading-tight">
                TAPAK
            </h1>
            <h1 class="text-6xl sm:text-7xl font-extrabold tracking-tight leading-tight">
                Langkah Awal <span class="text-sky-200">Masa Depan Anda</span>
            </h1>
            <p class="mt-6 text-xl text-sky-200 max-w-3xl mx-auto">
                Wadah informasi terpercaya yang memandu jejak langkah akademik dan karier Anda. Kejelasan, Profesionalisme, dan Optimisme dalam setiap tapak.
            </p>
            <div class="mt-12">
                <a href="{{ route('dashboard') }}" class="inline-block px-10 py-4 text-lg font-bold rounded-xl 
                    
                    /* Kelas Glassmorphism */
                    bg-white/30 backdrop-blur-sm border border-white/50 
                    
                    text-white shadow-xl hover:bg-white/40 transform hover:scale-105 transition duration-300 ease-in-out">
                    Eksplorasi Peluang Sekarang &rarr;
                </a>
            </div>
        </div>
    </header>

    <main class="py-16 sm:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
              <h1 class="text-3xl text-blue-600 font-bold tracking-wide">FILOSOFI TAPAK</h1> 
                <p class="mt-2 text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">
                    Jejak Langkah yang Kuat dan Terarah
                </p>
            </div>

            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="p-8 bg-white rounded-xl shadow-lg border-t-4 border-blue-600 transform hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 flex items-center">Profesionalisme & Kepercayaan</h3>
                    <p class="mt-4 text-gray-600">Platform kami dibangun di atas integritas dan data terperinci, memastikan setiap langkah yang Anda ambil adalah langkah yang dapat diandalkan.</p>
                </div>
                <div class="p-8 bg-white rounded-xl shadow-lg border-t-4 border-blue-600 transform hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 flex items-center">Mengarahkan Kemajuan</h3>
                    <p class="mt-4 text-gray-600">Kami fokus pada inovasi dan teknologi untuk memberikan panduan yang paling relevan, mendorong Anda maju tanpa hambatan.</p>
                </div>
                <div class="p-8 bg-white rounded-xl shadow-lg border-t-4 border-blue-600 transform hover:shadow-2xl transition duration-300">
                    <h3 class="text-2xl font-bold text-gray-900 flex items-center">Kejelasan Tujuan</h3>
                    <p class="mt-4 text-gray-600">Dari beasiswa hingga peluang karier, kami menyediakan informasi yang jelas agar Anda berani mengambil inisiatif pertama (tapak kecil).</p>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-2xl font-extrabold tracking-wider text-blue-500 block mb-2">TAPAK</span>
            <p class="text-gray-400">&copy; {{ date('Y') }} TAPAK. Semua Hak Cipta Dilindungi. Sebuah Langkah Awal.</p>
        </div>
    </footer>

</body>
</html>