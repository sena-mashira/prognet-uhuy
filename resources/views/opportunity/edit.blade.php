<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Opportunity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="max-w-3xl mx-auto mt-10">
                    <h1 class="text-2xl font-semibold mb-6">Edit Opportunity</h1>

                    <form action="{{ route('opportunities.update', $opportunity->slug) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Category --}}
                        <div class="mb-4">
                            <label for="category_id" class="block font-medium mb-1">Category</label>
                            <select name="category_id" id="category_id" class="w-full border rounded p-2">
                                <option value="">-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $opportunity->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Title --}}
                        <div class="mb-4">
                            <label for="title" class="block font-medium mb-1">Title</label>
                            <input type="text" name="title" id="title" class="w-full border rounded p-2"
                                value="{{ old('title', $opportunity->title) }}">
                            @error('title')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div class="mb-4">
                            <label for="slug" class="block font-medium mb-1">Slug</label>
                            <input type="text" name="slug" id="slug" class="w-full border rounded p-2"
                                value="{{ old('slug', $opportunity->slug) }}">
                            @error('slug')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Organization --}}
                        <div class="mb-4">
                            <label for="organization" class="block font-medium mb-1">Organization</label>
                            <input type="text" name="organization" id="organization"
                                class="w-full border rounded p-2"
                                value="{{ old('organization', $opportunity->organization) }}">
                            @error('organization')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label for="description" class="block font-medium mb-1">Description</label>
                            <textarea name="description" id="description" rows="5" class="w-full border rounded p-2">{{ old('description', $opportunity->description) }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Requirements --}}
                        <div class="mb-4">
                            <label for="requirements" class="block font-medium mb-1">Requirements</label>
                            <textarea name="requirements" id="requirements" rows="4" class="w-full border rounded p-2">{{ old('requirements', $opportunity->requirements) }}</textarea>
                            @error('requirements')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Benefits --}}
                        <div class="mb-4">
                            <label for="benefits" class="block font-medium mb-1">Benefits</label>
                            <textarea name="benefits" id="benefits" rows="4" class="w-full border rounded p-2">{{ old('benefits', $opportunity->benefits) }}</textarea>
                            @error('benefits')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Location --}}
                        <div class="mb-4">
                            <label for="location" class="block font-medium mb-1">Location</label>
                            <input type="text" name="location" id="location" class="w-full border rounded p-2"
                                value="{{ old('location', $opportunity->location) }}">
                            @error('location')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Education Level --}}
                        <div class="mb-4">
                            <label for="education_level" class="block font-medium mb-1">Education Level</label>
                            <select name="education_level" id="education_level" class="w-full border rounded p-2">
                                <option value="">-- Select --</option>
                                @foreach (['SMA', 'D3', 'S1', 'S2', 'Umum'] as $level)
                                    <option value="{{ $level }}"
                                        {{ old('education_level', $opportunity->education_level) == $level ? 'selected' : '' }}>
                                        {{ $level }}
                                    </option>
                                @endforeach
                            </select>
                            @error('education_level')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Field --}}
                        <div class="mb-4">
                            <label for="field" class="block font-medium mb-1">Field</label>
                            <input type="text" name="field" id="field" class="w-full border rounded p-2"
                                value="{{ old('field', $opportunity->field) }}">
                            @error('field')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Difficulty --}}
                        <div class="mb-4">
                            <label for="difficulty" class="block font-medium mb-1">Difficulty</label>
                            <select name="difficulty" id="difficulty" class="w-full border rounded p-2">
                                @foreach (['easy', 'medium', 'hard'] as $diff)
                                    <option value="{{ $diff }}"
                                        {{ old('difficulty', $opportunity->difficulty) == $diff ? 'selected' : '' }}>
                                        {{ ucfirst($diff) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('difficulty')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Dates --}}
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="start_date" class="block font-medium mb-1">Start Date</label>
                                <input type="date" name="start_date" id="start_date"
                                    class="w-full border rounded p-2"
                                    value="{{ old('start_date', $opportunity->start_date) }}">
                                @error('start_date')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="end_date" class="block font-medium mb-1">End Date</label>
                                <input type="date" name="end_date" id="end_date"
                                    class="w-full border rounded p-2"
                                    value="{{ old('end_date', $opportunity->end_date) }}">
                                @error('end_date')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Registration Link --}}
                        <div class="mb-4">
                            <label for="registration_link" class="block font-medium mb-1">Registration Link</label>
                            <input type="text" name="registration_link" id="registration_link"
                                class="w-full border rounded p-2"
                                value="{{ old('registration_link', $opportunity->registration_link) }}">
                            @error('registration_link')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Poster URL --}}
                        <div class="mb-6">
                            <label for="poster_url" class="block font-medium mb-1">Poster URL</label>
                            <input type="text" name="poster_url" id="poster_url"
                                class="w-full border rounded p-2"
                                value="{{ old('poster_url', $opportunity->poster_url) }}">
                            @error('poster_url')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded">
                            Update Opportunity
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
