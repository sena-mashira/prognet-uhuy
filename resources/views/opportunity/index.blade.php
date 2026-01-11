<x-app-layout>
    <x-slot name="title">
        Opportunity
    </x-slot>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                {{ __('Opportunity') }}

            </h2>
            <a href="{{ route('opportunities.create') }}">
                <x-button>+ Tambah Opportunity</x-button>
            </a>
        </div>
    </x-slot>

    <div class="py-12 dark:bg-gray-900">
        <livewire:opportunity-tabs />
    </div>
</x-app-layout>
