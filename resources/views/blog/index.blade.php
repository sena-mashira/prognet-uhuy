<x-app-layout>
    <x-slot name="title">
        Blog
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                Blogs
            </h2>
            <a href="{{ route('blogs.create') }}">
                <x-button>+ Tulis Blog</x-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @forelse ($blogs as $blog)
                <article
                    class="group grid grid-cols-1 md:grid-cols-5 gap-6
               bg-white dark:bg-gray-800
               border border-gray-100 dark:border-gray-700
               rounded-xl p-6
               shadow-sm dark:shadow-none
               hover:shadow-lg hover:dark:border-gray-600
               transition">

                    {{-- Thumbnail --}}
                    <div class="md:col-span-2">
                        @if ($blog->thumbnail)
                            <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}"
                                class="w-full h-64 object-cover rounded-lg
                           group-hover:scale-[1.02] transition">
                        @else
                            <div
                                class="w-full h-64 rounded-lg
                           bg-gray-100 dark:bg-gray-700
                           flex items-center justify-center
                           text-gray-400 text-sm">
                                Tidak ada gambar
                            </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="md:col-span-3 flex flex-col justify-between">
                        <div>
                            <h3
                                class="text-2xl font-bold text-gray-900 dark:text-white
                           mb-2 leading-snug">
                                {{ $blog->title }}
                            </h3>

                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                                Dipublikasikan {{ $blog->created_at->translatedFormat('d F Y') }}
                            </p>

                            <p
                                class="text-gray-700 dark:text-gray-300
                           text-sm leading-relaxed line-clamp-4">
                                {{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 180) }}
                            </p>
                        </div>

                        {{-- Actions --}}
                        <div class="mt-6 flex items-center gap-3">
                            <a href="{{ route('blogs.show', $blog->slug) }}">
                                <x-secondary-button>
                                    Baca selengkapnya
                                    <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </x-secondary-button>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div
                    class="text-center py-24 rounded-xl
               bg-white dark:bg-gray-800
               border border-gray-100 dark:border-gray-700">
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        Belum ada tulisan yang dipublikasikan
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                        Silakan kembali lagi nanti.
                    </p>
                </div>
            @endforelse


            {{-- Pagination --}}
            <div class="pt-8">
                {{ $blogs->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
