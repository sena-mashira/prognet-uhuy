<x-guest-layout>
    <x-slot name="title">
        Register
    </x-slot>

    <div class="relative min-h-screen flex items-center justify-center px-4 py-14 overflow-hidden">
        {{-- accent glow background --}}
        <div class="pointer-events-none absolute inset-0 -z-10">
            <div class="absolute -top-24 left-1/3 h-[520px] w-[520px] rounded-full blur-3xl
                        bg-gradient-to-r from-cyan-300/18 to-blue-400/14 dark:from-cyan-400/10 dark:to-blue-500/10"></div>
            <div class="absolute -bottom-28 right-1/4 h-[560px] w-[560px] rounded-full blur-3xl
                        bg-gradient-to-r from-indigo-300/14 to-cyan-300/14 dark:from-indigo-500/10 dark:to-cyan-500/10"></div>
        </div>

        <div class="w-full max-w-md">
            {{-- glass wrapper --}}
            <div class="relative overflow-hidden rounded-2xl
                        bg-white/90 dark:bg-white/5 backdrop-blur-md
                        border border-gray-200/70 dark:border-white/10
                        ring-1 ring-black/5 dark:ring-white/10
                        shadow-sm">

                {{-- glow inside card --}}
                <div class="pointer-events-none absolute -inset-10">
                    <div class="absolute inset-0 opacity-60 dark:opacity-40
                                bg-gradient-to-r from-cyan-200/20 via-blue-200/16 to-indigo-200/16
                                dark:from-cyan-400/10 dark:via-blue-500/10 dark:to-indigo-500/10
                                blur-3xl"></div>
                </div>

                <div class="relative p-6 md:p-8">
                    {{-- header --}}
                    <div class="mb-6 flex items-center justify-between gap-4">
                        <div>
                            <h1 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                Buat akun baru
                            </h1>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Daftar untuk mulai bikin opportunity, thread, dan blog.
                            </p>
                        </div>

                        <span class="shrink-0 inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-semibold
                                     bg-gray-50 border border-gray-200 text-gray-700
                                     dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                            <span class="h-1.5 w-1.5 rounded-full bg-gradient-to-r from-blue-500 to-cyan-400"></span>
                            TAPAK
                        </span>
                    </div>

                    {{-- logo --}}
                    <div class="mb-6 flex justify-center">
                        <div class="group inline-flex items-center gap-3">
                            <span class="relative inline-flex">
                                <span class="absolute -inset-2 rounded-full blur-xl opacity-40 group-hover:opacity-70 transition
                                             bg-gradient-to-r from-cyan-300/30 via-blue-300/20 to-indigo-300/20
                                             dark:from-cyan-400/20 dark:via-blue-500/20 dark:to-indigo-500/20"></span>

                                {{-- pakai komponen logo bawaan --}}
                                <div class="relative">
                                    <x-authentication-card-logo />
                                </div>
                            </span>
                        </div>
                    </div>

                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf

                        {{-- Name --}}
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" class="text-sm font-semibold text-gray-800 dark:text-gray-200" />
                            <x-input
                                id="name"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required
                                autofocus
                                autocomplete="name"
                                class="mt-2 block w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition" />
                        </div>

                        {{-- Email --}}
                        <div>
                            <x-label for="email" value="{{ __('Email') }}" class="text-sm font-semibold text-gray-800 dark:text-gray-200" />
                            <x-input
                                id="email"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autocomplete="username"
                                class="mt-2 block w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition" />
                        </div>

                        {{-- Password --}}
                        <div>
                            <x-label for="password" value="{{ __('Password') }}" class="text-sm font-semibold text-gray-800 dark:text-gray-200" />
                            <x-input
                                id="password"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                class="mt-2 block w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition" />
                        </div>

                        {{-- Confirm Password --}}
                        <div>
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm font-semibold text-gray-800 dark:text-gray-200" />
                            <x-input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                class="mt-2 block w-full rounded-xl px-4 py-3
                                       bg-white dark:bg-white/5
                                       border border-gray-200 dark:border-white/10
                                       text-gray-900 dark:text-gray-100
                                       ring-1 ring-black/5 dark:ring-white/10
                                       focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                       transition" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="pt-2">
                                <label for="terms" class="flex items-start gap-3">
                                    <x-checkbox name="terms" id="terms" required class="mt-1" />

                                    <div class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="font-semibold text-blue-700 hover:text-blue-800 hover:underline underline-offset-4 dark:text-cyan-200 dark:hover:text-cyan-100 transition">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="font-semibold text-blue-700 hover:text-blue-800 hover:underline underline-offset-4 dark:text-cyan-200 dark:hover:text-cyan-100 transition">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </label>
                            </div>
                        @endif

                        {{-- actions --}}
                        <div class="pt-2 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                            <a href="{{ route('login') }}"
                               class="text-sm font-semibold text-gray-700 hover:text-gray-900 hover:underline underline-offset-4 transition
                                      dark:text-gray-300 dark:hover:text-white">
                                {{ __('Already registered?') }}
                            </a>

                            <x-button
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2
                                       rounded-xl px-5 py-3 font-semibold text-white
                                       bg-gradient-to-r from-[#2563EB] to-[#22D3EE]
                                       shadow-[0_14px_40px_rgba(34,211,238,0.20)]
                                       hover:shadow-[0_18px_55px_rgba(34,211,238,0.28)]
                                       transition duration-300">
                                {{ __('Register') }}
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- tiny footer --}}
            <p class="mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
                Dengan mendaftar, kamu setuju untuk menggunakan TAPAK secara bijak.
            </p>
        </div>
    </div>
</x-guest-layout>
