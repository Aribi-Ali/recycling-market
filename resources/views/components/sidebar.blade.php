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
                <a href="{{ route('products.create') }}"
                class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('products.create') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                {{ __('Add Product') }}
            </a>
            @if (auth()->user()->role == 'admin')
                <a href="{{ route('admin.products.pending') }}"
                    class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.products.pending') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                    {{ __('Pending Products') }}
                </a>
                <a href="{{ route('admin.products.rejected') }}"
                    class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.products.rejected') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                    {{ __('Rejected Products') }}
                </a>
                <a href="{{ route('admin.products.approved') }}"
                class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.products.approved') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                {{ __('Approved Products') }}
            </a>

                    <a href="{{ route('admin.categories.index') }}"
                        class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.categories.index') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                        {{ __('Categories') }}
                    </a>
                    <a href="{{ route('posts.index') }}"
                    class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('posts.index') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                    {{ __('Posts') }}
                </a>
                     <a href="{{ route('admin.orders.index') }}"
                        class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.orders.index') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                        {{ __('Orders') }}
                    </a>
                @endif
                            @if (auth()->user()->role == 'client')

                    <a href="{{ route('orders.index') }}"
                        class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.categories.index') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                        {{ __('My Orders') }}
                    </a>
                     <a href="{{ route('admin.orders.index') }}"
                        class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.categories.index') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                        {{ __('Pending') }}
                    </a>
                     <a href=""
                        class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.categories.index') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                        {{ __('Approved') }}
                    </a>
                     <a href=" "
                        class="flex items-center w-full px-6 py-3 transition-colors duration-200 {{ request()->routeIs('admin.categories.index') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : 'text-gray-600 hover:bg-gray-50' }}">
                        {{ __('Rejected') }}
                    </a>


                @endif
            </li>
        </ul>
    </nav>
</div>
