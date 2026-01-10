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
            50% { transform: translateY(-20px); }
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

        /* ========= LIGHT MODE: soft neon gradient background (ga bikin sakit mata) ========= */
        body::before{
            content:"";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(700px 420px at 12% 8%, rgba(34,211,238,.10), transparent 62%),
                radial-gradient(720px 460px at 88% 18%, rgba(37,99,235,.08), transparent 62%),
                radial-gradient(760px 520px at 50% 92%, rgba(99,102,241,.06), transparent 65%),
                linear-gradient(180deg, rgba(255,255,255,1), rgba(249,250,251,1));
            opacity: .95;
            z-index: 0;
        }

        /* ========= Neon hover for cards ========= */
        .neon-card{
            position: relative;
            isolation: isolate;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        /* ===== LIGHT MODE: glow halus (border neon + sedikit aura) ===== */
        .neon-card::before{
            content:"";
            position:absolute;
            inset:-2px;
            border-radius: inherit;
            pointer-events:none;
            opacity:0;
            filter: blur(10px);
            z-index:-1;
            transition: opacity .25s ease;
            background: radial-gradient(circle at 30% 20%,
                rgba(34, 211, 238, .22),
                rgba(37, 99, 235, .14),
                transparent 62%);
        }
        .neon-card:hover::before{ opacity:.7; }

        .neon-card:hover{
            box-shadow:
                0 0 0 2px rgba(34, 211, 238, .45),
                0 10px 28px rgba(37, 99, 235, .10),
                0 0 18px rgba(34, 211, 238, .12);
        }

        /* ===== DARK MODE: tetap lebih kuat + ada depth hitam ===== */
        .dark .neon-card::before{
            background: radial-gradient(circle at 30% 20%,
                rgba(34, 211, 238, .55),
                rgba(37, 99, 235, .38),
                transparent 62%);
        }
        .dark .neon-card:hover{
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
<nav class="bg-white/80 dark:bg-[#070B1A]/70 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 dark:border-white/10 relative overflow-hidden">
    <!-- glow halus navbar -->
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute -top-10 left-1/2 -translate-x-1/2 h-24 w-[640px] rounded-full blur-3xl opacity-50 dark:opacity-80
                    bg-[radial-gradient(circle_at_center,rgba(34,211,238,0.14),transparent_62%)]
                    dark:bg-[radial-gradient(circle_at_center,rgba(34,211,238,0.22),transparent_62%)]"></div>
        <div class="absolute inset-0 opacity-[0.04] dark:opacity-[0.08]"
             style="background-image: linear-gradient(to right, rgba(0,0,0,.10) 1px, transparent 1px); background-size: 42px 42px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between relative z-10">

      {{-- Logo --}}
<a href="{{ route('landing') }}" class="flex gap-4 items-center group">
    <svg width="195" height="191" viewBox="0 0 195 191" xmlns="http://www.w3.org/2000/svg"
        class="block h-7 w-auto
               fill-blue-600 dark:fill-cyan-300
               transition duration-300
               group-hover:scale-[1.03]
               group-hover:drop-shadow-[0_0_18px_rgba(34,211,238,0.35)]">
        <path
            d="M64.5333 2.6416C55.6 5.70827 47.3333 12.5083 41.8667 21.0416C36.1333 29.9749 34.1333 38.1083 34.9333 49.5749C36.1333 66.3749 37.0667 67.5749 93.2 123.575C121.067 151.308 144.8 174.642 146 175.308C147.2 175.975 149.467 176.108 151.067 175.708C155.733 174.508 195.2 134.242 194.267 131.708C193.2 129.042 188.8 128.908 186.667 131.575C185.733 132.642 184.4 133.575 183.6 133.575C182.8 133.575 183.6 132.108 185.333 130.375C188.667 126.642 188.133 122.908 184.267 122.908C182.933 122.908 180.667 124.108 179.333 125.575C178 127.042 176.533 127.975 176.267 127.575C175.867 127.175 176.933 125.442 178.667 123.575C182 119.975 181.467 116.242 177.467 116.242C176 116.242 174 117.175 172.8 118.242C169.467 121.575 168.667 120.508 172 117.042C175.333 113.442 174.8 109.575 171.067 109.575C169.733 109.575 164.4 113.708 159.333 118.908C154.267 123.975 149.467 128.242 148.8 128.242C146.4 128.242 72 52.9083 70.8 49.1749C68.2667 42.1083 73.0667 35.7083 80.6667 35.7083C89.7333 35.7083 93.6 44.9083 88.4 53.7083L86 57.5749L98.2667 69.8416L110.4 81.9749L114.533 77.4416C116.8 74.9083 120.267 69.5749 122.267 65.5749C125.6 59.0416 126 56.7749 126 45.5749C126 30.2416 123.067 23.3083 112.667 12.7749C100.8 0.908268 81.4667 -3.22507 64.5333 2.6416ZM149.333 156.242C148.267 156.908 145.867 157.442 144 157.442L140.667 157.308L144 156.242C145.867 155.708 148.267 155.175 149.333 155.042C151.067 154.908 151.067 155.042 149.333 156.242Z"
            fill="inherit" />
        <path
            d="M25.6 116.642C2.53333 139.842 0 142.775 0 146.908C0 150.908 2.13333 153.575 19.6 171.175C33.4667 185.175 40.1333 190.908 42.2667 190.908C46.1333 190.908 46.4 186.375 43.0667 182.375C40.6667 179.575 40.6667 179.575 43.4667 181.842C46.5333 184.508 51.3333 185.042 52.8 182.775C53.2 181.975 52.2667 179.442 50.6667 177.175L47.6 173.175L50.8 175.308C57.4667 180.108 62 177.042 57.4667 170.908L54.6667 167.042L58.4 169.175C62.2667 171.442 66.6667 170.908 66.6667 168.108C66.6667 167.308 62.1333 161.842 56.5333 156.108L46.4 145.708L61.3333 130.908L76.4 115.975L63.8667 103.442C57.0667 96.5083 51.3333 90.9083 51.3333 90.9083C51.3333 90.9083 39.7333 102.508 25.6 116.642ZM20 142.508C20 146.242 19.6 147.042 18.6667 145.575C16.9333 142.908 16.9333 137.575 18.6667 137.575C19.4667 137.575 20 139.842 20 142.508Z"
            fill="inherit" />
    </svg>

    <span class="text-2xl font-black hidden md:block
                 bg-gradient-to-r from-[#2563EB] to-[#22D3EE] bg-clip-text text-transparent
                 transition duration-300 group-hover:drop-shadow-[0_0_18px_rgba(34,211,238,0.28)]">
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
                    class="p-2 rounded-xl bg-white/70 dark:bg-white/5 backdrop-blur
                           border border-gray-200 dark:border-white/10
                           shadow-sm hover:shadow-md
                           transition duration-300 ease-out
                           hover:border-cyan-300/50 dark:hover:border-cyan-300/30
                           hover:shadow-[0_0_0_2px_rgba(34,211,238,0.18)]
                           dark:hover:shadow-[0_0_0_2px_rgba(34,211,238,0.12)]">

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
                <a href="{{ route('dashboard') }}"
                   class="transition duration-300 hover:translate-y-[-1px]">
                    <x-secondary-button>Dashboard</x-secondary-button>
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="transition duration-300 hover:translate-y-[-1px]">
                    <x-secondary-button>Masuk</x-secondary-button>
                </a>

                <a href="{{ route('register') }}"
                   class="transition duration-300 hover:translate-y-[-1px]">
                    <x-button>Daftar</x-button>
                </a>
            @endauth
        </div>
    </div>

    <!-- garis neon tipis bawah -->
    <div class="pointer-events-none absolute bottom-0 left-0 right-0 h-px opacity-70
                bg-gradient-to-r from-transparent via-cyan-400/40 to-transparent
                dark:via-cyan-300/25"></div>
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
          Tempat Akses 
          <span class="block text-gray-400 dark:text-gray-500">
            Peluang Akademik dan Karier
          </span>
        </h1>

        <p class="mt-8 text-lg md:text-xl text-gray-600 dark:text-gray-400 leading-relaxed">
        Temukan Peluang, Insight
        & Ruang Diskusi dalam Satu Platform Digital
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
          class="w-full max-w-lg block dark:hidden floaty"
          loading="lazy"
        />

        <!-- DARK MODE -->
        <img
          src="{{ asset('image/herodark.svg') }}"
          alt="Ilustrasi TAPAK"
          class="w-full max-w-lg hidden dark:block floaty"
          loading="lazy"
        />
      </div>

    </div>
  </div>
</section>


    <!-- ================= ABOUT ================= -->
<section id="about"
  class="px-6 py-24 bg-gray-50 dark:bg-[#070B1A] border-t border-gray-200 dark:border-white/10 relative z-10 overflow-hidden reveal">

  <!-- glow dekor (halus biar gak sakit mata) -->
  <div class="pointer-events-none absolute inset-0">
    <div class="absolute -top-28 left-1/2 -translate-x-1/2 h-72 w-[760px] rounded-full blur-3xl opacity-70 dark:opacity-90
                bg-[radial-gradient(circle_at_center,rgba(34,211,238,0.18),transparent_60%)]
                dark:bg-[radial-gradient(circle_at_center,rgba(34,211,238,0.22),transparent_60%)]"></div>
    <div class="absolute -bottom-32 right-[-120px] h-72 w-72 rounded-full blur-3xl opacity-60 dark:opacity-80
                bg-[radial-gradient(circle_at_center,rgba(37,99,235,0.14),transparent_60%)]
                dark:bg-[radial-gradient(circle_at_center,rgba(37,99,235,0.20),transparent_60%)]"></div>
    <div class="absolute inset-0 opacity-[0.06] dark:opacity-[0.10]"
         style="background-image: radial-gradient(circle, rgba(0,0,0,.12) 1px, transparent 1px); background-size: 18px 18px;"></div>
  </div>

  <div class="max-w-7xl mx-auto relative">
    <!-- header mini -->
    <div class="text-center max-w-2xl mx-auto mb-10 reveal">
      <p class="inline-flex items-center gap-2 text-xs font-semibold tracking-wide uppercase
                text-blue-700 dark:text-cyan-200
                bg-blue-50 dark:bg-white/5 border border-blue-100 dark:border-white/10
                rounded-full px-3 py-1">
        <span class="h-2 w-2 rounded-full bg-cyan-400 shadow-[0_0_18px_rgba(34,211,238,0.45)]"></span>
        Tentang Platform
      </p>
      <h2 class="mt-4 text-2xl md:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
        Kenapa TAPAK beda?
      </h2>
      <p class="mt-2 text-sm md:text-base text-gray-600 dark:text-gray-400">
        Bukan sekadar kumpulan info—ini ruang yang bikin kamu makin siap gas.
      </p>
    </div>

    <!-- Card utama -->
    <div
      class="neon-card max-w-4xl mx-auto rounded-2xl border border-gray-200 dark:border-white/10
             bg-white/80 dark:bg-white/5 backdrop-blur-md
             px-8 py-12 text-center
             shadow-sm dark:shadow-[0_10px_40px_rgba(0,0,0,0.35)]
             ring-1 ring-black/5 dark:ring-white/10
             transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl reveal">

      <!-- garis neon tipis atas -->
      <div class="mx-auto h-1 w-20 rounded-full bg-gradient-to-r from-[#2563EB] to-[#22D3EE] opacity-80"></div>

      <h3 class="mt-6 text-3xl md:text-4xl font-semibold tracking-tight text-gray-900 dark:text-white">
        Tentang
        <span class="bg-gradient-to-r from-[#2563EB] to-[#22D3EE] bg-clip-text text-transparent">TAPAK</span>
      </h3>

      <p class="mt-6 text-base md:text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
        TAPAK merupakan platform digital yang menghadirkan informasi, peluang, serta ruang diskusi
        secara terintegrasi. Melalui dashboard yang interaktif, konten blog yang informatif, fitur
        opportunity, dan threads diskusi, TAPAK membantu pengguna mengeksplorasi wawasan serta
        mengembangkan potensi secara efektif.
      </p>

      <!-- quick stats -->
      <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-4 text-left">
        <div class="rounded-xl border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur px-5 py-4">
          <p class="text-xs font-semibold text-gray-500 dark:text-gray-400">Fokus</p>
          <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-gray-100">Relevan & Kredibel</p>
          <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">Minim noise, maksimal value.</p>
        </div>

        <div class="rounded-xl border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur px-5 py-4">
          <p class="text-xs font-semibold text-gray-500 dark:text-gray-400">Tujuan</p>
          <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-gray-100">Bertumbuh Bareng</p>
          <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">Dari insight ke aksi nyata.</p>
        </div>

        <div class="rounded-xl border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur px-5 py-4">
          <p class="text-xs font-semibold text-gray-500 dark:text-gray-400">Ruang</p>
          <p class="mt-1 text-sm font-semibold text-gray-900 dark:text-gray-100">Diskusi & Komunitas</p>
          <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">Thread yang ngebangun.</p>
        </div>
      </div>

      <!-- CTA kecil -->
      <div class="mt-10 flex flex-col sm:flex-row gap-3 justify-center">
        <a href="#opportunities"
           class="inline-flex items-center justify-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold
                  text-white bg-gradient-to-r from-[#2563EB] to-[#22D3EE]
                  shadow-sm hover:shadow-md transition">
          Lihat Peluang Pilihan
          <span aria-hidden="true">→</span>
        </a>

        <a href="{{ auth()->check() ? route('threads.index') : route('register') }}"
           class="inline-flex items-center justify-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold
                  border border-gray-200 dark:border-white/10
                  bg-white/70 dark:bg-white/5 backdrop-blur
                  text-gray-900 dark:text-gray-100
                  hover:border-cyan-300/60 dark:hover:border-cyan-300/30 transition">
          Ikut Diskusi
        </a>
      </div>
    </div>
  </div>
</section>


   <!-- ================= FEATURES ================= -->
<section class="px-6 py-24 bg-white dark:bg-[#070B1A] border-t border-gray-200 dark:border-white/10 relative z-10 reveal overflow-hidden">
  <!-- background accents -->
  <div class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute -top-24 right-1/3 h-[360px] w-[360px] rounded-full blur-3xl
                bg-gradient-to-r from-cyan-300/25 to-blue-400/20 dark:from-cyan-400/14 dark:to-blue-500/14"></div>
    <div class="absolute -bottom-28 left-1/4 h-[420px] w-[420px] rounded-full blur-3xl
                bg-gradient-to-r from-indigo-300/18 to-cyan-300/18 dark:from-indigo-500/12 dark:to-cyan-500/12"></div>
  </div>

  <div class="max-w-7xl mx-auto">
    <div class="text-center max-w-2xl mx-auto reveal">
      <span class="inline-flex items-center gap-2 text-xs font-semibold tracking-wide uppercase
                   text-blue-700 dark:text-cyan-300
                   bg-blue-50/70 dark:bg-white/5 border border-blue-100 dark:border-white/10
                   rounded-full px-4 py-2">
        <span class="h-2 w-2 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
        Fitur Utama
      </span>

      <h2 class="mt-5 text-2xl md:text-3xl font-semibold tracking-tight">
        Apa yang Bisa Dilakukan di TAPAK?
      </h2>

      <p class="mt-3 text-sm md:text-base text-gray-700 dark:text-gray-400">
        Dirancang biar kamu fokus: lihat arah, pilih peluang, diskusi, lalu bertumbuh konsisten.
      </p>

      <div class="mt-6 flex flex-wrap justify-center gap-2 text-xs text-gray-600 dark:text-gray-400">
        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5">
          <span class="h-1.5 w-1.5 rounded-full bg-cyan-400"></span>
          Terstruktur
        </span>
        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5">
          <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
          Terkurasi
        </span>
        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5">
          <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>
          Praktis
        </span>
      </div>
    </div>

    <!-- 2 atas 2 bawah -->
    <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-3xl mx-auto">
      <!-- Dashboard -->
      <a href="{{ auth()->check() ? route('dashboard') : route('register') }}"
         class="reveal neon-card group bg-white dark:bg-[#0A1230] border border-gray-200 dark:border-white/10 rounded-2xl p-5
                ring-1 ring-black/5 dark:ring-white/10
                transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl hover:ring-cyan-300/30
                flex flex-col items-center text-center"
         data-delay="1">

        <div class="w-full flex items-center justify-between">
          <span class="inline-flex items-center gap-2 text-[10px] font-semibold uppercase tracking-wider
                       text-blue-700 dark:text-cyan-200 bg-blue-50 dark:bg-white/5
                       border border-blue-100 dark:border-white/10 rounded-full px-3 py-1">
            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
            Ringkasan
          </span>

          <span class="text-xs font-semibold text-blue-700 dark:text-cyan-200 opacity-80 group-hover:opacity-100 transition">
            Buka →
          </span>
        </div>

        <img src="{{ asset('image/dashboard.svg') }}" alt="Dashboard"
             class="mt-4 w-full max-w-[170px] h-auto transition duration-300 ease-out group-hover:scale-105"
             loading="lazy" />

        <p class="mt-5 text-sm font-semibold text-gray-900 dark:text-gray-100">
          Dashboard
        </p>

        <p class="mt-2 text-xs leading-relaxed text-gray-600 dark:text-gray-400">
          Ringkasan aktivitasmu: peluang terbaru, progress, dan rekomendasi yang lagi relevan.
        </p>

        <div class="mt-4 flex flex-wrap justify-center gap-2 text-[11px] text-gray-600 dark:text-gray-400">
          <span class="px-3 py-1 rounded-full border border-gray-200 dark:border-white/10 bg-gray-50/70 dark:bg-white/5">
            Update cepat
          </span>
          <span class="px-3 py-1 rounded-full border border-gray-200 dark:border-white/10 bg-gray-50/70 dark:bg-white/5">
            Rekomendasi
          </span>
        </div>
      </a>

      <!-- Peluang -->
      <a href="{{ auth()->check() ? route('opportunities.index') : route('register') }}"
         class="reveal neon-card group bg-white dark:bg-[#0A1230] border border-gray-200 dark:border-white/10 rounded-2xl p-5
                ring-1 ring-black/5 dark:ring-white/10
                transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl hover:ring-cyan-300/30
                flex flex-col items-center text-center"
         data-delay="2">

        <div class="w-full flex items-center justify-between">
          <span class="inline-flex items-center gap-2 text-[10px] font-semibold uppercase tracking-wider
                       text-blue-700 dark:text-cyan-200 bg-blue-50 dark:bg-white/5
                       border border-blue-100 dark:border-white/10 rounded-full px-3 py-1">
            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
            Kurasi
          </span>

          <span class="text-xs font-semibold text-blue-700 dark:text-cyan-200 opacity-80 group-hover:opacity-100 transition">
            Buka →
          </span>
        </div>

        <img src="{{ asset('image/opportunity.svg') }}" alt="Peluang"
             class="mt-4 w-full max-w-[170px] h-auto transition duration-300 ease-out group-hover:scale-105"
             loading="lazy" />

        <p class="mt-5 text-sm font-semibold text-gray-900 dark:text-gray-100">
          Peluang
        </p>

        <p class="mt-2 text-xs leading-relaxed text-gray-600 dark:text-gray-400">
          Jelajahi peluang terkurasi: beasiswa, lomba, magang, dan event yang kredibel.
        </p>

        <div class="mt-4 flex flex-wrap justify-center gap-2 text-[11px] text-gray-600 dark:text-gray-400">
          <span class="px-3 py-1 rounded-full border border-gray-200 dark:border-white/10 bg-gray-50/70 dark:bg-white/5">
            Kredibel
          </span>
          <span class="px-3 py-1 rounded-full border border-gray-200 dark:border-white/10 bg-gray-50/70 dark:bg-white/5">
            Deadline jelas
          </span>
        </div>
      </a>

      <!-- Threads -->
      <a href="{{ auth()->check() ? route('threads.index') : route('register') }}"
         class="reveal neon-card group bg-white dark:bg-[#0A1230] border border-gray-200 dark:border-white/10 rounded-2xl p-5
                ring-1 ring-black/5 dark:ring-white/10
                transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl hover:ring-cyan-300/30
                flex flex-col items-center text-center"
         data-delay="3">

        <div class="w-full flex items-center justify-between">
          <span class="inline-flex items-center gap-2 text-[10px] font-semibold uppercase tracking-wider
                       text-blue-700 dark:text-cyan-200 bg-blue-50 dark:bg-white/5
                       border border-blue-100 dark:border-white/10 rounded-full px-3 py-1">
            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
            Diskusi
          </span>

          <span class="text-xs font-semibold text-blue-700 dark:text-cyan-200 opacity-80 group-hover:opacity-100 transition">
            Buka →
          </span>
        </div>

        <img src="{{ asset('image/threads.svg') }}" alt="Threads"
             class="mt-4 w-full max-w-[170px] h-auto transition duration-300 ease-out group-hover:scale-105"
             loading="lazy" />

        <p class="mt-5 text-sm font-semibold text-gray-900 dark:text-gray-100">
          Threads
        </p>

        <p class="mt-2 text-xs leading-relaxed text-gray-600 dark:text-gray-400">
          Ruang diskusi cepat untuk tanya-jawab, sharing insight, dan saling bantu berkembang.
        </p>

        <div class="mt-4 flex flex-wrap justify-center gap-2 text-[11px] text-gray-600 dark:text-gray-400">
          <span class="px-3 py-1 rounded-full border border-gray-200 dark:border-white/10 bg-gray-50/70 dark:bg-white/5">
            Tanya jawab
          </span>
          <span class="px-3 py-1 rounded-full border border-gray-200 dark:border-white/10 bg-gray-50/70 dark:bg-white/5">
            Insight
          </span>
        </div>
      </a>

      <!-- Blog -->
      <a href="{{ auth()->check() ? route('blogs.index') : route('register') }}"
         class="reveal neon-card group bg-white dark:bg-[#0A1230] border border-gray-200 dark:border-white/10 rounded-2xl p-5
                ring-1 ring-black/5 dark:ring-white/10
                transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl hover:ring-cyan-300/30
                flex flex-col items-center text-center"
         data-delay="4">

        <div class="w-full flex items-center justify-between">
          <span class="inline-flex items-center gap-2 text-[10px] font-semibold uppercase tracking-wider
                       text-blue-700 dark:text-cyan-200 bg-blue-50 dark:bg-white/5
                       border border-blue-100 dark:border-white/10 rounded-full px-3 py-1">
            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
            Artikel
          </span>

          <span class="text-xs font-semibold text-blue-700 dark:text-cyan-200 opacity-80 group-hover:opacity-100 transition">
            Buka →
          </span>
        </div>

        <img src="{{ asset('image/blogs.svg') }}" alt="Blog"
             class="mt-4 w-full max-w-[170px] h-auto transition duration-300 ease-out group-hover:scale-105"
             loading="lazy" />

        <p class="mt-5 text-sm font-semibold text-gray-900 dark:text-gray-100">
          Blog
        </p>

        <p class="mt-2 text-xs leading-relaxed text-gray-600 dark:text-gray-400">
          Artikel ringkas & aplikatif tentang karier, skill, dan strategi bertumbuh tanpa noise.
        </p>

        <div class="mt-4 flex flex-wrap justify-center gap-2 text-[11px] text-gray-600 dark:text-gray-400">
          <span class="px-3 py-1 rounded-full border border-gray-200 dark:border-white/10 bg-gray-50/70 dark:bg-white/5">
            Praktis
          </span>
          <span class="px-3 py-1 rounded-full border border-gray-200 dark:border-white/10 bg-gray-50/70 dark:bg-white/5">
            Cepat dibaca
          </span>
        </div>
      </a>
    </div>
  </div>
</section>

    <!-- ================= OPPORTUNITIES ================= -->
<section id="opportunities"
  class="bg-gray-50 dark:bg-[#070B1A] px-6 py-24 border-t border-gray-200 dark:border-white/10 relative z-10 reveal overflow-hidden">
  
  <!-- background accents -->
  <div class="pointer-events-none absolute inset-0 -z-10">
    <div class="absolute -top-24 left-1/4 h-[420px] w-[420px] rounded-full blur-3xl
                bg-gradient-to-r from-cyan-300/22 to-blue-400/18 dark:from-cyan-400/12 dark:to-blue-500/12"></div>
    <div class="absolute -bottom-28 right-1/4 h-[460px] w-[460px] rounded-full blur-3xl
                bg-gradient-to-r from-indigo-300/18 to-cyan-300/18 dark:from-indigo-500/12 dark:to-cyan-500/12"></div>
  </div>

  <div class="max-w-7xl mx-auto">
    <div class="max-w-2xl mb-14 reveal">
      <span class="inline-flex items-center gap-2 text-xs font-semibold tracking-wide uppercase
                   text-blue-700 dark:text-cyan-300
                   bg-blue-50/70 dark:bg-white/5 border border-blue-100 dark:border-white/10
                   rounded-full px-4 py-2">
        <span class="h-2 w-2 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
        Pilihan Hari Ini
      </span>

      <h2 class="mt-5 text-2xl md:text-3xl font-semibold tracking-tight">
        Peluang Pilihan
      </h2>

      <p class="mt-3 text-gray-700 dark:text-gray-400">
        Disaring berdasarkan relevansi, kredibilitas, dan dampak—biar kamu fokus ke yang benar-benar berarti.
      </p>

      <div class="mt-6 flex flex-wrap gap-2 text-xs text-gray-600 dark:text-gray-400">
        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5">
          <span class="h-1.5 w-1.5 rounded-full bg-cyan-400"></span>
          Terkurasi
        </span>
        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5">
          <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
          Kredibel
        </span>
        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5">
          <span class="h-1.5 w-1.5 rounded-full bg-indigo-500"></span>
          Berdampak
        </span>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @for ($i = 0; $i < 3; $i++)
        <article
          class="reveal neon-card group bg-white dark:bg-[#0A1230] border border-gray-200 dark:border-white/10 rounded-2xl p-8
                 ring-1 ring-black/5 dark:ring-white/10
                 transition duration-300 ease-out transform hover:-translate-y-1 hover:shadow-xl hover:ring-cyan-300/30
                 overflow-hidden"
          data-delay="{{ ($i % 3) + 1 }}">

          <!-- top subtle shine -->
          <div class="pointer-events-none absolute inset-x-0 -top-12 h-32 opacity-0 group-hover:opacity-100 transition duration-300"
               style="background: radial-gradient(closest-side at 50% 30%, rgba(34,211,238,.22), transparent 70%);">
          </div>

          <!-- header -->
          <div class="flex items-start justify-between gap-3">
            <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
                         bg-blue-50 text-blue-700 border border-blue-100
                         dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
              <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
              Beasiswa
            </span>

            <span class="text-[11px] font-semibold text-blue-700/70 dark:text-cyan-200/80">
              Terverifikasi
            </span>
          </div>

          <!-- title -->
          <h3 class="mt-5 text-xl font-semibold text-gray-900 dark:text-gray-100 transition duration-300
                     group-hover:text-blue-700 dark:group-hover:text-cyan-200">
            Program Prestasi Nasional
          </h3>

          <!-- description -->
          <p class="mt-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
            Dukungan finansial dan pengembangan diri bagi mahasiswa aktif—mulai dari mentoring sampai akses jejaring.
          </p>

          <!-- meta -->
          <div class="mt-6 grid grid-cols-2 gap-3 text-xs">
            <div class="rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/70 dark:bg-white/5 p-3">
              <p class="text-gray-500 dark:text-gray-400">Deadline</p>
              <p class="mt-1 font-semibold text-gray-900 dark:text-gray-100">12 Mar 2026</p>
            </div>
            <div class="rounded-xl border border-gray-200 dark:border-white/10 bg-gray-50/70 dark:bg-white/5 p-3">
              <p class="text-gray-500 dark:text-gray-400">Kategori</p>
              <p class="mt-1 font-semibold text-gray-900 dark:text-gray-100">Mahasiswa</p>
            </div>
          </div>

          <!-- footer action -->
          <div class="mt-7 flex items-center justify-between text-sm">
            <span class="inline-flex items-center gap-2 text-gray-500 dark:text-gray-400">
              <span class="h-2 w-2 rounded-full bg-emerald-500/80"></span>
              Masih dibuka
            </span>

            <a href="#"
              class="inline-flex items-center gap-2 font-semibold
                     text-blue-700 dark:text-cyan-200
                     hover:underline underline-offset-4">
              Detail
              <span class="transition duration-300 group-hover:translate-x-0.5">→</span>
            </a>
          </div>
        </article>
      @endfor
    </div>
  </div>
</section>

    <!-- ================= FOOTER ================= -->
    <footer class="relative z-10 reveal overflow-hidden border-t border-gray-200 dark:border-white/10 bg-gray-100 dark:bg-[#070B1A]">
    <!-- soft futuristic glow (light & dark) -->
    <div class="pointer-events-none absolute inset-0 opacity-80 dark:opacity-100">
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 h-72 w-[820px] rounded-full blur-3xl
                    bg-[radial-gradient(circle_at_center,rgba(62, 223, 248, 0.32),transparent_60%)]
                    dark:bg-[radial-gradient(circle_at_center,rgba(32, 222, 251, 0.22),transparent_60%)]"></div>

        <div class="absolute -bottom-24 right-[-120px] h-72 w-72 rounded-full blur-3xl
                    bg-[radial-gradient(circle_at_center,rgba(37,99,235,0.14),transparent_60%)]
                    dark:bg-[radial-gradient(circle_at_center,rgba(37,99,235,0.20),transparent_60%)]"></div>

        <div class="absolute inset-0 opacity-[0.06] dark:opacity-[0.10]"
             style="background-image: radial-gradient(circle, rgba(0,0,0,.12) 1px, transparent 1px); background-size: 18px 18px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-14 relative">
        <!-- top -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            <!-- brand -->
            <div class="lg:col-span-5">
                <div class="inline-flex items-center gap-3">
                    <div class="h-11 w-11 rounded-2xl border border-gray-200 dark:border-white/10 bg-white/80 dark:bg-white/5 backdrop-blur
                                shadow-sm dark:shadow-[0_0_0_1px_rgba(255,255,255,0.05)]
                                flex items-center justify-center">
                        <span class="text-lg font-black bg-gradient-to-r from-[#2563EB] to-[#22D3EE] bg-clip-text text-transparent">
                            T
                        </span>
                    </div>
                    <div>
                        <p class="text-base font-semibold text-gray-900 dark:text-gray-100 leading-tight">
                            TAPAK
                        </p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                            Platform peluang terkurasi untuk bertumbuh.
                        </p>
                    </div>
                </div>

                <p class="mt-5 text-sm leading-relaxed text-gray-600 dark:text-gray-400 max-w-md">
                    Temukan peluang yang relevan, kredibel, dan berdampak — plus ruang diskusi yang bikin kamu makin siap gas.
                </p>

                <!-- quick CTA -->
                <div class="mt-6 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('opportunities.index') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold
                              text-white bg-gradient-to-r from-[#2563EB] to-[#22D3EE]
                              shadow-sm hover:shadow-md transition">
                        Jelajahi Peluang
                        <span aria-hidden="true">→</span>
                    </a>

                    <a href="#about"
                       class="inline-flex items-center justify-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold
                              border border-gray-200 dark:border-white/10
                              bg-white/70 dark:bg-white/5 backdrop-blur
                              text-gray-900 dark:text-gray-100
                              hover:border-cyan-300/60 dark:hover:border-cyan-300/30 transition">
                        Tentang TAPAK
                    </a>
                </div>

                <!-- status badge -->
                <div class="mt-6 inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-semibold
                            border border-gray-200 dark:border-white/10
                            bg-white/70 dark:bg-white/5 backdrop-blur
                            text-gray-700 dark:text-gray-300">
                    <span class="h-2 w-2 rounded-full bg-emerald-500 shadow-[0_0_0_3px_rgba(16,185,129,0.15)]"></span>
                    Online · Update peluang rutin
                </div>
            </div>

            <!-- links -->
            <div class="lg:col-span-7">
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-8">
                    <div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                            Produk
                        </p>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li>
                                <a href="{{ auth()->check() ? route('dashboard') : route('register') }}"
                                   class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ auth()->check() ? route('opportunities.index') : route('register') }}"
                                   class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                                    Peluang
                                </a>
                            </li>
                            <li>
                                <a href="{{ auth()->check() ? route('threads.index') : route('register') }}"
                                   class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                                    Threads
                                </a>
                            </li>
                            <li>
                                <a href="{{ auth()->check() ? route('blogs.index') : route('register') }}"
                                   class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                            Dukungan
                        </p>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li>
                                <a href="#"
                                   class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                                    Pusat Bantuan
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                                    Panduan Pengguna
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                                    Hubungi Kami
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                            Legal
                        </p>
                        <ul class="mt-4 space-y-3 text-sm">
                            <li>
                                <a href="#"
                                   class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                                    Kebijakan Privasi
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                   class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                                    Syarat & Ketentuan
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- mini terminal-ish strip -->
                <div class="mt-10 rounded-2xl border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur
                            px-5 py-4 shadow-sm dark:shadow-[0_10px_40px_rgba(0,0,0,0.35)]
                            neon-card">
                    <div class="flex items-start justify-between gap-4">
                        <div class="min-w-0">
                            <p class="text-xs font-semibold text-gray-900 dark:text-gray-100">
                                Status Sistem
                            </p>
                            <p class="mt-1 text-xs text-gray-600 dark:text-gray-400">
                                <span class="text-gray-800 dark:text-gray-200 font-semibold">TAPAK</span>
                                berjalan stabil · latensi rendah · siap dipakai kapan aja.
                            </p>
                        </div>

                        <span class="shrink-0 inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-semibold
                                     bg-gradient-to-r from-[#2563EB]/10 to-[#22D3EE]/10
                                     text-gray-800 dark:text-gray-100 border border-cyan-200/60 dark:border-cyan-300/20">
                            <span class="h-2 w-2 rounded-full bg-cyan-400 shadow-[0_0_18px_rgba(34,211,238,0.55)]"></span>
                            Stable
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- bottom -->
        <div class="mt-12 pt-8 border-t border-gray-200 dark:border-white/10 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                © {{ date('Y') }} <span class="font-semibold text-gray-900 dark:text-gray-100">TAPAK</span>.
                Hidup TI
            </p>

            <div class="flex items-center gap-3">
                <!-- social / icon buttons (tanpa link beneran, tinggal ganti href) -->
                <a href="#"
                   class="h-10 w-10 rounded-xl border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur
                          flex items-center justify-center text-gray-700 dark:text-gray-300
                          hover:border-cyan-300/60 dark:hover:border-cyan-300/30 hover:text-gray-900 dark:hover:text-white transition neon-card"
                   aria-label="Instagram">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-width="2" d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5z"/>
                        <path stroke-width="2" d="M12 16a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/>
                        <path stroke-width="2" d="M17.5 6.5h.01"/>
                    </svg>
                </a>

                <a href="#"
                   class="h-10 w-10 rounded-xl border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur
                          flex items-center justify-center text-gray-700 dark:text-gray-300
                          hover:border-cyan-300/60 dark:hover:border-cyan-300/30 hover:text-gray-900 dark:hover:text-white transition neon-card"
                   aria-label="GitHub">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-width="2" d="M9 19c-4 1.5-4-2.5-6-3m12 6v-3.5c0-1 .1-1.4-.5-2 2.5-.3 5-1.2 5-5.5 0-1.2-.4-2.2-1.1-3.1.1-.3.5-1.6-.1-3.3 0 0-1-.3-3.3 1.2a11.4 11.4 0 0 0-6 0C6.7 2.6 5.7 2.9 5.7 2.9c-.6 1.7-.2 3-.1 3.3C4.9 7.1 4.5 8.1 4.5 9.3c0 4.3 2.5 5.2 5 5.5-.4.4-.6.8-.6 1.6V22"/>
                    </svg>
                </a>

                <a href="#"
                   class="h-10 w-10 rounded-xl border border-gray-200 dark:border-white/10 bg-white/70 dark:bg-white/5 backdrop-blur
                          flex items-center justify-center text-gray-700 dark:text-gray-300
                          hover:border-cyan-300/60 dark:hover:border-cyan-300/30 hover:text-gray-900 dark:hover:text-white transition neon-card"
                   aria-label="Email">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-width="2" d="M4 6h16v12H4z"/>
                        <path stroke-width="2" d="m4 7 8 6 8-6"/>
                    </svg>
                </a>
            </div>
        </div>
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
