<x-app-layout>
    <x-slot name="title">
        Blog
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
                    Blogs
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Tulisan ringkas yang bikin fokus: insight, strategi, dan langkah kecil yang konsisten.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <span class="hidden md:inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                             bg-white border border-gray-200 text-gray-700
                             dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                    Update terus, no noise
                </span>

                <a href="{{ route('blogs.create') }}">
                    <x-button>+ Tulis Blog</x-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

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

                    {{-- Top bar --}}
                    <div class="mb-6 flex flex-col md:flex-row md:items-end md:justify-between gap-3">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Jelajahi tulisan terbaru
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Baca cepat, ambil intinya, lalu eksekusi.
                            </p>
                        </div>

                        <div class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                    bg-gray-50 border border-gray-200 text-gray-700
                                    dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                            {{ $blogs->total() ?? $blogs->count() }} tulisan
                        </div>
                    </div>

                    {{-- List --}}
                    <div class="space-y-6">
                        @forelse ($blogs as $blog)
                            <article
                                class="neon-card group grid grid-cols-1 md:grid-cols-5 gap-6
                                       bg-white dark:bg-white/5
                                       border border-gray-200/70 dark:border-white/10
                                       rounded-2xl p-6
                                       ring-1 ring-black/5 dark:ring-white/10
                                       shadow-sm dark:shadow-none
                                       transition duration-300 ease-out
                                       hover:-translate-y-1 hover:shadow-xl">

                                {{-- Thumbnail --}}
                                <div class="md:col-span-2">
                                    @if ($blog->thumbnail)
                                        <div class="relative overflow-hidden rounded-xl
                                                    border border-gray-200/70 dark:border-white/10
                                                    bg-gray-50 dark:bg-white/5
                                                    ring-1 ring-black/5 dark:ring-white/10">
                                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}"
                                                class="w-full h-64 object-cover
                                                       transition duration-500 ease-out
                                                       group-hover:scale-[1.04]" loading="lazy">
                                            <div class="pointer-events-none absolute inset-0 opacity-0 group-hover:opacity-100 transition duration-300
                                                        bg-gradient-to-tr from-cyan-200/0 via-blue-200/0 to-indigo-200/0
                                                        dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10"></div>
                                        </div>
                                    @else
                                        <div class="h-64 rounded-xl
                                                    border border-dashed border-gray-300 dark:border-white/15
                                                    bg-gray-50 dark:bg-white/5
                                                    ring-1 ring-black/5 dark:ring-white/10
                                                    flex items-center justify-center text-center px-6">
                                            <div>
                                                <p class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                                    Tidak ada thumbnail
                                                </p>
                                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                                    Tetap bisa dibaca — fokus ke isi.
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                {{-- Content --}}
                                <div class="md:col-span-3 flex flex-col justify-between">
                                    <div>
                                        <div class="flex flex-wrap items-center gap-2">
                                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold
                                                         bg-blue-50 text-blue-700
                                                         dark:bg-white/5 dark:text-cyan-200">
                                                Blog
                                            </span>

                                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                                Dipublikasikan {{ $blog->created_at->translatedFormat('d F Y') }}
                                            </span>
                                        </div>

                                        <h3 class="mt-3 text-2xl font-bold text-gray-900 dark:text-white leading-snug
                                                   transition duration-300
                                                   group-hover:text-blue-700 dark:group-hover:text-cyan-200">
                                            {{ $blog->title }}
                                        </h3>

                                        <p class="mt-3 text-gray-700 dark:text-gray-300 text-sm leading-relaxed line-clamp-4">
                                            {{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 180) }}
                                        </p>
                                    </div>

                                    {{-- Actions --}}
                                    <div class="mt-6 flex items-center justify-between gap-3">
                                        <a href="{{ route('blogs.show', $blog->slug) }}">
                                            <x-secondary-button>
                                                Baca selengkapnya
                                                <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </x-secondary-button>
                                        </a>

                                        <span class="hidden sm:inline text-xs text-gray-500 dark:text-gray-400">
                                            “Ambil intinya, jalankan pelan-pelan.”
                                        </span>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <div class="relative overflow-hidden rounded-2xl
                                        bg-white dark:bg-white/5
                                        border border-gray-200/70 dark:border-white/10
                                        ring-1 ring-black/5 dark:ring-white/10
                                        p-10 md:p-12 text-center">

                                <div class="pointer-events-none absolute -inset-10 opacity-60 dark:opacity-35">
                                    <div class="absolute inset-0 bg-gradient-to-r
                                                from-cyan-200/20 via-blue-200/16 to-indigo-200/16
                                                dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                                blur-3xl"></div>
                                </div>

                                <div class="relative">
                                    <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                        Belum ada tulisan yang dipublikasikan
                                    </p>
                                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                        Jadilah yang pertama—tulis sesuatu yang bermanfaat, singkat, dan jernih.
                                    </p>

                                    <div class="mt-6">
                                        <a href="{{ route('blogs.create') }}">
                                            <x-button>+ Tulis Blog Pertama</x-button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    {{-- Pagination --}}
                    <div class="pt-8">
                        {{ $blogs->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
