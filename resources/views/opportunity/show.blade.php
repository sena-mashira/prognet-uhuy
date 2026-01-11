<x-app-layout>
    <x-slot name="title">
        {{ $opportunity->title }}
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $opportunity->title }}
                </h2>

                @if ($opportunity->organization)
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        {{ $opportunity->organization }}
                    </p>
                @endif
            </div>

            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                {{ $opportunity->title }}
            </h2>
            <div class="flex gap-2">
                @can('update', $opportunity)
                    <a href="{{ route('blogs.edit', $blog) }}">
                        <x-button>
                            {{ __('Edit') }}
                        </x-button>
                    </a>
                @endcan

                @can('delete', $opportunity)
                    <form action="{{ route('opportunities.destroy', $blog) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus tulisan ini?')">
                        @csrf
                        @method('DELETE')
                        <x-danger-button>
                            {{ __('Hapus') }}
                        </x-danger-button>
                    </form>
                @endcan

                <livewire:save-opportunity :opportunity="$opportunity" />
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- Poster --}}
            @if ($opportunity->poster_url)
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow">
                    <img src="{{ asset('storage/' . $opportunity->poster_url) }}" alt="{{ $opportunity->title }}"
                        class="w-full max-h-[420px] object-cover">
                </div>
            @endif

            {{-- Main Content --}}
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-8 space-y-10">

                {{-- Meta Info --}}
                <div class="flex flex-wrap gap-3 text-sm">
                    @if ($opportunity->category)
                        <span
                            class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-200">
                            {{ $opportunity->category->name }}
                        </span>
                    @endif

                    @if ($opportunity->location)
                        <span
                            class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-200">
                            📍 {{ $opportunity->location }}
                        </span>
                    @endif

                    @if ($opportunity->difficulty)
                        <span
                            class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-200">
                            {{ ucfirst($opportunity->difficulty) }}
                        </span>
                    @endif
                </div>

                {{-- Description --}}
                @if ($opportunity->description)
                    <section class="space-y-3">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                            Deskripsi
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                            {{ $opportunity->description }}
                        </p>
                    </section>
                @endif

                {{-- Requirements --}}
                @if ($opportunity->requirements)
                    <section class="space-y-3">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                            Persyaratan
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                            {{ $opportunity->requirements }}
                        </p>
                    </section>
                @endif

                {{-- Benefits --}}
                @if ($opportunity->benefits)
                    <section class="space-y-3">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                            Benefit
                        </h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed whitespace-pre-line">
                            {{ $opportunity->benefits }}
                        </p>
                    </section>
                @endif

                {{-- Additional Info --}}
                <section class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm">
                    @if ($opportunity->education_level)
                        <div>
                            <p class="text-gray-500 dark:text-gray-400">Jenjang Pendidikan</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">
                                {{ $opportunity->education_level }}
                            </p>
                        </div>
                    @endif

                    @if ($opportunity->field)
                        <div>
                            <p class="text-gray-500 dark:text-gray-400">Bidang</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">
                                {{ $opportunity->field }}
                            </p>
                        </div>
                    @endif

                    @if ($opportunity->start_date)
                        <div>
                            <p class="text-gray-500 dark:text-gray-400">Mulai</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">
                                {{ \Carbon\Carbon::parse($opportunity->start_date)->format('d M Y') }}
                            </p>
                        </div>
                    @endif

                    @if ($opportunity->end_date)
                        <div>
                            <p class="text-gray-500 dark:text-gray-400">Berakhir</p>
                            <p class="font-medium text-gray-800 dark:text-gray-200">
                                {{ \Carbon\Carbon::parse($opportunity->end_date)->format('d M Y') }}
                            </p>
                        </div>
                    @endif
                </section>

                {{-- CTA --}}
                @if ($opportunity->registration_link)
                    <div class="pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ $opportunity->registration_link }}" target="_blank">
                            <x-button>
                                Daftar Sekarang
                            </x-button>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
