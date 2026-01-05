<x-app-layout>
    <x-slot name="header">
        <x-slot name="title">
            Edit {{ $blog->title }}
        </x-slot>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Edit Artikel Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">

                <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Title --}}
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Title</label>
                        <input type="text" name="title" class="w-full border rounded p-2"
                            value="{{ old('title', $blog->title) }}">
                        @error('title')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Slug</label>
                        <input type="text" name="slug" class="w-full border rounded p-2"
                            value="{{ old('slug', $blog->slug) }}">
                        @error('slug')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Excerpt --}}
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Excerpt (optional)</label>
                        <textarea name="excerpt" rows="3" class="w-full border rounded p-2">{{ old('excerpt', $blog->excerpt) }}</textarea>
                        @error('excerpt')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Content --}}
                    <div class="mb-4">
                        <label class="block font-medium mb-1">Content</label>
                        <textarea name="content" rows="7" class="w-full border rounded p-2">{{ old('content', $blog->content) }}</textarea>
                        @error('content')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Thumbnail --}}
                    <div class="mb-6">
                        <label class="block font-medium mb-1">Thumbnail</label>

                        <img id="thumbnail-preview"
                            src="{{ $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : '' }}"
                            class="w-full rounded mb-3 {{ $blog->thumbnail ? '' : 'hidden' }}" alt="Thumbnail Preview">

                        <input type="file" name="thumbnail" accept="image/*" class="w-full border rounded p-2"
                            onchange="previewThumbnail(event)">
                        @error('thumbnail')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="flex gap-3">
                        <x-button>
                            Publikasikan
                        </x-button>

                        <a href="{{ route('blogs.show', $blog->slug) }}">
                            <x-secondary-button>
                                Batal
                            </x-secondary-button>
                        </a>
                    </div>

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
