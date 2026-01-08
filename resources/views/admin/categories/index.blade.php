<x-app-layout>
    <x-slot name="title">
        Kelola Kategori
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Kelola Kategori Opportunity
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Tambah, lihat, dan hapus kategori yang digunakan dalam sistem.
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Action --}}
            <div class="flex justify-end">
                <a href="{{ route('admin.categories.create') }}">
                    <x-button>+ Buat Kategori</x-button>
                </a>
            </div>

            {{-- Category List --}}
            <section class="bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                <div class="divide-y divide-gray-200 dark:divide-gray-700">

                    @forelse ($categories as $category)
                        <div class="flex items-center justify-between p-6">
                            <div>
                                <h3 class="font-medium text-gray-900 dark:text-gray-100">
                                    {{ $category->name }} [{{ $category->slug }}]
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $category->description }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $category->opportunities->count() }} opportunity
                                </p>
                            </div>

                            <form method="POST" action="{{ route('admin.categories.destroy', $category->slug) }}"
                                onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm text-red-600 hover:text-red-700">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    @empty
                        <div class="p-6 text-sm text-gray-500 dark:text-gray-400">
                            Belum ada kategori dibuat.
                        </div>
                    @endforelse

                </div>
            </section>

        </div>
    </div>
</x-app-layout>
