<x-app-layout>
    <x-slot name="title">
        Buat Blog
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Buat Artikel Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Title --}}
                    <div class="mb-4">
                        <label for="title" class="block font-medium mb-1">Title</label>
                        <input type="text"
                               name="title"
                               id="title"
                               class="w-full border rounded p-2"
                               value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div class="mb-4">
                        <label for="slug" class="block font-medium mb-1">Slug</label>
                        <input type="text"
                               name="slug"
                               id="slug"
                               class="w-full border rounded p-2"
                               value="{{ old('slug') }}">
                        @error('slug')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Excerpt --}}
                    <div class="mb-4">
                        <label for="excerpt" class="block font-medium mb-1">
                            Excerpt <span class="text-gray-400">(opsional)</span>
                        </label>
                        <textarea name="excerpt"
                                  id="excerpt"
                                  rows="3"
                                  class="w-full border rounded p-2">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Content --}}
                    <div class="mb-4">
                        <label for="content" class="block font-medium mb-1">Content</label>
                        <textarea name="content"
                                  id="content"
                                  rows="7"
                                  class="w-full border rounded p-2">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Thumbnail --}}
                    <div class="mb-6">
                        <label for="thumbnail" class="block font-medium mb-1">Thumbnail</label>

                        <input type="file"
                               name="thumbnail"
                               id="thumbnail"
                               accept="image/*"
                               class="w-full border rounded p-2"
                               onchange="previewThumbnail(event)">

                        @error('thumbnail')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <div class="mt-3">
                            <img id="thumbnail-preview"
                                 class="hidden w-full rounded shadow border"
                                 alt="Thumbnail Preview">
                        </div>
                    </div>

                    {{-- Submit --}}
                    <x-button>
                        Publikasikan
                    </x-button>
                </form>

            </div>
        </div>
    </div>

    <script>
        function previewThumbnail(event) {
            const input = event.target;
            const preview = document.getElementById('thumbnail-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>
