<button
    wire:click="toggleSave"
    class="
        inline-flex items-center justify-center px-4 py-3 border border-transparent rounded-md
        font-semibold text-xs uppercase tracking-widest text-white
        transition ease-in-out duration-150
        focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800
        {{ $isSaved
            ? 'bg-red-600 hover:bg-red-500 active:bg-red-700 focus:ring-red-500'
            : 'bg-blue-600 hover:bg-blue-500 active:bg-blue-700 focus:ring-blue-500'
        }}
    "
>
    {{ $isSaved ? 'Batal simpan' : 'Simpan' }}
</button>
