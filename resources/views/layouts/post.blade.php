<x-app-layout>
    <nav class="w-full p-4 shadow bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600">
        <div class="flex items-center justify-between max-w-6xl mx-auto text-white">
            <a href="/" class="flex items-center gap-2 text-xl font-bold transition hover:text-gray-200">
                <!-- Home Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 9.75L12 4l9 5.75v9.5A2.75 2.75 0 0118.25 22H5.75A2.75 2.75 0 013 19.25v-9.5z" />
                </svg>
                My Laravel Blog
            </a>

            <div class="flex items-center gap-6">
                <a href="{{ route('posts.index') }}"
                    class="flex items-center gap-2 text-white transition hover:text-blue-100">
                    <!-- Document Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 7h10M7 11h10M7 15h10M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    All Posts
                </a>

                <a href="{{ route('posts.create') }}"
                    class="flex items-center gap-2 text-white transition hover:text-blue-100">
                    <!-- Plus Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    New Post
                </a>
            </div>
        </div>
    </nav>

    <main class="p-6">
        {{ $slot }}
    </main>
</x-app-layout>
