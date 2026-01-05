<x-app-layout>
    <x-slot name="title">
        Opportunity
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Opportunity') }}
        </h2>
    </x-slot>

    <div class="py-12 dark:bg-gray-900">
        <livewire:opportunity-tabs />
    </div>
</x-app-layout>
