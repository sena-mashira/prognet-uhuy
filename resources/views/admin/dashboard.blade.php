<x-app-layout>
    <x-slot name="title">
        Admin Dashboard
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin Dashboard
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Kendali penuh atas opportunity, kategori, dan sistem.
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-12">

            {{-- Statistik --}}
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $stats = [
                        ['title' => 'Total Opportunity', 'value' => $totalOpportunities],
                        ['title' => 'Blog', 'value' => $totalBlogs],
                        ['title' => 'Kategori', 'value' => $totalCategories],
                        ['title' => 'User Terdaftar', 'value' => $totalUsers],
                    ];
                @endphp

                @foreach ($stats as $stat)
                    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $stat['title'] }}
                        </p>
                        <h3 class="mt-2 text-3xl font-semibold text-gray-900 dark:text-gray-100">
                            {{ $stat['value'] }}
                        </h3>
                    </div>
                @endforeach
            </section>

            {{-- Pending Opportunity --}}
            <section class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-6">
                    Opportunity Menunggu Persetujuan
                </h3>

                <div class="space-y-4">
                    @forelse ($pendingOpportunitiesList as $opportunity)
                        <div
                            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 border-b border-gray-200 dark:border-gray-700 pb-4 last:border-none last:pb-0">

                            <div>
                                <h4 class="font-medium text-gray-900 dark:text-gray-100">
                                    {{ $opportunity->title }}
                                </h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $opportunity->category->name }} •
                                    {{ \Carbon\Carbon::parse($opportunity->start_date)->format('d M Y') }}
                                </p>
                            </div>

                            <div class="flex gap-2">
                                <form method="POST"
                                    action="{{ route('admin.opportunities.update', $opportunity->slug) }}">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="status" value="approved">
                                    <button
                                        class="px-4 py-2 text-sm rounded-md bg-emerald-600 hover:bg-emerald-700 text-white">
                                        Setujui
                                    </button>
                                </form>

                                <form method="POST"
                                    action="{{ route('admin.opportunities.update', $opportunity->slug) }}">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="status" value="rejected">
                                    <button
                                        class="px-4 py-2 text-sm rounded-md bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                                        Tolak
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Tidak ada opportunity yang menunggu persetujuan.
                        </p>
                    @endforelse
                </div>
            </section>

            {{-- Management --}}
            <section class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Category --}}
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                        Kelola Kategori
                    </h3>
                    <a href="{{ route('admin.categories.index') }}"
                        class="inline-block px-4 py-2 rounded-md bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900 text-sm">
                        Lihat & Tambah Kategori
                    </a>
                </div>

                {{-- Danger Zone --}}
                <div class="bg-red-50 dark:bg-red-900/30 p-6 rounded-lg border border-red-200 dark:border-red-800">
                    <h3 class="text-lg font-semibold text-red-700 dark:text-red-400 mb-4">
                        Danger Zone
                    </h3>

                    <form method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin ingin menghapus SEMUA data?')"
                            class="px-4 py-2 rounded-md bg-red-600 hover:bg-red-700 text-white text-sm">
                            Hapus Seluruh Data Sistem
                        </button>
                    </form>
                </div>

            </section>

        </div>
    </div>
</x-app-layout>
