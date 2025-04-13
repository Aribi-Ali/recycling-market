<x-app-layout>
    <div class="mt-2 w-full">
        <nav class="w-[90vw] bg-gray-100 dark:bg-gray-800 p-4 shadow-md rounded-lg">
            <ul class="flex space-x-6">
                <!-- Services -->
                <li>
                    <a href=""
                        class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z" />
                        </svg>
                        <span>Services</span>
                    </a>
                </li>

                <!-- Create -->
                <li>
                    <a href=""
                        class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-green-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                        </svg>
                        <span>Create</span>
                    </a>
                </li>

                <!-- Unactive -->
                <li>
                    <a href=""
                        class="flex items-center space-x-2 text-gray-700 dark:text-gray-300 hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a7 7 0 100 14 7 7 0 000-14zM8.293 7.293a1 1 0 011.414 0L10 7.586l.293-.293a1 1 0 011.414 1.414L10 10.414l-1.707-1.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Unactive</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
    <!-- Page Content -->
    <div>
        {{ $slot }}
    </div>

    </html>
</x-app-layout>
