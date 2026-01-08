<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Saved Opportunities --}}
            <section
                class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    Peluang tersimpan
                </h3>

                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($savedOpportunities as $item)
                        <div class="py-4">
                            <a href="{{ route('opportunities.show', $item->slug) }}"
                               class="text-base font-medium text-blue-600 hover:text-blue-700 hover:underline transition">
                                {{ $item->title }}
                            </a>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ Str::limit($item->description, 120) }}
                            </p>
                        </div>
                    @empty
                        <p class="py-4 text-sm text-gray-500 dark:text-gray-400">
                            Belum ada peluang yang disimpan.
                        </p>
                    @endforelse
                </div>
            </section>

            {{-- Thread Saya --}}
            <section
                class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    Thread dibuat
                </h3>

                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($threads as $thread)
                        <div class="py-4">
                            <a href="{{ route('threads.show', $thread) }}"
                               class="text-base font-medium text-blue-600 hover:text-blue-700 hover:underline transition">
                                {{ $thread->title }}
                            </a>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Dibuat {{ $thread->created_at->diffForHumans() }}
                            </p>
                        </div>
                    @empty
                        <p class="py-4 text-sm text-gray-500 dark:text-gray-400">
                            Kamu belum memulai diskusi apa pun.
                        </p>
                    @endforelse
                </div>
            </section>

            {{-- Blog Saya --}}
            <section
                class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                    Blog
                </h3>

                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($blogs as $blog)
                        <div class="py-4">
                            <a href="{{ route('blogs.show', $blog->slug) }}"
                               class="text-base font-medium text-black-600 hover:text-blue-700 hover:underline transition">
                                {{ $blog->title }}
                            </a>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                {{ $blog->created_at->translatedFormat('d F Y') }}
                            </p>
                        </div>
                    @empty
                        <p class="py-4 text-sm text-gray-500 dark:text-gray-400">
                            Belum ada artikel yang kamu tulis.
                        </p>
                    @endforelse
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
