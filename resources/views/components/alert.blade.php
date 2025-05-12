<div class="relative">
    <button onclick="toggleDropdown()" id="alert-button"
            class="flex items-center px-3 py-2 text-white rounded-md hover:bg-blue-700">
        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div id="alert-dropdown"
         class="absolute left-0 z-50 hidden w-32 mt-2 text-gray-900 bg-white rounded-md shadow-md">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
               class="block px-4 py-2 text-sm hover:bg-blue-100">
                {{ $properties['native'] }}
            </a>
        @endforeach
    </div>
</div>

<script>
    function toggleDropdown() {
        document.getElementById("alert-dropdown").classList.toggle("hidden");
    }

    document.addEventListener("click", function(event) {
        const dropdown = document.getElementById("alert-dropdown");
        const button = document.getElementById("alert-button");

        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });
</script>
