<x-app-layout>
    <x-slot name="title">
        {{ $thread->title }}
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                {{ $thread->title }}
            </h2>

            @can('delete', $thread)
                <form action="{{ route('threads.destroy', $thread) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus thread ini?')">
                    @csrf
                    @method('DELETE')
                    <x-danger-button>
                        {{ __('Hapus') }}
                    </x-danger-button>
                </form>
            @endcan
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- Thread Utama --}}
            <article class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow border border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-start mb-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Ditulis oleh <span class="font-medium text-gray-700 dark:text-gray-200">
                            {{ $thread->author->name }}
                        </span>
                        · {{ $thread->created_at->diffForHumans() }}
                    </p>
                </div>

                <div class="text-gray-800 dark:text-gray-100 leading-relaxed whitespace-pre-line">
                    {{ $thread->body }}
                </div>
            </article>

            {{-- Form Balasan --}}
            @auth
                @if (!$thread->is_locked)
                    <section
                        class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow border border-gray-200 dark:border-gray-700">
                        <h3 class="font-semibold text-lg mb-4 text-gray-800 dark:text-gray-100">
                            Tulis Balasan
                        </h3>

                        <form action="{{ route('replies.store', $thread) }}" method="POST">
                            @csrf

                            <textarea name="body" rows="4"
                                class="w-full rounded-lg p-3
                                       bg-white dark:bg-gray-900
                                       text-gray-800 dark:text-gray-100
                                       border border-gray-300 dark:border-gray-700
                                       focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Sampaikan pendapatmu secara sopan dan jelas..."></textarea>

                            @error('body')
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1">
                                    {{ $message }}
                                </p>
                            @enderror

                            <div class="mt-4">
                                <button type="submit"
                                    class="px-5 py-2 rounded-lg font-medium text-white
                                           bg-blue-600 hover:bg-blue-700
                                           focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Kirim Balasan
                                </button>
                            </div>
                        </form>
                    </section>
                @else
                    <p class="text-red-500 dark:text-red-400">
                        Thread ini telah dikunci.
                    </p>
                @endif
            @endauth

            {{-- Balasan --}}
            <section class="space-y-4">
                <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-100">
                    Balasan ({{ $thread->replies->count() }})
                </h3>

                @forelse ($thread->replies as $reply)
                    <div
                        class="bg-gray-100 dark:bg-gray-800 p-5 rounded-lg
                               border border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-start mb-2">
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ $reply->author->name }}
                                · {{ $reply->created_at->diffForHumans() }}
                            </p>

                            @can('delete', $reply)
                                <form action="{{ route('replies.destroy', $reply) }}" method="POST"
                                    onsubmit="return confirm('Hapus balasan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="text-xs text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300">
                                        Hapus
                                    </button>
                                </form>
                            @endcan
                        </div>

                        <p class="text-gray-800 dark:text-gray-100 leading-relaxed">
                            {{ $reply->body }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500 dark:text-gray-400">
                        Belum ada balasan.
                    </p>
                @endforelse
            </section>

        </div>
    </div>
</x-app-layout>
