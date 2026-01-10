<x-app-layout>
    <x-slot name="title">
        Profile
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
                    {{ __('Profile') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Atur identitas, keamanan akun, dan preferensimu — rapi, aman, dan tetap elegan.
                </p>
            </div>

            <div class="hidden sm:flex items-center gap-2">
                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
                             bg-blue-50 text-blue-700 border border-blue-100
                             dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                    Account Center
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 relative overflow-hidden">
        <!-- Accent background (halus, biar nyatu sama landing/dashboard) -->
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-24 left-1/3 h-[420px] w-[420px] rounded-full blur-3xl
                        bg-gradient-to-r from-cyan-300/18 to-blue-400/14
                        dark:from-cyan-400/10 dark:to-blue-500/10"></div>

            <div class="absolute -bottom-28 right-1/4 h-[460px] w-[460px] rounded-full blur-3xl
                        bg-gradient-to-r from-indigo-300/14 to-cyan-300/14
                        dark:from-indigo-500/10 dark:to-cyan-500/10"></div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Wrapper card -->
            <div class="relative overflow-hidden rounded-2xl
                        bg-white/90 dark:bg-white/5 backdrop-blur-md
                        border border-gray-200/70 dark:border-white/10
                        ring-1 ring-black/5 dark:ring-white/10
                        shadow-sm">

                <!-- glow inside card -->
                <div class="pointer-events-none absolute -inset-10">
                    <div class="absolute inset-0 opacity-60 dark:opacity-40
                                bg-gradient-to-r from-cyan-200/20 via-blue-200/16 to-indigo-200/16
                                dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                blur-3xl"></div>
                </div>

                <div class="relative p-6 md:p-8 space-y-10">
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        <div class="neon-card rounded-2xl
                                    bg-white/70 dark:bg-white/5
                                    border border-gray-200/70 dark:border-white/10
                                    ring-1 ring-black/5 dark:ring-white/10
                                    p-6 md:p-7">
                            <div class="mb-5 flex items-center justify-between gap-4">
                                <div>
                                    <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                        Informasi Profil
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Perbarui nama, email, dan foto profilmu.
                                    </p>
                                </div>
                                <span class="hidden sm:inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
                                             bg-gray-50 border border-gray-200 text-gray-700
                                             dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                                    Profile
                                </span>
                            </div>

                            @livewire('profile.update-profile-information-form')
                        </div>

                        <x-section-border />
                    @endif

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="neon-card rounded-2xl
                                    bg-white/70 dark:bg-white/5
                                    border border-gray-200/70 dark:border-white/10
                                    ring-1 ring-black/5 dark:ring-white/10
                                    p-6 md:p-7">
                            <div class="mb-5 flex items-center justify-between gap-4">
                                <div>
                                    <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                        Keamanan Password
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Ganti password secara berkala untuk menjaga akun tetap aman.
                                    </p>
                                </div>
                                <span class="hidden sm:inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
                                             bg-indigo-50 text-indigo-700 border border-indigo-100
                                             dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-indigo-500 to-cyan-400"></span>
                                    Security
                                </span>
                            </div>

                            @livewire('profile.update-password-form')
                        </div>

                        <x-section-border />
                    @endif

                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="neon-card rounded-2xl
                                    bg-white/70 dark:bg-white/5
                                    border border-gray-200/70 dark:border-white/10
                                    ring-1 ring-black/5 dark:ring-white/10
                                    p-6 md:p-7">
                            <div class="mb-5 flex items-center justify-between gap-4">
                                <div>
                                    <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                        Two-Factor Authentication
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        Tambahkan lapisan keamanan ekstra untuk login.
                                    </p>
                                </div>
                                <span class="hidden sm:inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold
                                             bg-cyan-50 text-cyan-800 border border-cyan-100
                                             dark:bg-white/5 dark:text-cyan-200 dark:border-white/10">
                                    <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                                    2FA
                                </span>
                            </div>

                            @livewire('profile.two-factor-authentication-form')
                        </div>

                        <x-section-border />
                    @endif

                    <div class="neon-card rounded-2xl
                                bg-white/70 dark:bg-white/5
                                border border-gray-200/70 dark:border-white/10
                                ring-1 ring-black/5 dark:ring-white/10
                                p-6 md:p-7">
                        <div class="mb-5">
                            <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100">
                                Sesi Login
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Keluar dari perangkat lain yang sudah login.
                            </p>
                        </div>

                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <x-section-border />

                        <div class="neon-card rounded-2xl
                                    bg-white/70 dark:bg-white/5
                                    border border-red-200/80 dark:border-red-500/20
                                    ring-1 ring-red-500/10 dark:ring-red-500/10
                                    p-6 md:p-7">
                            <div class="mb-5">
                                <h3 class="text-base font-semibold text-red-700 dark:text-red-300">
                                    Hapus Akun
                                </h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    Tindakan ini permanen. Pastikan kamu sudah yakin.
                                </p>
                            </div>

                            @livewire('profile.delete-user-form')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
