<x-app-layout>
    <x-slot name="title">
        Buat Thread
    </x-slot>

    <x-slot name="header">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
                    Buat Thread
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Tulis yang jujur, ringkas, dan bisa ditindaklanjuti — biar diskusi cepat nyambung.
                </p>
            </div>

            <div class="hidden md:flex items-center gap-2">
                <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                             bg-white border border-gray-200 text-gray-700
                             dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                    Draft siap publish
                </span>

                <a href="{{ route('threads.index') }}">
                    <x-secondary-button>← Kembali</x-secondary-button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Wrapper Card --}}
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

                    {{-- Header inside card --}}
                    <div class="mb-6 flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Detail Thread
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Beri judul yang jelas + isi yang fokus, biar orang gampang bantu jawab.
                            </p>
                        </div>

                        <span class="shrink-0 inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                     bg-gray-50 border border-gray-200 text-gray-700
                                     dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                            Form TAPAK
                        </span>
                    </div>

                    <form action="{{ route('threads.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Title --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Judul
                            </label>

                            <input type="text" name="title" value="{{ old('title') }}"
                                   placeholder="Contoh: Gimana cara mulai portofolio tanpa pengalaman?"
                                   class="w-full rounded-xl px-4 py-3
                                          bg-white dark:bg-white/5
                                          border border-gray-200 dark:border-white/10
                                          text-gray-900 dark:text-gray-100
                                          placeholder:text-gray-400 dark:placeholder:text-gray-500
                                          ring-1 ring-black/5 dark:ring-white/10
                                          focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                          transition" />

                            @error('title')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Body --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Isi Diskusi
                            </label>

                            <textarea name="body" rows="7"
                                      placeholder="Ceritain konteks singkatnya, apa yang sudah dicoba, dan kamu butuh bantuan di bagian mana…"
                                      class="w-full rounded-xl px-4 py-3
                                             bg-white dark:bg-white/5
                                             border border-gray-200 dark:border-white/10
                                             text-gray-900 dark:text-gray-100
                                             placeholder:text-gray-400 dark:placeholder:text-gray-500
                                             ring-1 ring-black/5 dark:ring-white/10
                                             focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                             transition resize-y">{{ old('body') }}</textarea>

                            @error('body')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror

                            <div class="mt-2 flex items-center justify-between gap-3">
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Tips: tulis poin-poin biar enak dibaca.
                                </p>

                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    Jangan taruh data sensitif ya.
                                </span>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="pt-2 flex flex-col sm:flex-row items-center gap-3">
                            <button type="submit"
                                    class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                                           rounded-xl px-5 py-3 font-semibold text-white
                                           bg-gradient-to-r from-[#2563EB] to-[#22D3EE]
                                           shadow-[0_14px_40px_rgba(34,211,238,0.20)]
                                           hover:shadow-[0_18px_55px_rgba(34,211,238,0.28)]
                                           transition duration-300">
                                Publikasikan
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </button>

                            <a href="{{ route('threads.index') }}" class="w-full sm:w-auto">
                                <button type="button"
                                        class="w-full inline-flex items-center justify-center
                                               rounded-xl px-5 py-3 font-semibold
                                               bg-gray-100 text-gray-800 border border-gray-200
                                               hover:bg-gray-200
                                               dark:bg-white/5 dark:text-gray-200 dark:border-white/10 dark:hover:bg-white/10
                                               transition">
                                    Batal
                                </button>
                            </a>

                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                Setelah publish, kamu masih bisa edit judul & isi.
                            </p>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
