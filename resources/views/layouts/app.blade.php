<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased ">
    <div class="max-h-screen min-h-screen bg-white dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="flex h-screen bg-gray-50">
            <div class="hidden @auth
                md:flex
            @endauth">
            @auth

            <div class="flex flex-col w-64">
                @include('components.sidebar')
            </div>
            @endauth
            </div>
            <div class="flex flex-col flex-1 overflow-hidden">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white shadow dark:bg-gray-800">
                        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset
                <main class="relative flex-1 p-4 overflow-y-auto focus:outline-none md:p-6">
                    {{ $slot }}
                </main>
            </div>
        </main>
        
    </div>
</body>
<script>
    // Function to show the notification
    function showNotification(message, subMessage = null) {
        const notification = document.getElementById('notification');

        // Update the notification content
        notification.querySelector('.text-gray-900').textContent = message;
        if (subMessage) {
            notification.querySelector('.text-gray-500').textContent = subMessage;
        } else {
            const subMessageElement = notification.querySelector('.text-gray-500');
            if (subMessageElement) {
                subMessageElement.remove();
            }
        }

        // Show the notification
        notification.classList.remove('hidden');

        // Automatically hide the notification after 5 seconds
        setTimeout(() => {
            hideNotification();
        }, 5000); // Adjust the duration as needed
    }

    // Function to hide the notification
    function hideNotification() {
        const notification = document.getElementById('notification');
        notification.classList.add('hidden');
    }

    // Automatically show the notification if it exists
    document.addEventListener('DOMContentLoaded', function () {
        const notification = document.getElementById('notification');
        if (notification) {
            const message = notification.querySelector('.text-gray-900').textContent;
            const subMessageElement = notification.querySelector('.text-gray-500');
            const subMessage = subMessageElement ? subMessageElement.textContent : null;

            showNotification(message, subMessage);
        }
    });
</script>
</html>
