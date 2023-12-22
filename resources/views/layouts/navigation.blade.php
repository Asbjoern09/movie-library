<nav x-data="{ open: false }" class="bg-purple-theme dark:bg-purple-dark-theme border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-9xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 ">
            <!-- Leftside Burgermenu -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border-purple-theme border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 dark:bg-purple-dark-theme bg-purple-theme hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('frontpage')">
                            {{ __('Frontpage') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('frontpage')">
                            {{ __('New Releases') }}
                        </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Logo -->
            <div class="mt-4 flex-2 items-left">



                <a href="{{ route('frontpage') }}">
                    {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /> --}}
                    <ion-icon name="film-outline" size="large" class="text-gray-300"></ion-icon>
                </a>
            </div>

            <div class="flex mx-auto place-items-center justify-center">
                <div class="items-center justify-center">
                    <x-searchbar />

                </div>
            </div>
            @auth
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center  sm:mr-8 flex-1.5">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-right px-3 py-2 border-purple-theme border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 dark:bg-purple-dark-theme bg-purple-theme hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link>
                            <button type="button" onclick="colorSchemeSwitcher()">Switch Color Scheme</button>

                            <script>

                            </script>
                        </x-dropdown-link>

                        <form method="GET" action="{{ route('commenthistory') }}">
                            @csrf
                            <x-dropdown-link :href="route('commenthistory')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Comment History') }}
                            </x-dropdown-link>
                        </form>
                        @auth
                        @if(auth()->user()->role === 'admin')
                        <x-dropdown-link :href="route('admin.page.show')">
                            {{ __('Admin page') }}
                        </x-dropdown-link>
                        @endif
                        @endauth
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md bg-purple-theme text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @endauth

    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
    @auth
    
        @else
        <a href="{{ route('login') }}" class="font-semibold text-gray-200 hover:text-gray-200 dark:text-gray-200 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-purple-500">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-200 hover:text-gray-200 dark:text-gray-200 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-purple-500">Register</a>
        @endif
        @endauth
    </div>
    @endif
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</nav>
