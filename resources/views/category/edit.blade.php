<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

                <div class="max-w-3xl mx-auto mt-10">
                    <h1 class="text-2xl font-semibold mb-6">Edit Opportunity Category</h1>

                    <form
                        action="{{ route('categories.update', $category->slug) }}"
                        method="POST">

                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div class="mb-4">
                            <label class="block font-semibold mb-1">Category Name</label>
                            <input type="text" name="name" class="w-full border px-3 py-2 rounded"
                                value="{{ old('name', $category->name) }}">
                            @error('name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div class="mb-4">
                            <label class="block font-semibold mb-1">Slug</label>
                            <input type="text" name="slug" class="w-full border px-3 py-2 rounded"
                                value="{{ old('slug', $category->slug) }}">
                            @error('slug')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-4">
                            <label class="block font-semibold mb-1">Description</label>
                            <textarea name="description" class="w-full border px-3 py-2 rounded" rows="4">{{ old('description', $category->description) }}</textarea>
                            @error('description')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
                            Update Category
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
