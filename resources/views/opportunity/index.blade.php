<x-app-layout>
    <x-slot name="title">
        Opportunity
    </x-slot>

    <x-slot name="header">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
                    Opportunity
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Setiap peluang adalah pintu — tapi hanya yang tepat layak diketuk.
                </p>
            </div>

            <div class="hidden sm:flex items-center gap-2 shrink-0">
                <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                             bg-white border border-gray-200 text-gray-700
                             dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                    Terkurasi
                </span>

                <span class="hidden md:inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                             bg-gray-50 border border-gray-200 text-gray-700
                             dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-indigo-500 to-cyan-400"></span>
                    Tanpa noise
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 relative overflow-hidden">
        {{-- accent background --}}
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-28 left-1/3 h-[440px] w-[440px] rounded-full blur-3xl
                        bg-gradient-to-r from-cyan-300/18 to-blue-400/14
                        dark:from-cyan-400/10 dark:to-blue-500/10"></div>
            <div class="absolute -bottom-32 right-1/4 h-[480px] w-[480px] rounded-full blur-3xl
                        bg-gradient-to-r from-indigo-300/14 to-cyan-300/14
                        dark:from-indigo-500/10 dark:to-cyan-500/10"></div>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            {{-- Wrapper glass --}}
            <div class="relative overflow-hidden rounded-2xl
                        bg-white/90 dark:bg-white/5 backdrop-blur-md
                        border border-gray-200/70 dark:border-white/10
                        ring-1 ring-black/5 dark:ring-white/10
                        shadow-sm">

                {{-- Glow inside --}}
                <div class="pointer-events-none absolute -inset-10">
                    <div class="absolute inset-0 opacity-60 dark:opacity-40
                                bg-gradient-to-r from-cyan-200/20 via-blue-200/16 to-indigo-200/16
                                dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                blur-3xl"></div>
                </div>

                <div class="relative p-5 md:p-7">
                    {{-- Top hint --}}
                    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
                        <div class="min-w-0">
                            <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                Jelajahi Opportunity
                            </p>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Pilih kategori, baca detail, simpan yang relevan.
                            </p>
                        </div>

                        <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                     bg-white/70 border border-gray-200/70 text-gray-700
                                     dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                            TAPAK Opportunities
                        </span>
                    </div>

                    {{-- Livewire content --}}
                        <livewire:opportunity-tabs />
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
