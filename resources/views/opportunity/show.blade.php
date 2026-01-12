<x-app-layout>
    <x-slot name="title">
        {{ $opportunity->title }}
    </x-slot>

    <x-slot name="header">
        <div class="flex items-start justify-between gap-4">
            <div class="min-w-0">
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight truncate">
                    {{ $opportunity->title }}
                </h2>

                @if ($opportunity->organization)
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ $opportunity->organization }}
                    </p>
                @endif
            </div>

            <div class="shrink-0">
                <livewire:save-opportunity :opportunity="$opportunity" />
            </div>
        </div>
    </x-slot>

    <div class="py-12 relative overflow-hidden">
        {{-- accent glow background --}}
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-24 left-1/3 h-[420px] w-[420px] rounded-full blur-3xl
                        bg-gradient-to-r from-cyan-300/18 to-blue-400/14 dark:from-cyan-400/10 dark:to-blue-500/10"></div>
            <div class="absolute -bottom-28 right-1/4 h-[460px] w-[460px] rounded-full blur-3xl
                        bg-gradient-to-r from-indigo-300/14 to-cyan-300/14 dark:from-indigo-500/10 dark:to-cyan-500/10"></div>
        </div>

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Poster --}}
            @if ($opportunity->poster_url)
                <div class="relative overflow-hidden rounded-2xl
                            bg-white/90 dark:bg-white/5 backdrop-blur-md
                            border border-gray-200/70 dark:border-white/10
                            ring-1 ring-black/5 dark:ring-white/10
                            shadow-sm">
                    <div class="pointer-events-none absolute -inset-10">
                        <div class="absolute inset-0 opacity-60 dark:opacity-40
                                    bg-gradient-to-r from-cyan-200/20 via-blue-200/16 to-indigo-200/16
                                    dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                    blur-3xl"></div>
                    </div>

                    <img src="{{ asset('storage/' . $opportunity->poster_url) }}" alt="{{ $opportunity->title }}"
                         class="relative w-full max-h-[460px] object-cover">

                    <div class="relative p-4 border-t border-gray-200/70 dark:border-white/10">
                        <div class="flex flex-wrap items-center gap-2 text-xs">
                            @if ($opportunity->category)
                                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 font-semibold
                                             bg-blue-50 text-blue-700 border border-blue-100
                                             dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                                    {{ $opportunity->category->name }}
                                </span>
                            @endif

                            @if ($opportunity->location)
                                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 font-semibold
                                             bg-gray-50 text-gray-700 border border-gray-200
                                             dark:bg-white/5 dark:text-gray-200 dark:border-white/10">
                                    📍 {{ $opportunity->location }}
                                </span>
                            @endif

                            @if ($opportunity->difficulty)
                                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 font-semibold
                                             bg-amber-50 text-amber-800 border border-amber-100
                                             dark:bg-white/5 dark:text-amber-200 dark:border-white/10">
                                    ⚡ {{ ucfirst($opportunity->difficulty) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            {{-- Main Content Card --}}
            <div class="relative overflow-hidden rounded-2xl
                        bg-white/90 dark:bg-white/5 backdrop-blur-md
                        border border-gray-200/70 dark:border-white/10
                        ring-1 ring-black/5 dark:ring-white/10
                        shadow-sm">

                {{-- inner glow --}}
                <div class="pointer-events-none absolute -inset-10">
                    <div class="absolute inset-0 opacity-60 dark:opacity-40
                                bg-gradient-to-r from-cyan-200/18 via-blue-200/14 to-indigo-200/14
                                dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                blur-3xl"></div>
                </div>

                <div class="relative p-6 md:p-8 space-y-10">

                    {{-- Meta badges (kalau poster ga ada, tampilkan di sini) --}}
                    @if (!$opportunity->poster_url)
                        <div class="flex flex-wrap gap-2 text-xs">
                            @if ($opportunity->category)
                                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 font-semibold
                                             bg-blue-50 text-blue-700 border border-blue-100
                                             dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                                    {{ $opportunity->category->name }}
                                </span>
                            @endif

                            @if ($opportunity->location)
                                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 font-semibold
                                             bg-gray-50 text-gray-700 border border-gray-200
                                             dark:bg-white/5 dark:text-gray-200 dark:border-white/10">
                                    📍 {{ $opportunity->location }}
                                </span>
                            @endif

                            @if ($opportunity->difficulty)
                                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 font-semibold
                                             bg-amber-50 text-amber-800 border border-amber-100
                                             dark:bg-white/5 dark:text-amber-200 dark:border-white/10">
                                    ⚡ {{ ucfirst($opportunity->difficulty) }}
                                </span>
                            @endif
                        </div>
                    @endif

                    {{-- Sections --}}
                    @if ($opportunity->description)
                        <section class="space-y-3">
                            <div class="flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 dark:text-gray-100">
                                    Deskripsi
                                </h3>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                                {{ $opportunity->description }}
                            </p>
                        </section>
                    @endif

                    @if ($opportunity->requirements)
                        <section class="space-y-3">
                            <div class="flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-gradient-to-r from-indigo-500 to-cyan-400"></span>
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 dark:text-gray-100">
                                    Persyaratan
                                </h3>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                                {{ $opportunity->requirements }}
                            </p>
                        </section>
                    @endif

                    @if ($opportunity->benefits)
                        <section class="space-y-3">
                            <div class="flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-gradient-to-r from-cyan-500 to-blue-400"></span>
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 dark:text-gray-100">
                                    Benefit
                                </h3>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                                {{ $opportunity->benefits }}
                            </p>
                        </section>
                    @endif

                    {{-- Additional info --}}
                    <section class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @if ($opportunity->education_level)
                            <div class="rounded-2xl p-5
                                        bg-white/70 dark:bg-white/5
                                        border border-gray-200/70 dark:border-white/10
                                        ring-1 ring-black/5 dark:ring-white/10">
                                <p class="text-xs font-semibold tracking-wide uppercase text-gray-500 dark:text-gray-400">
                                    Jenjang Pendidikan
                                </p>
                                <p class="mt-2 font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $opportunity->education_level }}
                                </p>
                            </div>
                        @endif

                        @if ($opportunity->field)
                            <div class="rounded-2xl p-5
                                        bg-white/70 dark:bg-white/5
                                        border border-gray-200/70 dark:border-white/10
                                        ring-1 ring-black/5 dark:ring-white/10">
                                <p class="text-xs font-semibold tracking-wide uppercase text-gray-500 dark:text-gray-400">
                                    Bidang
                                </p>
                                <p class="mt-2 font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $opportunity->field }}
                                </p>
                            </div>
                        @endif

                        @if ($opportunity->start_date)
                            <div class="rounded-2xl p-5
                                        bg-white/70 dark:bg-white/5
                                        border border-gray-200/70 dark:border-white/10
                                        ring-1 ring-black/5 dark:ring-white/10">
                                <p class="text-xs font-semibold tracking-wide uppercase text-gray-500 dark:text-gray-400">
                                    Mulai
                                </p>
                                <p class="mt-2 font-semibold text-gray-900 dark:text-gray-100">
                                    {{ \Carbon\Carbon::parse($opportunity->start_date)->format('d M Y') }}
                                </p>
                            </div>
                        @endif

                        @if ($opportunity->end_date)
                            <div class="rounded-2xl p-5
                                        bg-white/70 dark:bg-white/5
                                        border border-gray-200/70 dark:border-white/10
                                        ring-1 ring-black/5 dark:ring-white/10">
                                <p class="text-xs font-semibold tracking-wide uppercase text-gray-500 dark:text-gray-400">
                                    Berakhir
                                </p>
                                <p class="mt-2 font-semibold text-gray-900 dark:text-gray-100">
                                    {{ \Carbon\Carbon::parse($opportunity->end_date)->format('d M Y') }}
                                </p>
                            </div>
                        @endif
                    </section>

                    {{-- CTA --}}
                    @if ($opportunity->registration_link)
                        <div class="pt-6 border-t border-gray-200/70 dark:border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="text-sm text-gray-600 dark:text-gray-400">
                                Siap daftar? Pastikan baca syarat & jadwal dulu ya.
                            </div>

                            <a href="{{ $opportunity->registration_link }}" target="_blank"
                               class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                                      rounded-xl px-5 py-3 font-semibold text-white
                                      bg-gradient-to-r from-[#2563EB] to-[#22D3EE]
                                      shadow-[0_14px_40px_rgba(34,211,238,0.20)]
                                      hover:shadow-[0_18px_55px_rgba(34,211,238,0.28)]
                                      transition duration-300">
                                Daftar Sekarang
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        </div>
                    @endif

                    {{-- Back --}}
                    <div class="pt-2">
                        <a href="{{ route('opportunities.index') }}"
                           class="inline-flex items-center gap-2 text-sm font-semibold
                                  text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white transition">
                            <span class="text-base">←</span> Kembali ke daftar
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
