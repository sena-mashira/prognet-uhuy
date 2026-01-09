<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAPAK | Platform Peluang Bertumbuh</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('image/logo-tapak.svg') }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <style>
        @keyframes floaty {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .floaty { animation: floaty 6s ease-in-out infinite; }

        /* subtle glow + grain in dark mode */
        .dark body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(900px 500px at 15% 10%, rgba(34, 211, 238, .16), transparent 60%),
                radial-gradient(900px 500px at 85% 30%, rgba(37, 99, 235, .14), transparent 60%),
                radial-gradient(700px 450px at 50% 90%, rgba(99, 102, 241, .10), transparent 60%);
            opacity: .9;
            z-index: 0;
        }
        .dark body::after {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image: repeating-linear-gradient(
                0deg,
                rgba(255,255,255,.03),
                rgba(255,255,255,.03) 1px,
                transparent 1px,
                transparent 3px
            );
            opacity: .06;
            z-index: 0;
        }

        /* ========= Neon hover for cards ========= */
        .neon-card {
            position: relative;
            isolation: isolate;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        /* LIGHT MODE: neon di border aja (tanpa drop shadow) */
        .neon-card:hover {
            box-shadow:
                0 0 0 2px rgba(34, 211, 238, .45),
                0 0 14px rgba(34, 211, 238, .16);
        }

        /* DARK MODE: glow lebih "neon" + depth */
        .dark .neon-card::before {
            content: "";
            position: absolute;
            inset: -2px;
            border-radius: inherit;
            pointer-events: none;
            opacity: 0;
            filter: blur(10px);
            z-index: -1;
            transition: opacity .25s ease;
            background: radial-gradient(circle at 30% 20%,
                rgba(34, 211, 238, .55),
                rgba(37, 99, 235, .38),
                transparent 62%);
        }
        .dark .neon-card:hover::before { opacity: 1; }

        .dark .neon-card:hover {
            box-shadow:
                0 24px 60px rgba(0, 0, 0, .55),
                0 0 0 2px rgba(34, 211, 238, .55),
                0 0 26px rgba(34, 211, 238, .26),
                0 0 60px rgba(37, 99, 235, .18);
        }

        /* ========= Scroll reveal ========= */
        .reveal {
            opacity: 0;
            transform: translateY(18px);
            filter: blur(2px);
            transition: opacity .9s ease, transform .9s ease, filter .9s ease;
            will-change: opacity, transform, filter;
        }
        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
            filter: blur(0);
        }
        .reveal[data-delay="1"] { transition-delay: .08s; }
        .reveal[data-delay="2"] { transition-delay: .16s; }
        .reveal[data-delay="3"] { transition-delay: .24s; }
        .reveal[data-delay="4"] { transition-delay: .32s; }

        @media (prefers-reduced-motion: reduce) {
            .reveal, .reveal.is-visible {
                opacity: 1 !important;
                transform: none !important;
                filter: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body class="bg-white text-gray-900 dark:bg-[#070B1A] dark:text-gray-100 antialiased relative overflow-x-hidden selection:bg-cyan-300/40 selection:text-white">

    <!-- ================= NAVBAR ================= -->
    <nav class="bg-white/80 dark:bg-[#070B1A]/70 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 dark:border-white/10">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between relative z-10">

            {{-- Logo --}}
            <a href="{{ route('landing') }}" class="flex gap-4 items-center">
                <svg width="195" height="191" viewBox="0 0 195 191" xmlns="http://www.w3.org/2000/svg"
                    class="block h-7 w-auto fill-blue-600">
                    <path
                        d="M64.5333 2.6416C55.6 5.70827 47.3333 12.5083 41.8667 21.0416C36.1333 29.9749 34.1333 38.1083 34.9333 49.5749C36.1333 66.3749 37.0667 67.5749 93.2 123.575C121.067 151.308 144.8 174.642 146 175.308C147.2 175.975 149.467 176.108 151.067 175.708C155.733 174.508 195.2 134.242 194.267 131.708C193.2 129.042 188.8 128.908 186.667 131.575C185.733 132.642 184.4 133.575 183.6 133.575C182.8 133.575 183.6 132.108 185.333 130.375C188.667 126.642 188.133 122.908 184.267 122.908C182.933 122.908 180.667 124.108 179.333 125.575C178 127.042 176.533 127.975 176.267 127.575C175.867 127.175 176.933 125.442 178.667 123.575C182 119.975 181.467 116.242 177.467 116.242C176 116.242 174 117.175 172.8 118.242C169.467 121.575 168.667 120.508 172 117.042C175.333 113.442 174.8 109.575 171.067 109.575C169.733 109.575 164.4 113.708 159.333 118.908C154.267 123.975 149.467 128.242 148.8 128.242C146.4 128.242 72 52.9083 70.8 49.1749C68.2667 42.1083 73.0667 35.7083 80.6667 35.7083C89.7333 35.7083 93.6 44.9083 88.4 53.7083L86 57.5749L98.2667 69.8416L110.4 81.9749L114.533 77.4416C116.8 74.9083 120.267 69.5749 122.267 65.5749C125.6 59.0416 126 56.7749 126 45.5749C126 30.2416 123.067 23.3083 112.667 12.7749C100.8 0.908268 81.4667 -3.22507 64.5333 2.6416ZM149.333 156.242C148.267 156.908 145.867 157.442 144 157.442L140.667 157.308L144 156.242C145.867 155.708 148.267 155.175 149.333 155.042C151.067 154.908 151.067 155.042 149.333 156.242Z"
                        fill="inherit" />
                    <path
                        d="M25.6 116.642C2.53333 139.842 0 142.775 0 146.908C0 150.908 2.13333 153.575 19.6 171.175C33.4667 185.175 40.1333 190.908 42.2667 190.908C46.1333 190.908 46.4 186.375 43.0667 182.375C40.6667 179.575 40.6667 179.575 43.4667 181.842C46.5333 184.508 51.3333 185.042 52.8 182.775C53.2 181.975 52.2667 179.442 50.6667 177.175L47.6 173.175L50.8 175.308C57.4667 180.108 62 177.042 57.4667 170.908L54.6667 167.042L58.4 169.175C62.2667 171.442 66.6667 170.908 66.6667 168.108C66.6667 167.308 62.1333 161.842 56.5333 156.108L46.4 145.708L61.3333 130.908L76.4 115.975L63.8667 103.442C57.0667 96.5083 51.3333 90.9083 51.3333 90.9083C51.3333 90.9083 39.7333 102.508 25.6 116.642ZM20 142.508C20 146.242 19.6 147.042 18.6667 145.575C16.9333 142.908 16.9333 137.575 18.6667 137.575C19.4667 137.575 20 139.842 20 142.508Z"
                        fill="inherit" />
                </svg>
                <span class="text-2xl font-black hidden md:block bg-gradient-to-r from-[#2563EB] to-[#22D3EE] bg-clip-text text-transparent">
                    TAPAK
                </span>
            </a>

            <div class="flex items-center gap-2">

                {{-- Dark Mode Toggle --}}
                <div x-data="{
                    theme: localStorage.getItem('theme') || 'light',
                    toggle() {
                        this.theme = this.theme === 'light' ? 'dark' : 'light';
                        localStorage.setItem('theme', this.theme);
                        document.documentElement.classList.toggle('dark', this.theme === 'dark');
                    }
                }" x-init="document.documentElement.classList.toggle('dark', theme === 'dark')">
                    <button @click="toggle"
                        class="p-2 rounded-md bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                        <template x-if="theme === 'light'">
                            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m0 12.728l.707-.707m12.728-.707l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                            </svg>
                        </template>

                        <template x-if="theme === 'dark'">
                            <svg class="w-5 h-5 text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                            </svg>
                        </template>
                    </button>
                </div>

                {{-- Auth --}}
                @auth
                    <a href="{{ route('dashboard') }}">
                        <x-secondary-button>Dashboard</x-secondary-button>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <x-secondary-button>Masuk</x-secondary-button>
                    </a>

                    <a href="{{ route('register') }}">
                        <x-button>Daftar</x-button>
                    </a>
                @endauth
            </div>
        </div>
    </nav>

   <!-- ================= HERO ================= -->
<section class="px-6 py-28 md:py-40 reveal">
  <div class="max-w-7xl mx-auto">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

      <!-- LEFT: Text -->
      <div class="max-w-3xl reveal" data-delay="1">
        <span class="text-sm font-medium text-blue-600 dark:text-blue-400">
          Platform Peluang Terkurasi
        </span>

        <h1 class="mt-6 text-4xl md:text-6xl font-semibold tracking-tight leading-tight">
          Temukan Peluang
          <span class="block text-gray-400 dark:text-gray-500">
            yang Layak Diperjuangkan
          </span>
        </h1>

        <p class="mt-8 text-lg md:text-xl text-gray-600 dark:text-gray-400 leading-relaxed">
          TAPAK membantu mahasiswa dan talenta muda menemukan
          peluang yang relevan, kredibel, dan berdampak —
          tanpa kebisingan.
        </p>

        <div class="mt-12 flex flex-col sm:flex-row gap-4">
          <a href="{{ route('opportunities.index') }}" class="inline-block">
            <x-button>Jelajahi Peluang</x-button>
          </a>

          <a href="#about">
            <x-secondary-button>Tentang TAPAK</x-secondary-button>
          </a>
        </div>
      </div>

      <!-- RIGHT: Image -->
      <div class="flex justify-center lg:justify-end reveal" data-delay="2">
        <!-- LIGHT MODE -->
        <img
          src="{{ asset('image/herolight.svg') }}"
          alt="Ilustrasi TAPAK"
          class="w-full max-w-lg block dark:hidden"
          loading="lazy"
        />

        <!-- DARK MODE -->
        <img
          src="{{ asset('image/herodark.svg') }}"
          alt="Ilustrasi TAPAK"
          class="w-full max-w-lg hidden dark:block"
          loading="lazy"
        />
      </div>

    </div>
  </div>
</section>


    <!-- ================= ABOUT ================= -->
    <section id="about"
      class="px-6 py-24 bg-white dark:bg-gradient-to-b dark:from-[#0A1230] dark:to-[#070B1A] border-t border-gray-200 dark:border-white/10 relative z-10 reveal">
      <div class="max-w-7xl mx-auto">

        <!-- Card -->
        <div
          class="neon-card max-w-4xl mx-auto rounded-2xl border border-gray-200 dark:border-white/10
                 bg-white dark:bg-white/5 dark:backdrop-blur-md
                 px-8 py-12 text-center shadow-sm dark:shadow-[0_10px_40px_rgba(0,0,0,0.35)]
                 ring-1 ring-black/5 dark:ring-white/10
                 transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl reveal">

          <h2 class="text-3xl md:text-4xl font-semibold tracking-tight text-gray-900 dark:text-white">
            Tentang <span class="bg-gradient-to-r from-[#2563EB] to-[#22D3EE] bg-clip-text text-transparent">TAPAK</span>
          </h2>

          <p class="mt-6 text-base md:text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
            TAPAK merupakan platform digital yang menghadirkan informasi, peluang, serta ruang diskusi
            secara terintegrasi. Melalui dashboard yang interaktif, konten blog yang informatif, fitur
            opportunity, dan threads diskusi, TAPAK membantu pengguna mengeksplorasi wawasan serta
            mengembangkan potensi secara efektif.
          </p>
        </div>

      </div>
    </section>

    <!-- ================= FEATURES ================= -->
    <section class="px-6 py-24 bg-white dark:bg-[#070B1A] border-t border-gray-200 dark:border-white/10 relative z-10 reveal">
        <div class="max-w-7xl mx-auto">

            <div class="text-center max-w-2xl mx-auto reveal">
                <h2 class="text-2xl md:text-3xl font-semibold tracking-tight">
                    Apa yang Bisa Dilakukan di TAPAK?
                </h2>
                <p class="mt-3 text-sm md:text-base text-gray-600 dark:text-gray-400">
                    Fitur-fitur utama untuk eksplor peluang & berkembang bareng.
                </p>
            </div>

            <!-- 2 atas 2 bawah -->
            <div class="mt-10 grid grid-cols-2 gap-4 max-w-xl mx-auto">

                <!-- Dashboard -->
                <a href="{{ auth()->check() ? route('dashboard') : route('register') }}"
                    class="reveal neon-card group bg-white dark:bg-[#0A1230] border border-gray-200 dark:border-white/10 rounded-xl p-4
                           ring-1 ring-black/5 dark:ring-white/10
                           transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl hover:ring-cyan-300/30
                           flex flex-col items-center" data-delay="1">
                    <img src="{{ asset('image/dashboard.svg') }}" alt="Dashboard"
                         class="w-full max-w-[160px] h-auto transition duration-300 ease-out group-hover:scale-105"
                         loading="lazy" />
                    <p class="mt-4 text-sm font-semibold text-gray-900 dark:text-gray-100">
                        Dashboard
                    </p>
                </a>

                <!-- Peluang -->
                <a href="{{ auth()->check() ? route('opportunities.index') : route('register') }}"
                    class="reveal neon-card group bg-white dark:bg-[#0A1230] border border-gray-200 dark:border-white/10 rounded-xl p-4
                           ring-1 ring-black/5 dark:ring-white/10
                           transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl hover:ring-cyan-300/30
                           flex flex-col items-center" data-delay="2">
                    <img src="{{ asset('image/opportunity.svg') }}" alt="Peluang"
                         class="w-full max-w-[160px] h-auto transition duration-300 ease-out group-hover:scale-105"
                         loading="lazy" />
                    <p class="mt-4 text-sm font-semibold text-gray-900 dark:text-gray-100">
                        Peluang
                    </p>
                </a>

                <!-- Threads -->
                <a href="{{ auth()->check() ? route('threads.index') : route('register') }}"
                    class="reveal neon-card group bg-white dark:bg-[#0A1230] border border-gray-200 dark:border-white/10 rounded-xl p-4
                           ring-1 ring-black/5 dark:ring-white/10
                           transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl hover:ring-cyan-300/30
                           flex flex-col items-center" data-delay="3">
                    <img src="{{ asset('image/threads.svg') }}" alt="Threads"
                         class="w-full max-w-[160px] h-auto transition duration-300 ease-out group-hover:scale-105"
                         loading="lazy" />
                    <p class="mt-4 text-sm font-semibold text-gray-900 dark:text-gray-100">
                        Threads
                    </p>
                </a>

                <!-- Blog -->
                <a href="{{ auth()->check() ? route('blogs.index') : route('register') }}"
                    class="reveal neon-card group bg-white dark:bg-[#0A1230] border border-gray-200 dark:border-white/10 rounded-xl p-4
                           ring-1 ring-black/5 dark:ring-white/10
                           transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl hover:ring-cyan-300/30
                           flex flex-col items-center" data-delay="4">
                    <img src="{{ asset('image/blogs.svg') }}" alt="Blog"
                         class="w-full max-w-[160px] h-auto transition duration-300 ease-out group-hover:scale-105"
                         loading="lazy" />
                    <p class="mt-4 text-sm font-semibold text-gray-900 dark:text-gray-100">
                        Blog
                    </p>
                </a>

            </div>
        </div>
    </section>

    <!-- ================= OPPORTUNITIES ================= -->
    <section id="opportunities"
        class="bg-gray-50 dark:bg-[#070B1A] px-6 py-24 border-t border-gray-200 dark:border-white/10 relative z-10 reveal">
        <div class="max-w-7xl mx-auto">

            <div class="max-w-2xl mb-16 reveal">
                <h2 class="text-2xl md:text-3xl font-semibold tracking-tight">
                    Peluang Pilihan
                </h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">
                    Disaring berdasarkan relevansi, kredibilitas, dan dampak.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @for ($i = 0; $i < 3; $i++)
                    <article
                        class="reveal neon-card group bg-white dark:bg-[#0A1230] border border-gray-200 dark:border-white/10 rounded-2xl p-8
                               ring-1 ring-black/5 dark:ring-white/10
                               transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl hover:ring-cyan-300/30" data-delay="{{ ($i % 3) + 1 }}">
                        <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold
                                     bg-blue-50 text-blue-700
                                     dark:bg-white/5 dark:text-cyan-200">
                            Beasiswa
                        </span>

                        <h3 class="mt-4 text-xl font-semibold text-gray-900 dark:text-gray-100 transition duration-300 group-hover:text-blue-700 dark:group-hover:text-cyan-200">
                              Program Prestasi Nasional
                        </h3>

                        <p class="mt-4 text-gray-600 dark:text-gray-300">
                            Dukungan finansial dan pengembangan diri bagi mahasiswa aktif.
                        </p>

                        <div class="mt-8 flex justify-between items-center text-sm">
                            <span class="text-gray-500 dark:text-gray-400">Deadline · 12 Mar 2026</span>
                            <a href="#" class="font-semibold text-blue-600 dark:text-blue-400 hover:underline">
                                Detail →
                            </a>
                        </div>
                    </article>
                @endfor
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="border-t border-gray-200 dark:border-white/10 px-6 py-12 bg-white dark:bg-[#070B1A] relative z-10 reveal">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between gap-4 text-sm text-gray-500 dark:text-gray-400">
            <span>© {{ date('Y') }} TAPAK</span>
            <span>Dirancang dengan niat, bukan kebisingan.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
    @livewireScripts

    <script>
      (function () {
        const items = document.querySelectorAll('.reveal');
        if (!items.length) return;

        const observer = new IntersectionObserver((entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-visible');
            } else {
              // biar pas scroll naik/turun bisa fade lagi
              entry.target.classList.remove('is-visible');
            }
          });
        }, {
          threshold: 0.12,
          rootMargin: "0px 0px -10% 0px"
        });

        items.forEach((el) => observer.observe(el));
      })();
    </script>
</body>

</html>
