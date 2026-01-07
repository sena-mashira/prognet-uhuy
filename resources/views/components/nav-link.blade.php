@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-bold leading-5 text-blue-600 dark:text-blue-400 focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-blue-500 dark:hover:text-cyan-400 hover:border-gradient-to-r hover:from-blue-500 hover:to-cyan-400 transition duration-150 ease-in-out relative group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    {{-- Efek Garis Gradient Halus saat Hover --}}
    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-blue-600 to-cyan-400 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out {{ ($active ?? false) ? 'scale-x-100' : '' }}"></span>
</a>
