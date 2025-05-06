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
{{--
                <!-- City Selection with Search -->
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    <!-- Wilaya Selection -->
                    <div>
                        <x-input-label for="wilaya_id" :value="__('Wilaya')" class="text-sm font-medium" />
                        <div class="mt-1">
                            <select id="wilaya_id" name="wilaya_id"
                                class="w-full h-10 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                <option value="">{{ __('Select Wilaya') }}</option>
                                 @foreach ($wilayas as $wilaya)
                    <option value="{{ $wilaya->id }}">{{ $wilaya->name_fr }}</option>
                @endforeach
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('wilaya_id')" class="mt-2" />
                    </div>

                    <!-- Daira Selection -->
                    <div>
                        <x-input-label for="daira_id" :value="__('Daira')" class="text-sm font-medium" />
                        <div class="mt-1">
                            <select id="daira_id" name="daira_id"
                                class="w-full h-10 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                disabled>
                                <option value="">{{ __('Select Daira') }}</option>
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('daira_id')" class="mt-2" />
                    </div>

                    <!-- Commune Selection -->
                    <div>
                        <x-input-label for="commune_id" :value="__('Commune')" class="text-sm font-medium" />
                        <div class="mt-1">
                            <select id="commune_id" name="commune_id"
                                class="w-full h-10 border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                                disabled>
                                <option value="">{{ __('Select Commune') }}</option>
                            </select>
                        </div>
                        <x-input-error :messages="$errors->get('commune_id')" class="mt-2" />
                    </div>
                </div>

 --}}
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

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const citySearch = document.getElementById('city_search');
                const citySelect = document.getElementById('city');
                const cityResults = document.getElementById('city_results');

                // Get all cities from the select element
                const cities = Array.from(citySelect.options).slice(1).map(option => {
                    return {
                        value: option.value,
                        text: option.text
                    };
                });

                // Function to display search results
                function displayResults(results) {
                    cityResults.innerHTML = '';
                    cityResults.classList.remove('hidden');

                    if (results.length === 0) {
                        const noResults = document.createElement('div');
                        noResults.textContent = 'No cities found';
                        noResults.className = 'px-4 py-2 text-sm text-gray-700 dark:text-gray-300';
                        cityResults.appendChild(noResults);
                        return;
                    }

                    results.forEach(city => {
                        const div = document.createElement('div');
                        div.textContent = city.text;
                        div.className =
                            'px-4 py-2 text-sm hover:bg-indigo-100 dark:hover:bg-indigo-900 cursor-pointer';
                        div.dataset.value = city.value;

                        div.addEventListener('click', function() {
                            citySearch.value = city.text;
                            citySelect.value = city.value;
                            cityResults.classList.add('hidden');
                        });

                        cityResults.appendChild(div);
                    });
                }

                // Search function
                function searchCities(query) {
                    if (!query) {
                        cityResults.classList.add('hidden');
                        return;
                    }

                    const results = cities.filter(city =>
                        city.text.toLowerCase().includes(query.toLowerCase())
                    );

                    displayResults(results);
                }

                // Event listeners
                citySearch.addEventListener('focus', function() {
                    if (citySearch.value) {
                        searchCities(citySearch.value);
                    }
                });

                citySearch.addEventListener('input', function() {
                    searchCities(this.value);
                });

                // Close results when clicking outside
                document.addEventListener('click', function(e) {
                    if (!citySearch.contains(e.target) && !cityResults.contains(e.target)) {
                        cityResults.classList.add('hidden');
                    }
                });

                // Handle keyboard navigation
                citySearch.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        cityResults.classList.add('hidden');
                    }
                });
            });





            document.addEventListener('DOMContentLoaded', function() {
                const wilayaSelect = document.getElementById('wilaya_id');
                const dairaSelect = document.getElementById('daira_id');
                const communeSelect = document.getElementById('commune_id');

                // Set CSRF token for all AJAX requests
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Helper function to display loading state
                function setLoading(element, isLoading) {
                    if (isLoading) {
                        element.classList.add('opacity-75');
                        element.setAttribute('disabled', 'disabled');
                    } else {
                        element.classList.remove('opacity-75');
                        element.removeAttribute('disabled');
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
                    communeSelect.value = '';
                    communeSelect.setAttribute('disabled', 'disabled');

                    if (!wilayaId) {
                        dairaSelect.setAttribute('disabled', 'disabled');
                        return;
                    }

                    // Fetch dairas for selected wilaya
                    setLoading(dairaSelect, true);

                    fetch(`/api/wilayas/${wilayaId}/dairas`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            populateOptions(dairaSelect, data);
                            dairaSelect.removeAttribute('disabled');
                        })
                        .catch(error => {
                            console.error('Error fetching dairas:', error);
                            // Show an error message to the user if needed
                        })
                        .finally(() => {
                            setLoading(dairaSelect, false);
                        });
                });

                // Load communes when daira changes
                dairaSelect.addEventListener('change', function() {
                    const dairaId = this.value;

                    // Reset commune select
                    communeSelect.value = '';

                    if (!dairaId) {
                        communeSelect.setAttribute('disabled', 'disabled');
                        return;
                    }

                    // Fetch communes for selected daira
                    setLoading(communeSelect, true);

                    fetch(`/api/dairas/${dairaId}/communes`, {
                            method: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            populateOptions(communeSelect, data);
                            communeSelect.removeAttribute('disabled');
                        })
                        .catch(error => {
                            console.error('Error fetching communes:', error);
                            // Show an error message to the user if needed
                        })
                        .finally(() => {
                            setLoading(communeSelect, false);
                        });
                });

                // If you need to preselect values (e.g., when editing a record)
                function initializeSelects() {
                    const preselectedWilaya = wilayaSelect.value;
                    const preselectedDaira = dairaSelect.dataset.preselected;
                    const preselectedCommune = communeSelect.dataset.preselected;

                    if (preselectedWilaya) {
                        wilayaSelect.dispatchEvent(new Event('change'));

                        if (preselectedDaira) {
                            // Wait for dairas to load before selecting
                            const checkDairas = setInterval(() => {
                                if (dairaSelect.options.length > 1) {
                                    clearInterval(checkDairas);
                                    dairaSelect.value = preselectedDaira;
                                    dairaSelect.dispatchEvent(new Event('change'));

                                    if (preselectedCommune) {
                                        // Wait for communes to load before selecting
                                        const checkCommunes = setInterval(() => {
                                            if (communeSelect.options.length > 1) {
                                                clearInterval(checkCommunes);
                                                communeSelect.value = preselectedCommune;
                                            }
                                        }, 100);
                                    }
                                }
                            }, 100);
                        }
                    }
                }

                // Initialize if needed (for edit forms)
                if (wilayaSelect.value) {
                    initializeSelects();
                }
            });
        </script>
    @endpush
</x-guest-layout>
