<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow dark:bg-gray-800">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex">
            <div class="h-full bg-white border-r border-gray-200">
                <div class="flex items-center justify-center h-16 border-b border-gray-200">
                    <h1 class="text-xl font-bold text-indigo-600">🛍️ Clothing Admin</h1>
                </div>
                <nav class="mt-6">
                    <ul>
                        <li class="mb-2">
                            <a href="{{route('dashboard')}}" class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                                {{ __('Dashboard') }}
                            </a>
                            <a href="{{route('admin.products.approved')}}" class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.products.approved') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                                {{ __('Approved Products') }}
                            </a>
                            <a href="{{route('admin.products.pending')}}" class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.products.pending') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                                {{ __('Pending Products') }}
                            </a>
                            <a href="{{route('admin.categories.index')}}" class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.categories.index') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                                {{ __('Categories') }}
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            {{ $slot }}
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
