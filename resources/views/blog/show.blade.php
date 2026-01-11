<x-app-layout>
    <x-slot name="title">
        {{ $blog->title }}
    </x-slot>

    <x-slot name="header">
        <div class="flex items-start justify-between gap-4">
            <div class="min-w-0">
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight truncate">
                    {{ $blog->title }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Bacaan singkat, niat panjang — biar insight-nya nempel.
                </p>
            </div>

            <div class="flex gap-2 shrink-0">
                @can('update', $blog)
                    <a href="{{ route('blogs.edit', $blog) }}">
                        <x-button>{{ __('Edit') }}</x-button>
                    </a>
                @endcan

                @can('delete', $blog)
                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus tulisan ini?')">
                        @csrf
                        @method('DELETE')
                        <x-danger-button>{{ __('Hapus') }}</x-danger-button>
                    </form>
                @endcan
            </div>
        </div>
    </x-slot>

    @php
        // reading time simple (±200 kata/menit)
        $plain = trim(preg_replace('/\s+/', ' ', strip_tags($blog->content ?? '')));
        $words = $plain ? str_word_count($plain) : 0;
        $minutes = max(1, (int) ceil($words / 200));
    @endphp

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Wrapper glass --}}
            <article class="relative overflow-hidden rounded-2xl
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

                    {{-- Meta row --}}
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-6">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-10 w-10 rounded-xl flex items-center justify-center
                                        bg-gray-100 text-gray-700
                                        dark:bg-white/5 dark:text-gray-200
                                        border border-gray-200 dark:border-white/10">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 20h9" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4 12.5-12.5z" />
                                </svg>
                            </div>

                            <div class="min-w-0">
                                <p class="text-sm text-gray-600 dark:text-gray-300 truncate">
                                    Ditulis oleh
                                    <span class="font-semibold text-gray-900 dark:text-gray-100">
                                        {{ $blog->author->name ?? 'Anonim' }}
                                    </span>
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    {{ $blog->created_at->translatedFormat('d F Y') }}
                                    <span class="mx-2">•</span>
                                    {{ $minutes }} menit baca
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                         bg-gray-50 border border-gray-200 text-gray-700
                                         dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                                <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                                TAPAK Insight
                            </span>
                        </div>
                    </div>

                    {{-- Thumbnail --}}
                    @if ($blog->thumbnail)
                        <div class="mb-8">
                            <div class="relative overflow-hidden rounded-2xl
                                        border border-gray-200 dark:border-white/10
                                        ring-1 ring-black/5 dark:ring-white/10">
                                <img src="{{ asset('storage/' . $blog->thumbnail) }}"
                                     alt="{{ $blog->title }}"
                                     class="w-full h-auto object-cover">
                                <div class="pointer-events-none absolute inset-0
                                            bg-gradient-to-t from-black/25 via-transparent to-transparent
                                            opacity-40"></div>
                            </div>
                        </div>
                    @endif

                    {{-- Content --}}
                    <div class="prose prose-lg dark:prose-invert max-w-none
                                prose-headings:scroll-mt-24
                                prose-p:text-gray-700 dark:prose-p:text-gray-200
                                break-words">
                        {!! nl2br(e($blog->content)) !!}
                    </div>

                    {{-- Footer nav --}}
                    <div class="mt-10 pt-6 border-t border-gray-200 dark:border-white/10">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <a href="{{ route('blogs.index') }}"
                               class="inline-flex items-center gap-2 text-sm font-semibold
                                      text-blue-600 hover:text-blue-700
                                      dark:text-blue-400 dark:hover:text-cyan-200 transition">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 19l-7-7 7-7" />
                                </svg>
                                Kembali ke daftar tulisan
                            </a>
                        </div>
                    </div>

                </div>
            </article>

        </div>
    </div>
</x-app-layout>
