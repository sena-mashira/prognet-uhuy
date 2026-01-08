<x-app-layout>
    <x-slot name="title">
        Approval Opportunity
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Persetujuan Opportunity
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            Tinjau dan setujui peluang sebelum dipublikasikan.
        </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @forelse ($pendingOpportunities as $opportunity)
                <article class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm hover:shadow-md transition">

                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6">

                        {{-- Content --}}
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ $opportunity->title }}
                            </h3>

                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                {{ $opportunity->category->name }}
                                ·
                                {{ $opportunity->organization ?? 'Tanpa organisasi' }}
                            </p>

                            <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed line-clamp-3">
                                {{ Str::limit(strip_tags($opportunity->description), 220) }}
                            </p>

                            <div class="mt-4 flex flex-wrap gap-4 text-sm text-gray-500 dark:text-gray-400">
                                @if ($opportunity->start_date)
                                    <span>
                                        Mulai: {{ \Carbon\Carbon::parse($opportunity->start_date)->format('d M Y') }}
                                    </span>
                                @endif

                                @if ($opportunity->end_date)
                                    <span>
                                        Deadline: {{ \Carbon\Carbon::parse($opportunity->end_date)->format('d M Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Actions --}}
                        @if ($opportunity->status == 'pending')
                            <div class="flex md:flex-col gap-3 shrink-0">

                                <a href="{{ route('opportunities.show', $opportunity->slug) }}" target="_blank"
                                    class="px-4 py-2 text-sm rounded-md
                                      bg-gray-200 dark:bg-gray-700
                                      hover:bg-gray-300 dark:hover:bg-gray-600
                                      transition text-center">
                                    Preview
                                </a>

                                <form method="POST"
                                    action="{{ route('admin.opportunities.update', $opportunity->slug) }}">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="status" value="approved">
                                    <button
                                        class="w-full px-4 py-2 text-sm rounded-md
                                           bg-emerald-600 hover:bg-emerald-700
                                           text-white transition">
                                        Setujui
                                    </button>
                                </form>

                                <form method="POST"
                                    action="{{ route('admin.opportunities.update', $opportunity->status) }}">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="status" value="rejected">
                                    <button onclick="return confirm('Tolak opportunity ini?')"
                                        class="w-full px-4 py-2 text-sm rounded-md
                                           bg-red-600 hover:bg-red-700
                                           text-white transition">
                                        Tolak
                                    </button>
                                </form>
                            </div>
                        @endif

                    </div>
                </article>
            @empty
                <div class="bg-white dark:bg-gray-800 p-10 rounded-lg shadow-sm text-center">
                    <p class="text-gray-600 dark:text-gray-400">
                        Tidak ada opportunity yang menunggu persetujuan.
                    </p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>
