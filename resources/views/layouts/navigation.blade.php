<nav x-data="{ open: false }"
    class="w-screen border-b border-blue-700 shadow-lg bg-gradient-to-r from-blue-600 via-blue-500 to-indigo-600 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 dark:border-gray-700">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="{{ route('dashboard') }}" class="flex items-center">
                        <x-application-logo class="block w-auto text-white fill-current h-9" />
                    </a>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:space-x-6 sm:ms-10">




                        @auth
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-blue-200">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            @can('clients')
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-blue-200">
                                    {{ __('Requests') }}
                                </x-nav-link>
                            @endcan
                            @can('admin')
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-blue-200">
                                    {{ __('Orders') }}
                                </x-nav-link>
                            @endcan
                        @endauth
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Guest -->
                    @guest
                        <div class="hidden sm:flex sm:items-center">
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="text-white hover:text-blue-200">
                                {{ __('Login') }}
                            </x-nav-link>
                        </div>
                    @endguest

                    <!-- Language Switcher -->
                    <div class="relative">
                        <button onclick="toggleDropdown()" id="lang-button"
                            class="flex items-center px-3 py-2 text-white rounded-md hover:bg-blue-700">
                            <span class="text-sm">{{ strtoupper(app()->getLocale()) }}</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="lang-dropdown"
                            class="absolute left-0 z-50 hidden w-32 mt-2 text-gray-900 bg-white rounded-md shadow-md">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                    class="block px-4 py-2 text-sm hover:bg-blue-100">
                                    {{ $properties['native'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Theme Toggle -->
                    <button id="theme-toggle"
                        class="p-2 text-blue-700 bg-white rounded-full dark:bg-gray-700 dark:text-gray-100">
                        <svg id="theme-toggle-light" class="hidden w-6 h-6 dark:block" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path
                                d="M12 3v1m0 16v1m8.66-9h1M4.34 12h1m14.22-5.66l-.71.71M6.16 6.16l-.71.71M17.84 17.84l-.71-.71M6.16 17.84l-.71-.71">
                            </path>
                            <circle cx="12" cy="12" r="5"></circle>
                        </svg>
                        <svg id="theme-toggle-dark" class="w-6 h-6 dark:hidden" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 2a9 9 0 0 0 9 9 9 9 0 0 1-9 9 9 9 0 0 1-9-9 9 9 0 0 0 9-9z"></path>
                        </svg>
                    </button>

                    @auth
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 text-white bg-blue-700 rounded-md hover:bg-blue-800">
                                        <div>{{ Auth::user()->name }}</div>
                                        <svg class="w-4 h-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414
                                            1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>

                        <!-- Mobile Hamburger -->
                        <div class="sm:hidden">
                            <button @click="open = ! open"
                                class="inline-flex items-center justify-center p-2 text-white rounded-md hover:bg-blue-800 focus:outline-none">
                                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endauth
                </div>
            </div>
        </div>

        <!-- Responsive Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            @auth
                <div class="pt-4 pb-1 border-t border-blue-200 dark:border-gray-600">
                    <div class="px-4">
                        <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-blue-200">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
                  @endauth
        </div>
</nav>

<script>
    function toggleDropdown() {
        document.getElementById("lang-dropdown").classList.toggle("hidden");
    }

    document.addEventListener("click", function(event) {
        const dropdown = document.getElementById("lang-dropdown");
        const button = document.getElementById("lang-button");

        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const themeToggle = document.getElementById("theme-toggle");
        const html = document.documentElement;
        const theme = localStorage.getItem("theme");

        if (theme === "dark") {
            html.classList.add("dark");
        }

        themeToggle.addEventListener("click", function() {
            if (html.classList.contains("dark")) {
                html.classList.remove("dark");
                localStorage.setItem("theme", "light");
            } else {
                html.classList.add("dark");
                localStorage.setItem("theme", "dark");
            }
        });
    });
</script>
