<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $opportunity->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"> 
                <div class="bg-neutral-primary-soft block max-w-full p-6 border border-default rounded-base shadow-xs">
                    <a href="#">
                        <img class="rounded-base" src="/docs/images/blog/image-1.jpg" alt="" />
                    </a>
                    <a href="#">
                        <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading">{{ $opportunity->title }}</h5>
                    </a>
                    <p class="mb-6 text-body">{{ $opportunity->description}}</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
