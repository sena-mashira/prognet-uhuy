<div class="max-w-6xl mx-auto px-6">

    {{-- Category Chips --}}
    <div class="relative">
        <ul class="flex flex-wrap gap-2 text-sm font-medium text-center">

            {{-- ALL --}}
            <li>
                <button wire:click="setCategory('all')"
                    class="px-4 py-2 rounded-xl transition duration-300 relative overflow-hidden
                    border border-gray-200/70 dark:border-white/10
                    {{ $activeCategory === 'all'
                        ? 'text-white shadow-[0_10px_30px_rgba(34,211,238,0.22)] dark:shadow-[0_16px_40px_rgba(34,211,238,0.18)]'
                        : 'bg-white/80 dark:bg-white/5 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-white/10' }}">

                    @if($activeCategory === 'all')
                        <span class="absolute inset-0 bg-gradient-to-r from-[#2563EB] to-[#22D3EE]"></span>
                        <span class="absolute -inset-10 bg-gradient-to-r from-cyan-200/30 to-blue-300/20 blur-2xl"></span>
                    @endif

                    <span class="relative inline-flex items-center gap-2">
                        <span class="h-1.5 w-1.5 rounded-full {{ $activeCategory === 'all' ? 'bg-white' : 'bg-gradient-to-r from-blue-500 to-cyan-400' }}"></span>
                        All
                    </span>
                </button>
            </li>

            {{-- CATEGORY --}}
            @foreach ($categories as $category)
                <li>
                    <button wire:click="setCategory('{{ $category->slug }}')"
                        class="px-4 py-2 rounded-xl transition duration-300 relative overflow-hidden
                        border border-gray-200/70 dark:border-white/10
                        {{ $activeCategory === $category->slug
                            ? 'text-white shadow-[0_10px_30px_rgba(37,99,235,0.18)] dark:shadow-[0_16px_40px_rgba(34,211,238,0.16)]'
                            : 'bg-white/80 dark:bg-white/5 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-white/10' }}">

                        @if($activeCategory === $category->slug)
                            <span class="absolute inset-0 bg-gradient-to-r from-[#2563EB] to-[#22D3EE]"></span>
                            <span class="absolute -inset-10 bg-gradient-to-r from-cyan-200/30 to-blue-300/20 blur-2xl"></span>
                        @endif

                        <span class="relative inline-flex items-center gap-2">
                            <span class="h-1.5 w-1.5 rounded-full {{ $activeCategory === $category->slug ? 'bg-white' : 'bg-gradient-to-r from-blue-500 to-cyan-400' }}"></span>
                            {{ $category->name }}
                        </span>
                    </button>
                </li>
            @endforeach
        </ul>

        {{-- soft line accent under chips --}}
        <div class="mt-4 h-px w-full bg-gradient-to-r from-transparent via-gray-200 to-transparent dark:via-white/10"></div>
    </div>

    {{-- Opportunity List --}}
    <div class="mt-8 space-y-6">
        @forelse ($opportunities as $item)
            <article
                class="group relative overflow-hidden grid grid-cols-1 md:grid-cols-5 gap-6
                       bg-white/90 dark:bg-white/5 backdrop-blur-md
                       border border-gray-200/70 dark:border-white/10
                       rounded-2xl p-6
                       ring-1 ring-black/5 dark:ring-white/10
                       shadow-sm dark:shadow-none
                       transition duration-300 ease-out
                       hover:-translate-y-0.5 hover:shadow-xl">

                {{-- subtle glow layer --}}
                <div class="pointer-events-none absolute -inset-10 opacity-0 group-hover:opacity-100 transition duration-300">
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-200/25 via-blue-200/20 to-indigo-200/20 blur-3xl dark:from-cyan-400/12 dark:via-blue-500/10 dark:to-indigo-500/10"></div>
                </div>

                {{-- neon border on hover --}}
                <div class="pointer-events-none absolute inset-0 rounded-2xl opacity-0 group-hover:opacity-100 transition duration-300"
                     style="box-shadow: 0 0 0 2px rgba(34,211,238,.35);">
                </div>

                {{-- Thumbnail --}}
                <div class="md:col-span-2 relative">
                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-blue-500/10 to-cyan-400/10 opacity-0 group-hover:opacity-100 transition duration-300"></div>

                    <img src="{{ asset('storage/' . $item->poster_url) }}" alt="{{ $item->title }}"
                        class="w-full h-64 object-cover rounded-xl
                               shadow-sm
                               transition duration-500 ease-out
                               group-hover:scale-[1.02]">

                    {{-- shine --}}
                    <div class="pointer-events-none absolute -top-10 -left-10 h-24 w-24 rotate-12 rounded-2xl
                                bg-white/40 blur-xl opacity-0 group-hover:opacity-60 transition duration-500"></div>
                </div>

                {{-- Content --}}
                <div class="md:col-span-3 flex flex-col justify-between relative">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 leading-snug">
                            {{ $item->title }}
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed line-clamp-4">
                            {{ $item->description }}
                        </p>
                    </div>

                    {{-- Actions --}}
                    <div class="mt-6 flex flex-wrap items-center gap-3">
                        <a href="{{ route('opportunities.show', $item->slug) }}">
                            <x-secondary-button>
                                Baca selengkapnya
                                <svg class="w-4 h-4 ml-2 transition duration-300 group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </x-secondary-button>
                        </a>

                        <div class="h-11 flex items-center">
                            <livewire:save-opportunity :opportunity="$item" />
                        </div>

                        {{-- small meta pill (optional vibe, no logic change) --}}
                        <span class="ml-auto inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                     bg-gray-50 text-gray-700 border border-gray-200
                                     dark:bg-white/5 dark:text-gray-200 dark:border-white/10">
                            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                            Terverifikasi
                        </span>
                    </div>
                </div>
            </article>
        @empty
            <div
                class="relative overflow-hidden text-center py-20 rounded-2xl
                       bg-white/90 dark:bg-white/5 backdrop-blur-md
                       border border-gray-200/70 dark:border-white/10
                       ring-1 ring-black/5 dark:ring-white/10">

                <div class="pointer-events-none absolute -inset-10">
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-200/20 via-blue-200/16 to-indigo-200/16 blur-3xl dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10"></div>
                </div>

                <p class="relative text-lg font-semibold text-gray-800 dark:text-gray-100">
                    Belum ada opportunity tersedia
                </p>
                <p class="relative text-sm text-gray-500 dark:text-gray-400 mt-2">
                    Silakan kembali lagi nanti.
                </p>

                <div class="relative mt-6 inline-flex items-center gap-2 rounded-full px-4 py-2 text-xs font-semibold
                            bg-white border border-gray-200 text-gray-700
                            dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                    Update rutin & terkurasi
                </div>
            </div>
        @endforelse
    </div>
</div>
