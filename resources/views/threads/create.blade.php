<x-app-layout>
    <x-slot name="title">
        Buat Thread
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Buat Thread
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <form action="{{ route('threads.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Judul</label>
                        <input type="text" name="title" class="w-full border rounded p-2"
                            value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium mb-1">Isi Diskusi</label>
                        <textarea name="body" rows="6" class="w-full border rounded p-2">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-button>
                        Publikasikan
                    </x-button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
