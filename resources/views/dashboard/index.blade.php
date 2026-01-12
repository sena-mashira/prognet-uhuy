<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
                    Dashboard
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Ringkasan perjalananmu hari ini — peluang, diskusi, dan tulisan.
                </p>
            </div>

            <div class="hidden sm:flex items-center gap-2">
                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
                             bg-blue-50 text-blue-700 border border-blue-100
                             dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                    Personal Space
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 relative overflow-hidden">
        <!-- accent background (halus) -->
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-24 left-1/3 h-[420px] w-[420px] rounded-full blur-3xl
                        bg-gradient-to-r from-cyan-300/18 to-blue-400/14 dark:from-cyan-400/10 dark:to-blue-500/10"></div>
            <div class="absolute -bottom-28 right-1/4 h-[460px] w-[460px] rounded-full blur-3xl
                        bg-gradient-to-r from-indigo-300/14 to-cyan-300/14 dark:from-indigo-500/10 dark:to-cyan-500/10"></div>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- quick stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="neon-card rounded-2xl border border-gray-200 dark:border-white/10 bg-white/80 dark:bg-white/5 backdrop-blur-md
                            ring-1 ring-black/5 dark:ring-white/10 p-5">
                    <p class="text-xs font-semibold tracking-wide uppercase text-gray-500 dark:text-gray-400">Peluang</p>
                    <div class="mt-2 flex items-end justify-between">
                        <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $savedOpportunities->count() }}</p>
                        <span class="text-xs text-gray-500 dark:text-gray-400">tersimpan</span>
                    </div>
                </div>

                <div class="neon-card rounded-2xl border border-gray-200 dark:border-white/10 bg-white/80 dark:bg-white/5 backdrop-blur-md
                            ring-1 ring-black/5 dark:ring-white/10 p-5">
                    <p class="text-xs font-semibold tracking-wide uppercase text-gray-500 dark:text-gray-400">Threads</p>
                    <div class="mt-2 flex items-end justify-between">
                        <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $threads->count() }}</p>
                        <span class="text-xs text-gray-500 dark:text-gray-400">dibuat</span>
                    </div>
                </div>

                <div class="neon-card rounded-2xl border border-gray-200 dark:border-white/10 bg-white/80 dark:bg-white/5 backdrop-blur-md
                            ring-1 ring-black/5 dark:ring-white/10 p-5">
                    <p class="text-xs font-semibold tracking-wide uppercase text-gray-500 dark:text-gray-400">Blog</p>
                    <div class="mt-2 flex items-end justify-between">
                        <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $blogs->count() }}</p>
                        <span class="text-xs text-gray-500 dark:text-gray-400">artikel</span>
                    </div>
                </div>
            </div>

            {{-- Saved Opportunities --}}
            <section
                class="neon-card bg-white/90 dark:bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-gray-200 dark:border-white/10
                       ring-1 ring-black/5 dark:ring-white/10 transition duration-300 ease-out transform hover:-translate-y-1">
                <div class="flex items-center justify-between gap-4 mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            Peluang tersimpan
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Yang kamu tandai untuk dilihat lagi nanti.
                        </p>
                    </div>

                    <span class="hidden sm:inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
                                 bg-blue-50 text-blue-700 border border-blue-100
                                 dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                        <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                        Keep it close
                    </span>
                </div>

                <div class="divide-y divide-gray-200 dark:divide-white/10">
                    @forelse ($savedOpportunities as $item)
                        <div class="py-4 flex items-start justify-between gap-4">
                            <div class="min-w-0">
                                <a href="{{ route('opportunities.show', $item->slug) }}"
                                   class="inline-flex items-center gap-2 text-base font-semibold text-blue-700 hover:text-blue-800 hover:underline underline-offset-4 transition
                                          dark:text-cyan-200 dark:hover:text-cyan-100">
                                    <span class="h-2 w-2 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                                    <span class="truncate">{{ $item->title }}</span>
                                </a>
                                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                    {{ Str::limit($item->description, 120) }}
                                </p>
                            </div>

                            <a href="{{ route('opportunities.show', $item->slug) }}"
                               class="shrink-0 inline-flex items-center gap-2 text-xs font-semibold
                                      text-gray-700 dark:text-gray-200
                                      border border-gray-200 dark:border-white/10 rounded-full px-3 py-2
                                      bg-white/70 dark:bg-white/5 hover:bg-gray-50 dark:hover:bg-white/10 transition">
                                Lihat
                                <span class="transition duration-300 group-hover:translate-x-0.5">→</span>
                            </a>
                        </div>
                    @empty
                        <div class="py-6">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Belum ada peluang yang disimpan.
                            </p>
                        </div>
                    @endforelse
                </div>
            </section>

            {{-- Thread Saya --}}
            <section
                class="neon-card bg-white/90 dark:bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-gray-200 dark:border-white/10
                       ring-1 ring-black/5 dark:ring-white/10 transition duration-300 ease-out transform hover:-translate-y-1">
                <div class="flex items-center justify-between gap-4 mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            Thread dibuat
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Jejak diskusi yang pernah kamu mulai.
                        </p>
                    </div>

                    <span class="hidden sm:inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
                                 bg-indigo-50 text-indigo-700 border border-indigo-100
                                 dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                        <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-indigo-500 to-cyan-400"></span>
                        Speak up
                    </span>
                </div>

                <div class="divide-y divide-gray-200 dark:divide-white/10">
                    @forelse ($threads as $thread)
                        <div class="py-4">
                            <a href="{{ route('threads.show', $thread) }}"
                               class="text-base font-semibold text-blue-700 hover:text-blue-800 hover:underline underline-offset-4 transition
                                      dark:text-cyan-200 dark:hover:text-cyan-100">
                                {{ $thread->title }}
                            </a>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 flex items-center gap-2">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500/80"></span>
                                Dibuat {{ $thread->created_at->diffForHumans() }}
                            </p>
                        </div>
                    @empty
                        <div class="py-6">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Kamu belum memulai diskusi apa pun.
                            </p>
                        </div>
                    @endforelse
                </div>
            </section>

            {{-- Blog Saya --}}
            <section
                class="neon-card bg-white/90 dark:bg-white/5 backdrop-blur-md p-6 rounded-2xl border border-gray-200 dark:border-white/10
                       ring-1 ring-black/5 dark:ring-white/10 transition duration-300 ease-out transform hover:-translate-y-1">
                <div class="flex items-center justify-between gap-4 mb-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            Blog
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Tulisanmu — ringkas, tajam, dan berguna.
                        </p>
                    </div>

                    <span class="hidden sm:inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
                                 bg-cyan-50 text-cyan-800 border border-cyan-100
                                 dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                        <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                        Craft
                    </span>
                </div>

                <div class="divide-y divide-gray-200 dark:divide-white/10">
                    @forelse ($blogs as $blog)
                        <div class="py-4">
                            <a href="{{ route('blogs.show', $blog->slug) }}"
                               class="text-base font-semibold text-gray-900 hover:text-blue-800 hover:underline underline-offset-4 transition
                                      dark:text-gray-100 dark:hover:text-cyan-100">
                                {{ $blog->title }}
                            </a>
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                                {{ $blog->created_at->format('d M Y') }}
                            </p>
                        </div>
                    @empty
                        <div class="py-6">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Belum ada artikel yang kamu tulis.
                            </p>
                        </div>
                    @endforelse
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
