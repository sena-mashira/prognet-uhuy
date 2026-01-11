<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme') === 'dark' ? 'dark' : '' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="min-h-screen antialiased
                 bg-gray-50 text-gray-900
                 dark:bg-[#070B1A] dark:text-gray-100">
        <div class="min-h-screen">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
