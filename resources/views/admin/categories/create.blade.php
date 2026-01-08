<x-app-layout>
    <x-slot name="title">
        Tambah Kategori
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Tambah Kategori
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf

                    {{-- Nama --}}
                    <div class="mb-4">
                        <label for="name" class="block font-medium mb-1">
                            Nama Kategori
                        </label>
                        <input type="text" name="name" id="name" class="w-full border rounded p-2"
                            value="{{ old('name') }}" placeholder="Contoh: Beasiswa, Magang, Lomba">

                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div class="mb-4">
                        <label for="slug" class="block font-medium mb-1">
                            Slug
                        </label>
                        <input type="text" name="slug" id="slug" class="w-full border rounded p-2"
                            value="{{ old('slug') }}" placeholder="beasiswa, magang, lomba">

                        @error('slug')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-6">
                        <label for="description" class="block font-medium mb-1">
                            Deskripsi <span class="text-gray-400">(opsional)</span>
                        </label>
                        <textarea name="description" id="description" rows="4" class="w-full border rounded p-2"
                            placeholder="Deskripsi singkat kategori ini...">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="flex items-center justify-between">
                        <a href="{{ route('admin.categories.index') }}"
                            class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200">
                            ← Kembali
                        </a>

                        <x-button>
                            Simpan Kategori
                        </x-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
