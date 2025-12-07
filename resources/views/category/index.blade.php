<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />

                @forelse ($categories as $item)
                    <div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
                        <a href="#">
                            <img class="rounded-base" src="/docs/images/blog/image-1.jpg" alt="" />
                        </a>
                        <a href="#">
                            <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading">{{ $item->name }}
                            </h5>
                        </a>
                        <p class="mb-6 text-body">{{ $item->Description }}</p>
                        <form action="{{ route('categories.destroy', $item->slug) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                @empty
                    <tr>
                        <td colspan="4">Belum ada data.</td>
                    </tr>
                @endforelse


            </div>
        </div>
    </div>
</x-app-layout>
