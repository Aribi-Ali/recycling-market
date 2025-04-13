<header
    class="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
    <div class="container flex items-center justify-between h-16">
        <div class="flex items-center gap-2">
            <div x-data="{ mobileMenuOpen: false }" class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 mr-2 rounded-md hover:bg-muted"
                    aria-label="Menu">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-5 h-5">
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>
                </button>

                <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 -translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-2"
                    class="absolute left-0 right-0 z-50 p-4 border-b shadow-lg top-16 bg-background"
                    style="display: none;">
                    <nav class="flex flex-col space-y-4">
                        <a href="#" class="text-sm font-medium hover:text-primary">Solutions</a>
                        <a href="#" class="text-sm font-medium hover:text-primary">Products</a>
                        <a href="#" class="text-sm font-medium hover:text-primary">Pricing</a>
                        <a href="#" class="text-sm font-medium hover:text-primary">Resources</a>
                        <a href="#" class="text-sm font-medium hover:text-primary">Company</a>
                    </nav>
                </div>
            </div>

            <a href="/" class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-6 h-6 text-primary">
                    <path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"></path>
                </svg>
                <span class="hidden font-bold sm:inline-block">WeatherApp</span>
            </a>
        </div>

        <nav class="items-center hidden gap-6 md:flex">
            <a href="#" class="text-sm font-medium hover:text-primary">Solutions</a>
            <a href="#" class="text-sm font-medium hover:text-primary">Products</a>
            <a href="#" class="text-sm font-medium hover:text-primary">Pricing</a>
            <a href="#" class="text-sm font-medium hover:text-primary">Resources</a>
            <a href="#" class="text-sm font-medium hover:text-primary">Company</a>
        </nav>

        <div class="flex items-center gap-4">
            <button class="hidden p-2 rounded-md md:flex hover:bg-muted">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
                <span class="sr-only">Search</span>
            </button>

            <a href="#"
                class="items-center justify-center hidden px-4 py-2 text-sm font-medium transition-colors border rounded-md shadow-sm md:inline-flex h-9 border-input bg-background hover:bg-accent hover:text-accent-foreground">
                Log In
            </a>

            <a href="#"
                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium transition-colors rounded-md shadow h-9 bg-primary text-primary-foreground hover:bg-primary/90">
                Get Started
            </a>
            <!-- Language Switcher -->
            <div class="relative">
                <!-- Button -->
                <button onclick="toggleDropdown()" id="lang-button"
                    class="flex items-center px-3 py-2 space-x-2 ounded-md b focus:outline-none">
                    <span class="text-sm">{{ strtoupper(app()->getLocale()) }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>

                <!-- Dropdown -->
                <div id="lang-dropdown"
                    class="absolute left-0 hidden w-32 mt-2 text-gray-900 bg-white rounded-md shadow-md">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                            class="block px-4 py-2 text-sm hover:bg-gray-200">
                            {{ $properties['native'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <script>
                function toggleDropdown() {
                    document.getElementById("lang-dropdown").classList.toggle("hidden");
                }

                // Close dropdown when clicking outside
                document.addEventListener("click", function(event) {
                    const dropdown = document.getElementById("lang-dropdown");
                    const button = document.getElementById("lang-button");

                    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                        dropdown.classList.add("hidden");
                    }
                });
            </script>

        </div>
    </div>
</header>
