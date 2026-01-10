<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
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
                    {{-- header inside card --}}
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                Identitas Akun
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Atur nama, email, dan foto profil agar akunmu mudah dikenali.
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-6">

                        {{-- Profile Photo --}}
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div x-data="{photoName: null, photoPreview: null}">
                                <input type="file" id="photo" class="hidden"
                                       wire:model.live="photo"
                                       x-ref="photo"
                                       x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => { photoPreview = e.target.result; };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                       " />

                                <div class="flex flex-col sm:flex-row sm:items-center gap-5">
                                    <div class="relative">
                                        {{-- ring + glow avatar --}}
                                        <div class="absolute -inset-2 rounded-full blur-xl opacity-50
                                                    bg-gradient-to-r from-cyan-300/30 via-blue-300/20 to-indigo-300/20
                                                    dark:from-cyan-400/20 dark:via-blue-500/20 dark:to-indigo-500/20"></div>

                                        {{-- Current Photo --}}
                                        <div class="relative" x-show="!photoPreview">
                                            <img src="{{ $this->user->profile_photo_url }}"
                                                 alt="{{ $this->user->name }}"
                                                 class="rounded-full size-20 object-cover
                                                        ring-2 ring-white/70 dark:ring-white/10
                                                        border border-gray-200/70 dark:border-white/10" />
                                        </div>

                                        {{-- Preview Photo --}}
                                        <div class="relative" x-show="photoPreview" style="display:none;">
                                            <span class="block rounded-full size-20 bg-cover bg-no-repeat bg-center
                                                         ring-2 ring-white/70 dark:ring-white/10
                                                         border border-gray-200/70 dark:border-white/10"
                                                  x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                            </span>
                                        </div>
                                    </div>

                                    <div class="flex-1">
                                        <x-label for="photo" value="{{ __('Photo') }}"
                                                 class="text-sm font-semibold text-gray-800 dark:text-gray-200" />

                                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                            PNG/JPG disarankan. Foto akan dipakai di halaman diskusi & tulisan.
                                        </p>

                                        <div class="mt-3 flex flex-wrap items-center gap-2">
                                            <x-secondary-button type="button"
                                                class="rounded-xl"
                                                x-on:click.prevent="$refs.photo.click()">
                                                {{ __('Select A New Photo') }}
                                            </x-secondary-button>

                                            @if ($this->user->profile_photo_path)
                                                <x-secondary-button type="button"
                                                    class="rounded-xl"
                                                    wire:click="deleteProfilePhoto">
                                                    {{ __('Remove Photo') }}
                                                </x-secondary-button>
                                            @endif

                                            <template x-if="photoName">
                                                <span class="text-xs font-medium text-gray-600 dark:text-gray-300">
                                                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-1
                                                                 bg-gray-50 border border-gray-200 text-gray-700
                                                                 dark:bg-white/5 dark:border-white/10 dark:text-gray-200">
                                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500/80"></span>
                                                        <span x-text="photoName"></span>
                                                    </span>
                                                </span>
                                            </template>
                                        </div>

                                        <x-input-error for="photo" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                        @endif

                        {{-- Name --}}
                        <div>
                            <x-label for="name" value="{{ __('Name') }}"
                                     class="text-sm font-semibold text-gray-800 dark:text-gray-200" />
                            <x-input id="name" type="text"
                                     class="mt-2 block w-full rounded-xl px-4 py-3
                                            bg-white dark:bg-white/5
                                            border border-gray-200 dark:border-white/10
                                            text-gray-900 dark:text-gray-100
                                            ring-1 ring-black/5 dark:ring-white/10
                                            focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                            transition"
                                     wire:model="state.name" required autocomplete="name" />
                            <x-input-error for="name" class="mt-2" />
                        </div>

                        {{-- Email --}}
                        <div>
                            <x-label for="email" value="{{ __('Email') }}"
                                     class="text-sm font-semibold text-gray-800 dark:text-gray-200" />
                            <x-input id="email" type="email"
                                     class="mt-2 block w-full rounded-xl px-4 py-3
                                            bg-white dark:bg-white/5
                                            border border-gray-200 dark:border-white/10
                                            text-gray-900 dark:text-gray-100
                                            ring-1 ring-black/5 dark:ring-white/10
                                            focus:outline-none focus:ring-2 focus:ring-cyan-300/60 focus:border-cyan-300/60
                                            transition"
                                     wire:model="state.email" required autocomplete="username" />
                            <x-input-error for="email" class="mt-2" />

                            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                                <div class="mt-3 rounded-xl border border-amber-200/70 bg-amber-50/60 px-4 py-3
                                            text-sm text-amber-800
                                            dark:border-amber-300/15 dark:bg-amber-500/10 dark:text-amber-200">
                                    <p class="font-semibold">
                                        {{ __('Your email address is unverified.') }}
                                    </p>

                                    <button type="button"
                                            class="mt-1 inline-flex items-center gap-2 font-semibold underline underline-offset-4
                                                   hover:opacity-90
                                                   focus:outline-none focus:ring-2 focus:ring-cyan-300/60 rounded"
                                            wire:click.prevent="sendEmailVerification">
                                        {{ __('Click here to re-send the verification email.') }}
                                        <span>→</span>
                                    </button>

                                    @if ($this->verificationLinkSent)
                                        <p class="mt-2 font-medium text-emerald-700 dark:text-emerald-300">
                                            {{ __('A new verification link has been sent to your email address.') }}
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        {{-- Actions (inside card) --}}
                        <div class="pt-2 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                            <x-action-message class="text-sm text-emerald-600 dark:text-emerald-400" on="saved">
                                {{ __('Saved.') }}
                            </x-action-message>

                            <div class="flex items-center gap-3">
                                <x-button wire:loading.attr="disabled" wire:target="photo">
                                    {{ __('Save') }}
                                </x-button>

                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    Perubahan langsung tersimpan di akunmu.
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        {{-- dikosongin karena actions sudah dibuat di dalam card agar lebih konsisten --}}
    </x-slot>
</x-form-section>
