<x-action-section>
    <x-slot name="title">
        <div class="flex items-center gap-2">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl
                         bg-red-50 text-red-700 border border-red-100
                         dark:bg-red-500/10 dark:text-red-200 dark:border-red-500/20">
                <!-- warning icon -->
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
            </span>
            <div>
                <p class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Delete Account') }}
                </p>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                    Aksi permanen, tidak bisa dibatalkan.
                </p>
            </div>
        </div>
    </x-slot>

    <x-slot name="description">
        <span class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Permanently delete your account.') }}
        </span>
    </x-slot>

    <x-slot name="content">
        <div class="relative overflow-hidden rounded-2xl
                    bg-white/70 dark:bg-white/5 backdrop-blur-md
                    border border-red-200/80 dark:border-red-500/20
                    ring-1 ring-red-500/10 dark:ring-red-500/10
                    p-5 md:p-6">

            <!-- soft glow -->
            <div class="pointer-events-none absolute -inset-10 opacity-60 dark:opacity-40">
                <div class="absolute inset-0 bg-gradient-to-r
                            from-red-200/22 via-rose-200/14 to-orange-200/14
                            dark:from-red-500/14 dark:via-rose-500/10 dark:to-orange-500/10
                            blur-3xl"></div>
            </div>

            <div class="relative">
                <div class="max-w-2xl text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                </div>

                <div class="mt-5 flex flex-col sm:flex-row sm:items-center gap-3">
                    <x-danger-button
                        class="rounded-xl px-5 py-3"
                        wire:click="confirmUserDeletion"
                        wire:loading.attr="disabled">
                        <span class="inline-flex items-center gap-2">
                            {{ __('Delete Account') }}
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 7h12m-9 4v6m6-6v6M9 7l1-2h4l1 2m-9 0l1 14h10l1-14"/>
                            </svg>
                        </span>
                    </x-danger-button>

                    <p class="text-xs text-gray-600 dark:text-gray-400">
                        Tip: simpan data penting dulu sebelum lanjut.
                    </p>
                </div>
            </div>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                <div class="flex items-center gap-2">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl
                                 bg-red-50 text-red-700 border border-red-100
                                 dark:bg-red-500/10 dark:text-red-200 dark:border-red-500/20">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                        </svg>
                    </span>
                    <div>
                        <p class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ __('Delete Account') }}
                        </p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                            Konfirmasi terakhir sebelum akun dihapus.
                        </p>
                    </div>
                </div>
            </x-slot>

            <x-slot name="content">
                <div class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </div>

                <div class="mt-5" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Password') }}
                    </label>

                    <x-input type="password"
                             class="block w-full rounded-xl px-4 py-3
                                    bg-white dark:bg-white/5
                                    border border-gray-200 dark:border-white/10
                                    text-gray-900 dark:text-gray-100
                                    ring-1 ring-black/5 dark:ring-white/10
                                    focus:outline-none focus:ring-2 focus:ring-red-400/50 focus:border-red-400/50
                                    transition"
                             autocomplete="current-password"
                             placeholder="{{ __('Enter your password to confirm') }}"
                             x-ref="password"
                             wire:model="password"
                             wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 w-full">
                    <x-secondary-button
                        class="rounded-xl px-5 py-3"
                        wire:click="$toggle('confirmingUserDeletion')"
                        wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button
                        class="rounded-xl px-5 py-3 sm:ms-auto"
                        wire:click="deleteUser"
                        wire:loading.attr="disabled">
                        {{ __('Delete Account') }}
                    </x-danger-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
