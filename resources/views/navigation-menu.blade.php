<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('landing') }}">
                        <svg width="195" height="191" viewBox="0 0 195 191" xmlns="http://www.w3.org/2000/svg"
                            class="block h-7 w-auto fill-blue-600">
                            <path
                                d="M64.5333 2.6416C55.6 5.70827 47.3333 12.5083 41.8667 21.0416C36.1333 29.9749 34.1333 38.1083 34.9333 49.5749C36.1333 66.3749 37.0667 67.5749 93.2 123.575C121.067 151.308 144.8 174.642 146 175.308C147.2 175.975 149.467 176.108 151.067 175.708C155.733 174.508 195.2 134.242 194.267 131.708C193.2 129.042 188.8 128.908 186.667 131.575C185.733 132.642 184.4 133.575 183.6 133.575C182.8 133.575 183.6 132.108 185.333 130.375C188.667 126.642 188.133 122.908 184.267 122.908C182.933 122.908 180.667 124.108 179.333 125.575C178 127.042 176.533 127.975 176.267 127.575C175.867 127.175 176.933 125.442 178.667 123.575C182 119.975 181.467 116.242 177.467 116.242C176 116.242 174 117.175 172.8 118.242C169.467 121.575 168.667 120.508 172 117.042C175.333 113.442 174.8 109.575 171.067 109.575C169.733 109.575 164.4 113.708 159.333 118.908C154.267 123.975 149.467 128.242 148.8 128.242C146.4 128.242 72 52.9083 70.8 49.1749C68.2667 42.1083 73.0667 35.7083 80.6667 35.7083C89.7333 35.7083 93.6 44.9083 88.4 53.7083L86 57.5749L98.2667 69.8416L110.4 81.9749L114.533 77.4416C116.8 74.9083 120.267 69.5749 122.267 65.5749C125.6 59.0416 126 56.7749 126 45.5749C126 30.2416 123.067 23.3083 112.667 12.7749C100.8 0.908268 81.4667 -3.22507 64.5333 2.6416ZM149.333 156.242C148.267 156.908 145.867 157.442 144 157.442L140.667 157.308L144 156.242C145.867 155.708 148.267 155.175 149.333 155.042C151.067 154.908 151.067 155.042 149.333 156.242Z"
                                fill="inherit" />
                            <path
                                d="M25.6 116.642C2.53333 139.842 0 142.775 0 146.908C0 150.908 2.13333 153.575 19.6 171.175C33.4667 185.175 40.1333 190.908 42.2667 190.908C46.1333 190.908 46.4 186.375 43.0667 182.375C40.6667 179.575 40.6667 179.575 43.4667 181.842C46.5333 184.508 51.3333 185.042 52.8 182.775C53.2 181.975 52.2667 179.442 50.6667 177.175L47.6 173.175L50.8 175.308C57.4667 180.108 62 177.042 57.4667 170.908L54.6667 167.042L58.4 169.175C62.2667 171.442 66.6667 170.908 66.6667 168.108C66.6667 167.308 62.1333 161.842 56.5333 156.108L46.4 145.708L61.3333 130.908L76.4 115.975L63.8667 103.442C57.0667 96.5083 51.3333 90.9083 51.3333 90.9083C51.3333 90.9083 39.7333 102.508 25.6 116.642ZM20 142.508C20 146.242 19.6 147.042 18.6667 145.575C16.9333 142.908 16.9333 137.575 18.6667 137.575C19.4667 137.575 20 139.842 20 142.508Z"
                                fill="inherit" />
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('opportunities.index') }}" :active="request()->routeIs('opportunities.*')">
                        {{ __('Opportunity') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('blogs.index') }}" :active="request()->routeIs('blogs.*')">
                        {{ __('Blog') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('threads.index') }}" :active="request()->routeIs('threads.*')">
                        {{ __('Thread') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <div x-data="{
                    theme: localStorage.getItem('theme') || 'light',
                    toggle() {
                        this.theme = (this.theme === 'light') ? 'dark' : 'light';
                        localStorage.setItem('theme', this.theme);
                        document.documentElement.classList.toggle('dark', this.theme === 'dark');
                    }
                }" x-init="document.documentElement.classList.toggle('dark', theme === 'dark')">

                    <button @click="toggle"
                        class="p-2 rounded-md bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition">

                        <template x-if="theme === 'light'">
                            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m0 12.728l.707-.707m12.728-.707l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                            </svg>
                        </template>

                        <template x-if="theme === 'dark'">
                            <svg class="w-5 h-5 text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                            </svg>
                        </template>

                    </button>
                </div>

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="size-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200 dark:border-gray-600"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden gap-2">
                <div x-data="{
                    theme: localStorage.getItem('theme') || 'light',
                    toggle() {
                        this.theme = (this.theme === 'light') ? 'dark' : 'light';
                        localStorage.setItem('theme', this.theme);
                        document.documentElement.classList.toggle('dark', this.theme === 'dark');
                    }
                }" x-init="document.documentElement.classList.toggle('dark', theme === 'dark')">

                    <button @click="toggle"
                        class="p-2 rounded-md bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition">

                        <template x-if="theme === 'light'">
                            <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m0 12.728l.707-.707m12.728-.707l.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                            </svg>
                        </template>

                        <template x-if="theme === 'dark'">
                            <svg class="w-5 h-5 text-gray-100" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
                            </svg>
                        </template>

                    </button>
                </div>

                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>



    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('opportunities.index') }}" :active="request()->routeIs('opportunities.*')">
                {{ __('Opportunity') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('blogs.index') }}" :active="request()->routeIs('blogs.*')">
                {{ __('Blog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('threads.index') }}" :active="request()->routeIs('threads.*')">
                {{ __('Thread') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 me-3">
                        <img class="size-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}"
                        :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-responsive-nav-link>
                    @endcan

                    <!-- Team Switcher -->
                    @if (Auth::user()->allTeams()->count() > 1)
                        <div class="border-t border-gray-200 dark:border-gray-600"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-switchable-team :team="$team" component="responsive-nav-link" />
                        @endforeach
                    @endif
                @endif
            </div>
        </div>
    </div>
</nav>
