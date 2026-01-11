<x-action-section>
    <x-slot name="title">
        {{ __('Two Factor Authentication') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add additional security to your account using two factor authentication.') }}
    </x-slot>

    <x-slot name="content">
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
                {{-- Header --}}
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            @if ($this->enabled)
                                @if ($showingConfirmation)
                                    {{ __('Finish enabling two factor authentication.') }}
                                @else
                                    {{ __('You have enabled two factor authentication.') }}
                                @endif
                            @else
                                {{ __('You have not enabled two factor authentication.') }}
                            @endif
                        </h3>

                        <p class="mt-2 max-w-2xl text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                            {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
                        </p>
                   </div>

                {{-- Enabled content --}}
                @if ($this->enabled)

                    @if ($showingQrCode)
                        <div class="mt-6 rounded-2xl p-5
                                    bg-gray-50/80 dark:bg-white/5
                                    border border-gray-200 dark:border-white/10
                                    ring-1 ring-black/5 dark:ring-white/10">

                            <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                @if ($showingConfirmation)
                                    {{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                                @else
                                    {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}
                                @endif
                            </p>

                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                                {{-- QR --}}
                                <div class="rounded-xl p-4
                                            bg-white dark:bg-[#0B1228]
                                            border border-gray-200 dark:border-white/10
                                            ring-1 ring-black/5 dark:ring-white/10">
                                    {{-- bikin QR tetap kebaca tapi ga “putih nyolot” di dark mode --}}
                                    <div class="w-fit rounded-lg bg-white p-2 dark:bg-white/90">
                                        {!! $this->user->twoFactorQrCodeSvg() !!}
                                    </div>

                                    <p class="mt-3 text-xs text-gray-500 dark:text-gray-400">
                                        Scan QR untuk menghubungkan aplikasi authenticator.
                                    </p>
                                </div>

                                {{-- Setup key + OTP --}}
                                <div class="rounded-xl p-4
                                            bg-white/70 dark:bg-white/5
                                            border border-gray-200 dark:border-white/10
                                            ring-1 ring-black/5 dark:ring-white/10">
                                    <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                        {{ __('Setup Key') }}
                                    </p>

                                    <div class="mt-2 font-mono text-xs break-all
                                                text-gray-700 dark:text-gray-200
                                                rounded-lg px-3 py-2
                                                bg-gray-100 dark:bg-[#0B1228]
                                                border border-gray-200 dark:border-white/10">
                                        {{ decrypt($this->user->two_factor_secret) }}
                                    </div>

                                    @if ($showingConfirmation)
                                        <div class="mt-4">
                                            <x-label for="code" value="{{ __('Code') }}" />

                                            <x-input id="code" type="text" name="code"
                                                class="block mt-2 w-full md:w-2/3 rounded-xl
                                                       bg-white dark:bg-white/5
                                                       border border-gray-200 dark:border-white/10
                                                       text-gray-900 dark:text-gray-100
                                                       ring-1 ring-black/5 dark:ring-white/10
                                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60"
                                                inputmode="numeric" autofocus autocomplete="one-time-code"
                                                wire:model="code"
                                                wire:keydown.enter="confirmTwoFactorAuthentication" />

                                            <x-input-error for="code" class="mt-2" />
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($showingRecoveryCodes)
                        <div class="mt-6 rounded-2xl p-5
                                    bg-gray-50/80 dark:bg-white/5
                                    border border-gray-200 dark:border-white/10
                                    ring-1 ring-black/5 dark:ring-white/10">

                            <p class="text-sm font-semibold text-gray-800 dark:text-gray-200">
                                {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                            </p>

                            <div class="mt-4 grid gap-1 font-mono text-sm rounded-xl px-4 py-4
                                        bg-white dark:bg-[#0B1228]
                                        border border-gray-200 dark:border-white/10
                                        text-gray-800 dark:text-gray-100">
                                @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                                    <div class="flex items-center justify-between gap-3">
                                        <span class="truncate">{{ $code }}</span>
                                        <span class="text-[10px] text-gray-400 dark:text-gray-500">recovery</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endif

                {{-- Actions --}}
                <div class="mt-6 flex flex-wrap items-center gap-3">
                    @if (! $this->enabled)
                        <x-confirms-password wire:then="enableTwoFactorAuthentication">
                            <x-button type="button" wire:loading.attr="disabled">
                                {{ __('Enable') }}
                            </x-button>
                        </x-confirms-password>
                    @else
                        @if ($showingRecoveryCodes)
                            <x-confirms-password wire:then="regenerateRecoveryCodes">
                                <x-secondary-button class="me-0">
                                    {{ __('Regenerate Recovery Codes') }}
                                </x-secondary-button>
                            </x-confirms-password>
                        @elseif ($showingConfirmation)
                            <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                                <x-button type="button" wire:loading.attr="disabled">
                                    {{ __('Confirm') }}
                                </x-button>
                            </x-confirms-password>
                        @else
                            <x-confirms-password wire:then="showRecoveryCodes">
                                <x-secondary-button class="me-0">
                                    {{ __('Show Recovery Codes') }}
                                </x-secondary-button>
                            </x-confirms-password>
                        @endif

                        @if ($showingConfirmation)
                            <x-confirms-password wire:then="disableTwoFactorAuthentication">
                                <x-secondary-button wire:loading.attr="disabled">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                            </x-confirms-password>
                        @else
                            <x-confirms-password wire:then="disableTwoFactorAuthentication">
                                <x-danger-button wire:loading.attr="disabled">
                                    {{ __('Disable') }}
                                </x-danger-button>
                            </x-confirms-password>
                        @endif
                    @endif
                </div>

            </div>
        </div>
    </x-slot>
</x-action-section>
