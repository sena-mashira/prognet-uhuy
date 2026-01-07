<x-app-layout>
    <x-slot name="title">
        {{ $blog->title }}
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                {{ $blog->title }}
            </h2>
            <div class="flex gap-2">
                @can('update', $blog)
                    <a href="{{ route('blogs.edit', $blog) }}" >
                        <x-button>
                            {{ __('Edit') }}
                        </x-button>
                    </a>
                @endcan

                @can('delete', $blog)
                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus tulisan ini?')">
                        @csrf
                        @method('DELETE')
                        <x-danger-button>
                            {{ __('Hapus') }}
                        </x-danger-button>
                    </form>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <article class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow">

                {{-- Meta --}}
                <div class="mb-6">
                    <p class="text-sm text-gray-500">
                        Ditulis oleh
                        <span class="font-medium text-gray-700 dark:text-gray-300">
                            {{ $blog->author->name ?? 'Anonim' }}
                        </span>
                        · {{ $blog->created_at->format('d F Y') }}
                    </p>
                </div>

                {{-- Thumbnail --}}
                @if ($blog->thumbnail)
                    <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="{{ $blog->title }}"
                        class="w-full h-auto rounded mb-8">
                @endif

                {{-- Content --}}
                <div class="prose prose-lg dark:prose-invert max-w-none break-all">
                    {!! nl2br(e($blog->content)) !!}
                </div>

                {{-- Footer --}}
                <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('blogs.index') }}"
                        class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                        ← Kembali ke daftar tulisan
                    </a>
                </div>

            </article>

        </div>
    </div>
</x-app-layout>
