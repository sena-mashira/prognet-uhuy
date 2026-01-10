<x-app-layout>
    <x-slot name="title">
        Edit {{ $blog->title }}
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
                    Edit Artikel Blog
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Rapikan judul, ringkasan, dan thumbnail — biar artikelmu tetap “tajam”.
                </p>
            </div>

            <div class="hidden md:flex items-center gap-2">
                <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                             bg-white border border-gray-200 text-gray-700
                             dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                    Mode edit aktif
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Wrapper Card --}}
            <div class="relative overflow-hidden rounded-2xl
                        bg-white/90 dark:bg-white/5 backdrop-blur-md
                        border border-gray-200/70 dark:border-white/10
                        ring-1 ring-black/5 dark:ring-white/10
                        shadow-sm">

                {{-- Glow bg --}}
                <div class="pointer-events-none absolute -inset-10">
                    <div class="absolute inset-0 opacity-60 dark:opacity-40
                                bg-gradient-to-r from-cyan-200/20 via-blue-200/16 to-indigo-200/16
                                dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                blur-3xl"></div>
                </div>

                <div class="relative p-6 md:p-8">

                    {{-- Header inside card --}}
                    <div class="mb-6 flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                Detail Artikel
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Update judul, slug, excerpt, konten, dan thumbnail kalau diperlukan.
                            </p>
                        </div>

                        <span class="shrink-0 inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                     bg-gray-50 border border-gray-200 text-gray-700
                                     dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                            TAPAK Blog
                        </span>
                    </div>

                    <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data"
                          class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Title --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Title
                            </label>
                            <input type="text" name="title"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                value="{{ old('title', $blog->title) }}">
                            @error('title')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Slug <span class="text-xs font-medium text-gray-500 dark:text-gray-400">(opsional)</span>
                            </label>
                            <input type="text" name="slug"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                value="{{ old('slug', $blog->slug) }}">
                            @error('slug')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Excerpt --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Excerpt <span class="text-xs font-medium text-gray-500 dark:text-gray-400">(opsional)</span>
                            </label>
                            <textarea name="excerpt" rows="3"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition resize-y">{{ old('excerpt', $blog->excerpt) }}</textarea>
                            @error('excerpt')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Content --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Content
                            </label>
                            <textarea name="content" rows="9"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition resize-y">{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Thumbnail --}}
                        <div class="pt-2">
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Thumbnail
                            </label>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <input type="file" name="thumbnail" accept="image/*"
                                        class="w-full rounded-xl px-4 py-3
                                               bg-white dark:bg-white/5
                                               border border-gray-200 dark:border-white/10
                                               text-gray-900 dark:text-gray-100
                                               ring-1 ring-black/5 dark:ring-white/10
                                               focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                               transition"
                                        onchange="previewThumbnail(event)">

                                    @error('thumbnail')
                                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                    @enderror

                                    <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                        Upload kalau mau ganti thumbnail. Kalau tidak, yang lama tetap dipakai.
                                    </p>
                                </div>

                                <div>
                                    <div class="relative overflow-hidden rounded-xl
                                                border border-gray-200 dark:border-white/10
                                                bg-gray-50 dark:bg-white/5
                                                ring-1 ring-black/5 dark:ring-white/10
                                                p-3">

                                        <div class="pointer-events-none absolute -inset-10 opacity-50">
                                            <div class="absolute inset-0 bg-gradient-to-r from-cyan-200/20 via-blue-200/16 to-indigo-200/16 blur-2xl
                                                        dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10"></div>
                                        </div>

                                        <img id="thumbnail-preview"
                                             src="{{ $blog->thumbnail ? asset('storage/' . $blog->thumbnail) : '' }}"
                                             class="relative w-full h-44 object-cover rounded-lg {{ $blog->thumbnail ? '' : 'hidden' }}"
                                             alt="Thumbnail Preview">

                                        <div id="thumbnail-placeholder"
                                             class="relative flex items-center justify-center h-44 rounded-lg
                                                    border border-dashed border-gray-300 dark:border-white/15
                                                    text-sm text-gray-500 dark:text-gray-400 text-center px-6
                                                    {{ $blog->thumbnail ? 'hidden' : '' }}">
                                            Preview thumbnail muncul di sini.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="pt-4 flex flex-col sm:flex-row items-center gap-3">
                            <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                                       rounded-xl px-5 py-3 font-semibold text-white
                                       bg-gradient-to-r from-[#2563EB] to-[#22D3EE]
                                       shadow-[0_14px_40px_rgba(34,211,238,0.20)]
                                       hover:shadow-[0_18px_55px_rgba(34,211,238,0.28)]
                                       transition duration-300">
                                Simpan Perubahan
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7" />
                                </svg>
                            </button>

                            <a href="{{ route('blogs.show', $blog->slug) }}"
                               class="w-full sm:w-auto">
                                <button type="button"
                                    class="w-full inline-flex items-center justify-center gap-2
                                           rounded-xl px-5 py-3 font-semibold
                                           bg-gray-100 text-gray-800 hover:bg-gray-200
                                           dark:bg-white/5 dark:text-gray-200 dark:hover:bg-white/10
                                           border border-gray-200 dark:border-white/10
                                           transition">
                                    Batal
                                </button>
                            </a>

                            <p class="text-xs text-gray-500 dark:text-gray-400">
                                Tip: jaga excerpt tetap singkat biar tampilannya clean di list.
                            </p>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <script>
        function previewThumbnail(event) {
            const input = event.target;
            const preview = document.getElementById('thumbnail-preview');
            const placeholder = document.getElementById('thumbnail-placeholder');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>
