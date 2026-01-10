<x-app-layout>
    <x-slot name="title">
        Thread
    </x-slot>

    <x-slot name="header">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
                    Threads
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Tempat ide kecil jadi obrolan besar — tanpa kebisingan.
                </p>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <span class="hidden md:inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                             bg-white border border-gray-200 text-gray-700
                             dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                    Diskusi aktif
                </span>

                <a href="{{ route('threads.create') }}">
                    <x-button>+ Buat Thread</x-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            {{-- Wrapper glass --}}
            <div class="relative overflow-hidden rounded-2xl
                        bg-white/90 dark:bg-white/5 backdrop-blur-md
                        border border-gray-200/70 dark:border-white/10
                        ring-1 ring-black/5 dark:ring-white/10
                        shadow-sm">

                {{-- Glow bg --}}
                <div class="pointer-events-none absolute -inset-10">
                    <div class="absolute inset-0 opacity-60 dark:opacity-40
                                bg-gradient-to-r from-cyan-200/20 via-blue-200/16 to-indigo-200/16
                                dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                blur-3xl"></div>
                </div>

                <div class="relative p-6 md:p-8">

                    {{-- List --}}
                    <div class="space-y-4">
                        @forelse ($threads as $thread)
                            <a href="{{ route('threads.show', $thread) }}"
                               class="group block rounded-2xl p-6
                                      bg-white/70 hover:bg-white
                                      dark:bg-white/5 dark:hover:bg-white/10
                                      border border-gray-200/70 dark:border-white/10
                                      ring-1 ring-black/5 dark:ring-white/10
                                      transition duration-300
                                      hover:-translate-y-0.5 hover:shadow-xl">

                                <div class="flex items-start justify-between gap-4">
                                    <div class="min-w-0">
                                        <h3 class="text-lg md:text-xl font-semibold text-gray-900 dark:text-gray-100 leading-snug">
                                            {{ $thread->title }}
                                        </h3>

                                        <div class="mt-2 flex flex-wrap items-center gap-2 text-xs">
                                            <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 font-semibold
                                                         bg-gray-50 text-gray-700 border border-gray-200
                                                         dark:bg-white/5 dark:text-gray-200 dark:border-white/10">
                                                <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                                                {{ $thread->author->name }}
                                            </span>

                                            <span class="text-gray-500 dark:text-gray-400">
                                                · {{ $thread->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="shrink-0 hidden sm:flex items-center">
                                        <span class="inline-flex items-center gap-2 text-sm font-semibold
                                                     text-blue-600 dark:text-blue-400 group-hover:text-cyan-500 dark:group-hover:text-cyan-200 transition">
                                            Baca
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M9 5l7 7-7 7" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <p class="mt-4 text-sm md:text-base text-gray-700 dark:text-gray-300 leading-relaxed line-clamp-2">
                                    {{ Str::limit($thread->body, 160) }}
                                </p>

                                <div class="mt-5 flex items-center justify-between">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                        Lanjutkan diskusi → setitik ide, sepaham langkah.
                                    </span>

                                    <span class="inline-flex items-center gap-2 rounded-xl px-3 py-2 text-xs font-semibold
                                                 bg-gray-100 text-gray-800 border border-gray-200
                                                 dark:bg-white/5 dark:text-gray-200 dark:border-white/10
                                                 opacity-0 group-hover:opacity-100 transition">
                                        Detail
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        @empty
                            <div class="text-center py-16 rounded-2xl
                                        bg-white/70 dark:bg-white/5
                                        border border-gray-200/70 dark:border-white/10
                                        ring-1 ring-black/5 dark:ring-white/10">
                                <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                    Belum ada diskusi.
                                </p>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                    Mulai dari satu pertanyaan. Biasanya, jawaban datang dari banyak kepala.
                                </p>

                                <div class="mt-6">
                                    <a href="{{ route('threads.create') }}">
                                        <x-button>+ Buat Thread Pertama</x-button>
                                    </a>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="pt-8">
                        {{ $threads->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
