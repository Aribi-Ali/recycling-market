<x-guest-layout>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-2xl font-extrabold text-center text-gray-900 dark:text-gray-100">
            {{ __('Create your account') }}
        </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow dark:bg-gray-800 sm:rounded-lg sm:px-10">
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- First Name -->
                <div>
                    <x-input-label for="first_name" :value="__('First Name')" class="text-sm font-medium" />
                    <div class="mt-1">
                        <x-text-input id="first_name"
                            class="block w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500"
                            type="text" name="first_name" :value="old('first_name')" required autofocus />
                    </div>
                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                </div>

                <!-- Last Name -->
                <div>
                    <x-input-label for="last_name" :value="__('Last Name')" class="text-sm font-medium" />
                    <div class="mt-1">
                        <x-text-input id="last_name"
                            class="block w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500"
                            type="text" name="last_name" :value="old('last_name')" required />
                    </div>
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-sm font-medium" />
                    <div class="mt-1">
                        <x-text-input id="email"
                            class="block w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500"
                            type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Phone Number -->
                <div>
                    <x-input-label for="phone_number" :value="__('Phone Number')" class="text-sm font-medium" />
                    <div class="mt-1">
                        <x-text-input id="phone_number"
                            class="block w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500"
                            type="tel" name="phone_number" :value="old('phone_number')" required
                            placeholder="+1 (555) 123-4567" />
                    </div>
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

                <!-- Location Selection with Search -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <!-- Wilaya Selection -->
                    <div>
                        <x-input-label for="wilaya_id" :value="__('Wilaya')" class="text-sm font-medium" />
                        <div class="mt-1">
                            <select id="wilaya_id" name="wilaya_id"
                                class="w-full h-10 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <option value="">{{ __('Select Wilaya') }}</option>
                                @foreach ($wilayas as $wilaya)
                                    <option value="{{ $wilaya->id }}"
                                        {{ old('wilaya_id') == $wilaya->id ? 'selected' : '' }}>
                                        {{ $wilaya->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('wilaya_id')" class="mt-2" />
                    </div>

                    <!-- Daira Selection -->
                    <div>
                        <x-input-label for="daira_id" :value="__('Daira')" class="text-sm font-medium" />
                        <div class="relative mt-1">
                            <select id="daira_id" name="daira_id"
                                class="w-full h-10 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                disabled>
                                <option value="">{{ __('Select Daira') }}</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"
                                id="daira-loading" style="display: none;">
                                <svg class="w-5 h-5 text-indigo-500 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('daira_id')" class="mt-2" />
                    </div>

                    <!-- City Selection -->
                    <div>
                        <x-input-label for="city_id" :value="__('City')" class="text-sm font-medium" />
                        <div class="relative mt-1">
                            <select id="city_id" name="city_id"
                                class="w-full h-10 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                disabled>
                                <option value="">{{ __('Select City') }}</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none"
                                id="city_loading" style="display: none;">
                                <svg class="w-5 h-5 text-indigo-500 animate-spin" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-sm font-medium" />
                    <div class="mt-1">
                        <x-text-input id="password"
                            class="block w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password" name="password" required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-sm font-medium" />
                    <div class="mt-1">
                        <x-text-input id="password_confirmation"
                            class="block w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox"
                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                        <label for="terms" class="block ml-2 text-sm text-gray-900 dark:text-gray-300">
                            {{ __('I agree to the') }} <a href="#"
                                class="text-indigo-600 hover:text-indigo-500">{{ __('Terms of Service') }}</a>
                        </label>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <a class="text-sm font-medium text-indigo-600 hover:text-indigo-500" href="{{ route('login') }}">
                        {{ __('Already have an account?') }}
                    </a>
                    <x-primary-button
                        class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Create Account') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Get DOM elements
const wilayaSelect = document.getElementById('wilaya_id');
const dairaSelect = document.getElementById('daira_id');
const citySelect = document.getElementById('city_id');
const dairaLoading = document.getElementById('daira-loading');
const cityLoading = document.getElementById('city_loading');

// Set CSRF token for all AJAX requests
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Helper function to display loading state
function setLoading(element, loadingElement, isLoading) {
    if (isLoading) {
        element.classList.add('opacity-75');
        element.setAttribute('disabled', 'disabled');
        if (loadingElement) loadingElement.style.display = 'flex';
    } else {
        element.classList.remove('opacity-75');
        element.removeAttribute('disabled');
        if (loadingElement) loadingElement.style.display = 'none';
    }
}

// Helper function to populate select options
function populateOptions(selectElement, data, textKey = 'name') {
    // Clear all options except the first one
    selectElement.querySelectorAll('option:not(:first-child)').forEach(option => option.remove());

    // Add new options
    data.forEach(item => {
        const option = document.createElement('option');
        option.value = item.id;
        option.textContent = item[textKey];
        selectElement.appendChild(option);
    });
}

// Load dairas when wilaya changes
wilayaSelect.addEventListener('change', function() {
    const wilayaId = this.value;

    // Reset dependent selects
    dairaSelect.value = '';
    citySelect.value = '';
    citySelect.setAttribute('disabled', 'disabled');

    if (!wilayaId) {
        dairaSelect.setAttribute('disabled', 'disabled');
        return;
    }

    // Fetch dairas for selected wilaya
    setLoading(dairaSelect, dairaLoading, true);

    // Fix: Ensure proper URL format with leading slash
    fetch(`/api/wilayas/${wilayaId}/dairas`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Network response was not ok: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        populateOptions(dairaSelect, data);
        dairaSelect.removeAttribute('disabled');
    })
    .catch(error => {
        console.error('Error fetching dairas:', error);
        showToast('Error loading dairas. Please try again.', 'error');
    })
    .finally(() => {
        setLoading(dairaSelect, dairaLoading, false);
    });
});

// Load cities when daira changes
dairaSelect.addEventListener('change', function() {
    const dairaId = this.value;

    // Reset City select
    citySelect.value = '';

    if (!dairaId) {
        citySelect.setAttribute('disabled', 'disabled');
        return;
    }

    // Fetch cities for selected daira
    setLoading(citySelect, cityLoading, true);

    fetch(`/api/dairas/${dairaId}/cities`, {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`Network response was not ok: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        populateOptions(citySelect, data);
        citySelect.removeAttribute('disabled');
    })
    .catch(error => {
        console.error('Error fetching cities:', error);
        showToast('Error loading cities. Please try again.', 'error');
    })
    .finally(() => {
        setLoading(citySelect, cityLoading, false);
    });
});

// Simple toast notification function
function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `fixed top-4 right-4 px-4 py-2 rounded-md text-white text-sm font-medium shadow-lg z-50 ${
        type === 'error' ? 'bg-red-500' : 'bg-green-500'
    }`;
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('opacity-0', 'transition-opacity', 'duration-500');
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 500);
    }, 3000);
}

// If you need to preselect values (e.g., when editing a record)
function initializeSelects() {
    const preselectedWilaya = wilayaSelect.value;
    const preselectedDaira = dairaSelect.dataset.preselected;
    const preselectedCity = citySelect.dataset.preselected;

    if (preselectedWilaya) {
        wilayaSelect.dispatchEvent(new Event('change'));

        if (preselectedDaira) {
            // Wait for dairas to load before selecting
            const checkDairas = setInterval(() => {
                if (dairaSelect.options.length > 1) {
                    clearInterval(checkDairas);
                    dairaSelect.value = preselectedDaira;
                    dairaSelect.dispatchEvent(new Event('change'));

                    if (preselectedCity) {
                        // Wait for cities to load before selecting
                        const checkCities = setInterval(() => {
                            if (citySelect.options.length > 1) {
                                clearInterval(checkCities);
                                citySelect.value = preselectedCity;
                            }
                        }, 100);
                    }
                }
            }, 100);
        }
    }
}

// Initialize the form on page load
document.addEventListener('DOMContentLoaded', function() {
    initializeSelects();
});
    </script>
</x-guest-layout>
