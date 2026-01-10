<x-app-layout>
    <x-slot name="title">
        Edit {{ $opportunity->title }}
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
                    Edit Opportunity
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Perbarui detail seperlunya — biar tetap relevan, jelas, dan terpercaya.
                </p>
            </div>

            <div class="hidden md:flex items-center gap-2">
                <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                             bg-white border border-gray-200 text-gray-700
                             dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                    Edit mode
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
                                Detail Opportunity
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Edit kategori, deskripsi, syarat, benefit, jadwal, dan link registrasi.
                            </p>
                        </div>

                        <span class="shrink-0 inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                     bg-gray-50 border border-gray-200 text-gray-700
                                     dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                            TAPAK
                        </span>
                    </div>

                    <form action="{{ route('opportunities.update', $opportunity->slug) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Category --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Category
                            </label>
                            <select name="category_id" id="category_id"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition">
                                <option value="" class="bg-white dark:bg-[#0B1224] text-gray-900 dark:text-gray-100">
                                    -- Select Category --
                                </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        class="bg-white dark:bg-[#0B1224] text-gray-900 dark:text-gray-100"
                                        {{ old('category_id', $opportunity->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Title --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Title
                            </label>
                            <input type="text" name="title" id="title"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                value="{{ old('title', $opportunity->title) }}">
                            @error('title')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Slug <span class="text-xs font-medium text-gray-500 dark:text-gray-400">(optional)</span>
                            </label>
                            <input type="text" name="slug" id="slug"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                value="{{ old('slug', $opportunity->slug) }}">
                            @error('slug')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Organization --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Organization
                            </label>
                            <input type="text" name="organization" id="organization"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                value="{{ old('organization', $opportunity->organization) }}">
                            @error('organization')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Description
                            </label>
                            <textarea name="description" id="description" rows="4"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition resize-y">{{ old('description', $opportunity->description) }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Requirements --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Requirements
                            </label>
                            <textarea name="requirements" id="requirements" rows="3"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition resize-y">{{ old('requirements', $opportunity->requirements) }}</textarea>
                            @error('requirements')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Benefits --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Benefits
                            </label>
                            <textarea name="benefits" id="benefits" rows="3"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition resize-y">{{ old('benefits', $opportunity->benefits) }}</textarea>
                            @error('benefits')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Location --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Location
                            </label>
                            <input type="text" name="location" id="location"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                value="{{ old('location', $opportunity->location) }}">
                            @error('location')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Education Level --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Education Level
                            </label>
                            <select name="education_level" id="education_level"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition">
                                <option value="" class="bg-white dark:bg-[#0B1224] text-gray-900 dark:text-gray-100">-- Select --</option>
                                @foreach (['SMA', 'D3', 'S1', 'S2', 'Umum'] as $level)
                                    <option value="{{ $level }}"
                                        class="bg-white dark:bg-[#0B1224] text-gray-900 dark:text-gray-100"
                                        {{ old('education_level', $opportunity->education_level) == $level ? 'selected' : '' }}>
                                        {{ $level }}
                                    </option>
                                @endforeach
                            </select>
                            @error('education_level')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Field --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Field
                            </label>
                            <input type="text" name="field" id="field"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                value="{{ old('field', $opportunity->field) }}">
                            @error('field')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Difficulty --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Difficulty
                            </label>
                            <select name="difficulty" id="difficulty"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition">
                                @foreach (['easy', 'medium', 'hard'] as $diff)
                                    <option value="{{ $diff }}"
                                        class="bg-white dark:bg-[#0B1224] text-gray-900 dark:text-gray-100"
                                        {{ old('difficulty', $opportunity->difficulty) == $diff ? 'selected' : '' }}>
                                        {{ ucfirst($diff) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('difficulty')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Dates --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                    Start Date
                                </label>
                                <input type="date" name="start_date" id="start_date"
                                    class="w-full rounded-xl px-4 py-3
                                           bg-white dark:bg-white/5
                                           border border-gray-200 dark:border-white/10
                                           text-gray-900 dark:text-gray-100
                                           ring-1 ring-black/5 dark:ring-white/10
                                           focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                           transition"
                                    value="{{ old('start_date', $opportunity->start_date) }}">
                                @error('start_date')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                    End Date
                                </label>
                                <input type="date" name="end_date" id="end_date"
                                    class="w-full rounded-xl px-4 py-3
                                           bg-white dark:bg-white/5
                                           border border-gray-200 dark:border-white/10
                                           text-gray-900 dark:text-gray-100
                                           ring-1 ring-black/5 dark:ring-white/10
                                           focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                           transition"
                                    value="{{ old('end_date', $opportunity->end_date) }}">
                                @error('end_date')
                                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Registration Link --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Registration Link
                            </label>
                            <input type="text" name="registration_link" id="registration_link"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                value="{{ old('registration_link', $opportunity->registration_link) }}">
                            @error('registration_link')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Poster (File) --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                Poster
                            </label>

                            {{-- Preview lama / preview setelah pilih file --}}
                            <img
                                id="poster-preview"
                                src="{{ $opportunity->poster_url ? asset('storage/' . $opportunity->poster_url) : '' }}"
                                class="{{ $opportunity->poster_url ? '' : 'hidden' }}
                                       w-full max-h-[320px] object-cover rounded-2xl mb-3
                                       border border-gray-200/70 dark:border-white/10
                                       ring-1 ring-black/5 dark:ring-white/10"
                                alt="Poster Preview"
                            >

                            <input
                                type="file"
                                name="poster_url"
                                id="poster"
                                accept="image/*"
                                onchange="previewPoster(event)"
                                class="w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                            />

                            @error('poster_url')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror

                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                Upload gambar (JPG/PNG/WebP). Kosongkan kalau tidak ingin mengganti poster.
                            </p>
                        </div>


                        {{-- Submit --}}
                        <div class="pt-4 flex flex-col sm:flex-row items-center gap-3">
                            <button type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                                       rounded-xl px-5 py-3 font-semibold text-white
                                       bg-gradient-to-r from-[#2563EB] to-[#22D3EE]
                                       shadow-[0_14px_40px_rgba(34,211,238,0.20)]
                                       hover:shadow-[0_18px_55px_rgba(34,211,238,0.28)]
                                       transition duration-300">
                                Update Opportunity
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </button>

                            <a href="{{ route('opportunities.show', $opportunity->slug) }}"
                               class="text-sm font-semibold text-gray-700 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white transition">
                                Batal & kembali
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
    function previewPoster(event) {
        const input = event.target;
        const preview = document.getElementById('poster-preview');

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
