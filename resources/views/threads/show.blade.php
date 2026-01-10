<x-app-layout>
    <x-slot name="title">
        {{ $thread->title }}
    </x-slot>

    <x-slot name="header">
        <div class="flex items-start justify-between gap-4">
            <div class="min-w-0">
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight truncate">
                    {{ $thread->title }}
                </h2>

                <div class="mt-2 flex flex-wrap items-center gap-2 text-xs">
                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 font-semibold
                                 bg-white border border-gray-200 text-gray-700
                                 dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                        oleh {{ $thread->author->name }}
                    </span>

                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 font-semibold
                                 bg-gray-50 border border-gray-200 text-gray-700
                                 dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                        <svg class="w-4 h-4 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6v6l4 2" />
                        </svg>
                        {{ $thread->created_at->diffForHumans() }}
                    </span>

                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 font-semibold
                                 bg-gray-50 border border-gray-200 text-gray-700
                                 dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                        <svg class="w-4 h-4 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 8h10M7 12h6m-6 4h10" />
                        </svg>
                        {{ $thread->replies->count() }} balasan
                    </span>

                    @if ($thread->is_locked)
                        <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 font-semibold
                                     bg-red-50 border border-red-200 text-red-700
                                     dark:bg-red-500/10 dark:border-red-500/20 dark:text-red-200">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 11V7a4 4 0 10-8 0v4m2 0h8m-8 0v10h8V11" />
                            </svg>
                            Thread dikunci
                        </span>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <a href="{{ route('threads.index') }}">
                    <x-secondary-button>← Kembali</x-secondary-button>
                </a>

                @can('delete', $thread)
                    <form action="{{ route('threads.destroy', $thread) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus thread ini?')">
                        @csrf
                        @method('DELETE')
                        <x-danger-button>{{ __('Hapus') }}</x-danger-button>
                    </form>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- THREAD UTAMA --}}
            <article class="relative overflow-hidden rounded-2xl
                            bg-white/90 dark:bg-white/5 backdrop-blur-md
                            border border-gray-200/70 dark:border-white/10
                            ring-1 ring-black/5 dark:ring-white/10
                            shadow-sm">

                {{-- Glow --}}
                <div class="pointer-events-none absolute -inset-10">
                    <div class="absolute inset-0 opacity-60 dark:opacity-40
                                bg-gradient-to-r from-cyan-200/18 via-blue-200/14 to-indigo-200/14
                                dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                blur-3xl"></div>
                </div>

                <div class="relative p-6 md:p-8">
                    <div class="flex items-start justify-between gap-4">
                        <div class="min-w-0">
                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                Ditulis oleh
                                <span class="font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $thread->author->name }}
                                </span>
                                · <span class="font-medium">{{ $thread->created_at->translatedFormat('d F Y') }}</span>
                            </p>

                            <h1 class="mt-3 text-2xl md:text-3xl font-semibold tracking-tight text-gray-900 dark:text-white leading-snug">
                                {{ $thread->title }}
                            </h1>
                        </div>

                        <span class="hidden md:inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                     bg-gray-50 border border-gray-200 text-gray-700
                                     dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                            TAPAK Thread
                        </span>
                    </div>

                    <div class="mt-6 text-gray-800 dark:text-gray-100 leading-relaxed whitespace-pre-line">
                        {{ $thread->body }}
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200/80 dark:border-white/10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            “Diskusi yang baik bukan soal menang — tapi soal paham.”
                        </p>

                        <div class="flex items-center gap-2">
                            <a href="#replies"
                               class="inline-flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold
                                      bg-gray-100 text-gray-800 border border-gray-200 hover:bg-gray-200
                                      dark:bg-white/5 dark:text-gray-200 dark:border-white/10 dark:hover:bg-white/10 transition">
                                Lihat balasan
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>

                            @auth
                                @if (!$thread->is_locked)
                                    <a href="#reply-form"
                                       class="inline-flex items-center gap-2 rounded-xl px-4 py-2 text-sm font-semibold text-white
                                              bg-gradient-to-r from-[#2563EB] to-[#22D3EE]
                                              shadow-[0_14px_40px_rgba(34,211,238,0.16)]
                                              hover:shadow-[0_18px_55px_rgba(34,211,238,0.22)]
                                              transition">
                                        Balas sekarang
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </article>

            {{-- FORM BALASAN --}}
            @auth
                <section id="reply-form"
                         class="relative overflow-hidden rounded-2xl
                                bg-white/90 dark:bg-white/5 backdrop-blur-md
                                border border-gray-200/70 dark:border-white/10
                                ring-1 ring-black/5 dark:ring-white/10
                                shadow-sm">
                    <div class="pointer-events-none absolute -inset-10">
                        <div class="absolute inset-0 opacity-55 dark:opacity-35
                                    bg-gradient-to-r from-cyan-200/16 via-blue-200/12 to-indigo-200/12
                                    dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                    blur-3xl"></div>
                    </div>

                    <div class="relative p-6 md:p-8">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tulis Balasan
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    Jawab dengan sopan, jelas, dan kasih konteks biar diskusi naik kelas.
                                </p>
                            </div>

                            @if ($thread->is_locked)
                                <span class="shrink-0 inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                             bg-red-50 border border-red-200 text-red-700
                                             dark:bg-red-500/10 dark:border-red-500/20 dark:text-red-200">
                                    Thread dikunci
                                </span>
                            @endif
                        </div>

                        @if (!$thread->is_locked)
                            <form action="{{ route('replies.store', $thread) }}" method="POST" class="mt-6 space-y-4">
                                @csrf

                                <textarea name="body" rows="5"
                                          class="w-full rounded-xl px-4 py-3
                                                 bg-white dark:bg-white/5
                                                 border border-gray-200 dark:border-white/10
                                                 text-gray-900 dark:text-gray-100
                                                 placeholder:text-gray-400 dark:placeholder:text-gray-500
                                                 ring-1 ring-black/5 dark:ring-white/10
                                                 focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                                 transition resize-y"
                                          placeholder="Tulis balasanmu... (boleh poin-poin biar enak dibaca)">{{ old('body') }}</textarea>

                                @error('body')
                                    <p class="text-red-600 dark:text-red-400 text-sm">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="flex flex-col sm:flex-row items-center gap-3">
                                    <button type="submit"
                                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                                                   rounded-xl px-5 py-3 font-semibold text-white
                                                   bg-gradient-to-r from-[#2563EB] to-[#22D3EE]
                                                   shadow-[0_14px_40px_rgba(34,211,238,0.20)]
                                                   hover:shadow-[0_18px_55px_rgba(34,211,238,0.28)]
                                                   transition duration-300">
                                        Kirim Balasan
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </button>

                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        Hindari spam. Fokus bantu, bukan panas-panasan.
                                    </p>
                                </div>
                            </form>
                        @else
                            <p class="mt-6 text-sm text-red-600 dark:text-red-300">
                                Thread ini telah dikunci, jadi balasan baru tidak bisa ditambahkan.
                            </p>
                        @endif
                    </div>
                </section>
            @endauth

            {{-- BALASAN --}}
            <section id="replies" class="space-y-4">
                <div class="flex items-center justify-between gap-4">
                    <h3 class="font-semibold text-lg text-gray-900 dark:text-gray-100">
                        Balasan ({{ $thread->replies->count() }})
                    </h3>

                    <span class="hidden sm:inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                 bg-gray-50 border border-gray-200 text-gray-700
                                 dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                        Diskusi berjalan
                    </span>
                </div>

                @forelse ($thread->replies as $reply)
                    <div class="relative overflow-hidden rounded-2xl
                                bg-white/90 dark:bg-white/5 backdrop-blur-md
                                border border-gray-200/70 dark:border-white/10
                                ring-1 ring-black/5 dark:ring-white/10
                                shadow-sm">

                        <div class="pointer-events-none absolute -inset-10 opacity-40 dark:opacity-25">
                            <div class="absolute inset-0 bg-gradient-to-r from-cyan-200/12 via-blue-200/10 to-indigo-200/10
                                        dark:from-cyan-400/8 dark:via-blue-500/8 dark:to-indigo-500/8 blur-3xl"></div>
                        </div>

                        <div class="relative p-5 md:p-6">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold text-gray-800 dark:text-gray-200">
                                            {{ $reply->author->name }}
                                        </span>
                                        · {{ $reply->created_at->diffForHumans() }}
                                    </p>
                                </div>

                                @can('delete', $reply)
                                    <form action="{{ route('replies.destroy', $reply) }}" method="POST"
                                          onsubmit="return confirm('Hapus balasan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-xs font-semibold text-red-600 dark:text-red-300 hover:underline">
                                            Hapus
                                        </button>
                                    </form>
                                @endcan
                            </div>

                            <p class="mt-3 text-gray-800 dark:text-gray-100 leading-relaxed whitespace-pre-line">
                                {{ $reply->body }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-16 rounded-2xl
                                bg-white/90 dark:bg-white/5 backdrop-blur-md
                                border border-gray-200/70 dark:border-white/10
                                ring-1 ring-black/5 dark:ring-white/10">
                        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                            Belum ada balasan.
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            Jadi yang pertama bikin diskusi bergerak.
                        </p>
                    </div>
                @endforelse
            </section>

        </div>
    </div>
</x-app-layout>
