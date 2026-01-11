<x-app-layout>
    <x-slot name="header">
        <x-slot name="title">
            Buat Opportunity
        </x-slot>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Buat Opportunity
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">

                <form action="{{ route('opportunities.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-5">
                    @csrf

                    {{-- Category --}}
                    <div>
                        <label class="block font-medium mb-1">Category</label>
                        <select name="category_id" class="w-full border rounded p-2">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Title --}}
                    <div>
                        <label class="block font-medium mb-1">Title</label>
                        <input type="text" name="title" class="w-full border rounded p-2"
                            value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div>
                        <label class="block font-medium mb-1">
                            Slug <span class="text-sm text-gray-500">(optional)</span>
                        </label>
                        <input type="text" name="slug" class="w-full border rounded p-2"
                            value="{{ old('slug') }}">
                        @error('slug')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Organization --}}
                    <div>
                        <label class="block font-medium mb-1">Organization</label>
                        <input type="text" name="organization" class="w-full border rounded p-2"
                            value="{{ old('organization') }}">
                        @error('organization')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block font-medium mb-1">Description</label>
                        <textarea name="description" rows="4" class="w-full border rounded p-2">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Requirements --}}
                    <div>
                        <label class="block font-medium mb-1">Requirements</label>
                        <textarea name="requirements" rows="3" class="w-full border rounded p-2">{{ old('requirements') }}</textarea>
                        @error('requirements')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Benefits --}}
                    <div>
                        <label class="block font-medium mb-1">Benefits</label>
                        <textarea name="benefits" rows="3" class="w-full border rounded p-2">{{ old('benefits') }}</textarea>
                        @error('benefits')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Location --}}
                    <div>
                        <label class="block font-medium mb-1">Location</label>
                        <input type="text" name="location" class="w-full border rounded p-2"
                            value="{{ old('location') }}">
                        @error('location')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Education Level --}}
                    <div>
                        <label class="block font-medium mb-1">Education Level</label>
                        <select name="education_level" class="w-full border rounded p-2">
                            <option value="">-- Select --</option>
                            @foreach (['SMA', 'D3', 'S1', 'S2', 'Umum'] as $level)
                                <option value="{{ $level }}"
                                    {{ old('education_level') == $level ? 'selected' : '' }}>
                                    {{ $level }}
                                </option>
                            @endforeach
                        </select>
                        @error('education_level')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Field --}}
                    <div>
                        <label class="block font-medium mb-1">Field</label>
                        <input type="text" name="field" class="w-full border rounded p-2"
                            value="{{ old('field') }}">
                        @error('field')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Difficulty --}}
                    <div>
                        <label class="block font-medium mb-1">Difficulty</label>
                        <select name="difficulty" class="w-full border rounded p-2">
                            @foreach (['easy', 'medium', 'hard'] as $diff)
                                <option value="{{ $diff }}"
                                    {{ old('difficulty', 'medium') == $diff ? 'selected' : '' }}>
                                    {{ ucfirst($diff) }}
                                </option>
                            @endforeach
                        </select>
                        @error('difficulty')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Dates --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium mb-1">Start Date</label>
                            <input type="date" name="start_date" class="w-full border rounded p-2"
                                value="{{ old('start_date') }}">
                            @error('start_date')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block font-medium mb-1">End Date</label>
                            <input type="date" name="end_date" class="w-full border rounded p-2"
                                value="{{ old('end_date') }}">
                            @error('end_date')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Registration --}}
                    <div>
                        <label class="block font-medium mb-1">Registration Link</label>
                        <input type="text" name="registration_link" class="w-full border rounded p-2"
                            value="{{ old('registration_link') }}">
                        @error('registration_link')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Poster --}}
                    <div class="mb-6">
                        <label for="poster_url" class="block font-medium mb-1">Poster</label>

                        <input type="file" name="poster_url" id="poster_url" accept="image/*"
                            class="w-full border rounded p-2" onchange="previewThumbnail(event)">

                        @error('poster_url')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <div class="mt-3">
                            <img id="thumbnail-preview" class="hidden w-full rounded shadow border"
                                alt="Thumbnail Preview">
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-4">
                        <x-button>
                            Publish Opportunity
                        </x-button>
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
