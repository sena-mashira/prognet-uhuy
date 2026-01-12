<x-action-section>
    <x-slot name="title">
        <div class="flex items-center gap-2">
            <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl
                         bg-blue-50 text-blue-700 border border-blue-100
                         dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                <!-- device icon -->
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9.75 17h4.5m-8.25 1.5h12a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0018 4.5H6A2.25 2.25 0 003.75 6.75v9.5A2.25 2.25 0 006 18.5z"/>
                </svg>
            </span>

            <div>
                <p class="text-base font-semibold text-gray-900 dark:text-gray-100">
                    {{ __('Browser Sessions') }}
                </p>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                    Kontrol perangkat yang login ke akunmu.
                </p>
            </div>
        </div>
    </x-slot>

    <x-slot name="description">
        <span class="text-sm text-gray-600 dark:text-gray-400">
            {{ __('Manage and log out your active sessions on other browsers and devices.') }}
        </span>
    </x-slot>

    <x-slot name="content">
        <div class="relative overflow-hidden rounded-2xl
                    bg-white/70 dark:bg-white/5 backdrop-blur-md
                    border border-gray-200/70 dark:border-white/10
                    ring-1 ring-black/5 dark:ring-white/10
                    p-5 md:p-6">

            <!-- soft glow -->
            <div class="pointer-events-none absolute -inset-10 opacity-60 dark:opacity-40">
                <div class="absolute inset-0 bg-gradient-to-r
                            from-cyan-200/20 via-blue-200/16 to-indigo-200/16
                            dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                            blur-3xl"></div>
            </div>

            <div class="relative">
                <div class="max-w-2xl text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
                </div>

                @if (count($this->sessions) > 0)
                    <div class="mt-6 space-y-3">
                        <!-- Sessions list -->
                        @foreach ($this->sessions as $session)
                            <div class="group flex items-start gap-3 rounded-2xl p-4
                                        bg-white/60 dark:bg-white/5
                                        border border-gray-200/70 dark:border-white/10
                                        ring-1 ring-black/5 dark:ring-white/10
                                        transition duration-300 hover:-translate-y-0.5">

                                <div class="shrink-0 mt-0.5">
                                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl
                                                 bg-gray-50 text-gray-700 border border-gray-200
                                                 dark:bg-white/5 dark:text-gray-200 dark:border-white/10">
                                        @if ($session->agent->isDesktop())
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                            </svg>
                                        @endif
                                    </span>
                                </div>

                                <div class="min-w-0 flex-1">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <p class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }}
                                            <span class="text-gray-400 dark:text-gray-500">·</span>
                                            {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                                        </p>

                                        @if ($session->is_current_device)
                                            <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
                                                         bg-emerald-50 text-emerald-700 border border-emerald-100
                                                         dark:bg-emerald-500/10 dark:text-emerald-200 dark:border-emerald-500/20">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                {{ __('This device') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="mt-1 text-xs text-gray-500 dark:text-gray-400 flex flex-wrap items-center gap-2">
                                        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1
                                                     bg-gray-50 border border-gray-200 text-gray-600
                                                     dark:bg-white/5 dark:border-white/10 dark:text-gray-300">
                                            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                                            {{ $session->ip_address }}
                                        </span>

                                        @unless ($session->is_current_device)
                                            <span class="text-gray-400 dark:text-gray-500">•</span>
                                            <span>{{ __('Last active') }} {{ $session->last_active }}</span>
                                        @endunless
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="mt-6 flex flex-col sm:flex-row sm:items-center gap-3">
                    <x-button wire:click="confirmLogout" wire:loading.attr="disabled" class="rounded-xl px-5 py-3">
                        {{ __('Log Out Other Browser Sessions') }}
                    </x-button>

                    <x-action-message class="sm:ms-2 text-sm" on="loggedOut">
                        <span class="inline-flex items-center gap-2 text-emerald-600 dark:text-emerald-300">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            {{ __('Done.') }}
                        </span>
                    </x-action-message>
                </div>
            </div>
        </div>

        <!-- Log Out Other Devices Confirmation Modal -->
        <x-dialog-modal wire:model.live="confirmingLogout">
            <x-slot name="title">
                <div class="flex items-center gap-2">
                    <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl
                                 bg-blue-50 text-blue-700 border border-blue-100
                                 dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15.75 5.25h-7.5A2.25 2.25 0 006 7.5v9A2.25 2.25 0 008.25 18.75h7.5A2.25 2.25 0 0018 16.5v-9A2.25 2.25 0 0015.75 5.25z"/>
                        </svg>
                    </span>
                    <div>
                        <p class="text-base font-semibold text-gray-900 dark:text-gray-100">
                            {{ __('Log Out Other Browser Sessions') }}
                        </p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                            Verifikasi password untuk melanjutkan.
                        </p>
                    </div>
                </div>
            </x-slot>

            <x-slot name="content">
                <div class="text-sm text-gray-700 dark:text-gray-300 leading-relaxed">
                    {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}
                </div>

                <div class="mt-5" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    <label class="block text-xs font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        {{ __('Password') }}
                    </label>

                    <x-input type="password"
                             class="block w-full rounded-xl px-4 py-3
                                    bg-white dark:bg-white/5
                                    border border-gray-200 dark:border-white/10
                                    text-gray-900 dark:text-gray-100
                                    ring-1 ring-black/5 dark:ring-white/10
                                    focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                    transition"
                             autocomplete="current-password"
                             placeholder="{{ __('Enter your password to confirm') }}"
                             x-ref="password"
                             wire:model="password"
                             wire:keydown.enter="logoutOtherBrowserSessions" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <div class="flex flex-col sm:flex-row sm:items-center gap-3 w-full">
                    <x-secondary-button class="rounded-xl px-5 py-3" wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-button class="rounded-xl px-5 py-3 sm:ms-auto"
                              wire:click="logoutOtherBrowserSessions"
                              wire:loading.attr="disabled">
                        {{ __('Log Out Other Browser Sessions') }}
                    </x-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>
