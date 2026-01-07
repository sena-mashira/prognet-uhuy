<div class="max-w-6xl mx-auto px-6">
    <ul class="flex flex-wrap gap-2 text-sm font-medium text-center">
        {{-- ALL --}}
        <li>
            <button wire:click="setCategory('all')"
    class="px-4 py-2 rounded-md transition font-medium
    {{ $activeCategory === 'all'
        ? 'bg-gradient-to-r from-[#2563EB] to-[#22D3EE] text-white shadow-md'
        : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
    All
</button>
        </li>

        {{-- CATEGORY --}}
        @foreach ($categories as $category)
            <li>
                <button wire:click="setCategory('{{ $category->slug }}')"
                    class="px-4 py-2 rounded-md transition
                {{ $activeCategory === $category->slug
                    ? 'bg-blue-600 text-white'
                    : 'bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600' }}">
                    {{ $category->name }}
                </button>
            </li>
        @endforeach
    </ul>

    <div class="mt-6 space-y-6">
        @forelse ($opportunities as $item)
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
                    <img src="{{ asset('storage/' . $item->poster_url) }}" alt="{{ $item->title }}"
                        class="w-full h-64 object-cover rounded-lg
                                       group-hover:scale-[1.02] transition">
                </div>

                {{-- Content --}}
                <div class="md:col-span-3 flex flex-col justify-between">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 leading-snug">
                            {{ $item->title }}
                        </h3>

                        <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed line-clamp-4">
                            {{ $item->description }}
                        </p>
                    </div>

                    {{-- Actions --}}
                    <div class="mt-6 flex items-center gap-3">
                        <a href="{{ route('opportunities.show', $item->slug) }}">
                            <x-secondary-button>
                                Baca selengkapnya
                                <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </x-secondary-button>
                        </a>

                        <div class="h-11 flex items-center">
                            <livewire:save-opportunity :opportunity="$item" />
                        </div>
                    </div>
                </div>
            </article>
        @empty
            <div
                class="text-center py-24 rounded-xl
                               bg-white dark:bg-gray-800
                               border border-gray-100 dark:border-gray-700">
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    Belum ada opportunity tersedia
                </p>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Silakan kembali lagi nanti.
                </p>
            </div>
        @endforelse
    </div>
</div>
