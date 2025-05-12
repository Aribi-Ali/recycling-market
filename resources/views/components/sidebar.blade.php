<div class="h-full bg-white border-r border-gray-200">
    <div class="flex items-center justify-center h-16 border-b border-gray-200">
        <h1 class="text-xl font-bold text-indigo-600">🛍️ Clothing Admin</h1>
    </div>
    <nav class="mt-6">
        <ul>
            <li class="mb-2">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                    {{ __('Dashboard') }}
                </a>
                <a href="{{ route('admin.products.pending') }}"
                    class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.products.pending') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                    {{ __('Pending Products') }}
                </a>
<<<<<<< HEAD

                @if (auth()->user()->role == "admin")

=======
                <a href="{{ route('admin.products.approved') }}"
                   class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.products.approved') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                    {{ __('Approved Products') }}
                </a>
                <a href="{{ route('admin.products.rejected') }}"
                   class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.products.rejected') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                    {{ __('Rejected Products') }}
                </a>
>>>>>>> 4c6962924be8d24345ae6c079dbc8a21f034ff08
                <a href="{{ route('admin.categories.index') }}"
                class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.categories.index') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                {{ __('Categories') }}
            </a>
            @endif
            </li>
        </ul>
    </nav>
</div>
