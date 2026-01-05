<x-app-layout>
    <x-slot name="title">
        Thread
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                Threads
            </h2>
            <a href="{{ route('threads.create') }}">
                <x-button>+ Buat Thread</x-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @forelse ($threads as $thread)
                <a href="{{ route('threads.show', $thread) }}"
                    class="block p-6 bg-white dark:bg-gray-800 rounded-xl shadow hover:bg-gray-50 transition">

                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ $thread->title }}
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        oleh {{ $thread->author->name }}
                        · {{ $thread->created_at->diffForHumans() }}
                    </p>

                    <p class="mt-3 text-gray-700 dark:text-gray-300 line-clamp-2">
                        {{ Str::limit($thread->body, 150) }}
                    </p>
                </a>
            @empty
                <p class="text-gray-500">Belum ada diskusi.</p>
            @endforelse

            <div>
                {{ $threads->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
