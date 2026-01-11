<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6">
            <div class="relative overflow-hidden rounded-2xl
                        bg-white/90 dark:bg-white/5 backdrop-blur-md
                        border border-gray-200/70 dark:border-white/10
                        ring-1 ring-black/5 dark:ring-white/10
                        shadow-sm">

                {{-- glow bg --}}
                <div class="pointer-events-none absolute -inset-10">
                    <div class="absolute inset-0 opacity-60 dark:opacity-40
                                bg-gradient-to-r from-cyan-200/20 via-blue-200/16 to-indigo-200/16
                                dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                blur-3xl"></div>
                </div>

                <div class="relative p-6 md:p-8">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                Keamanan Akun
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Ganti password secara berkala biar akun tetap aman.
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-5">
                        {{-- Current Password --}}
                        <div>
                            <x-label for="current_password" value="{{ __('Current Password') }}"
                                     class="text-sm font-semibold text-gray-800 dark:text-gray-200" />
                            <x-input
                                id="current_password"
                                type="password"
                                class="mt-2 block w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                wire:model="state.current_password"
                                autocomplete="current-password"
                            />
                            <x-input-error for="current_password" class="mt-2" />
                        </div>

                        {{-- New Password --}}
                        <div>
                            <x-label for="password" value="{{ __('New Password') }}"
                                     class="text-sm font-semibold text-gray-800 dark:text-gray-200" />
                            <x-input
                                id="password"
                                type="password"
                                class="mt-2 block w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                wire:model="state.password"
                                autocomplete="new-password"
                            />
                            <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                                Tips: campur huruf besar, kecil, angka, dan simbol biar makin kuat.
                            </p>
                            <x-input-error for="password" class="mt-2" />
                        </div>

                        {{-- Confirm Password --}}
                        <div>
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}"
                                     class="text-sm font-semibold text-gray-800 dark:text-gray-200" />
                            <x-input
                                id="password_confirmation"
                                type="password"
                                class="mt-2 block w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition"
                                wire:model="state.password_confirmation"
                                autocomplete="new-password"
                            />
                            <x-input-error for="password_confirmation" class="mt-2" />
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="mt-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <x-action-message class="text-sm text-emerald-600 dark:text-emerald-400" on="saved">
                            {{ __('Saved.') }}
                        </x-action-message>

                        <div class="flex items-center gap-3">
                            <x-button>
                                {{ __('Save') }}
                            </x-button>

                            <span class="text-xs text-gray-500 dark:text-gray-400">
                                Pastikan kamu ingat password barumu.
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        {{-- sengaja dikosongin, karena action bar udah kita taruh di dalam card biar lebih keren --}}
    </x-slot>
</x-form-section>
