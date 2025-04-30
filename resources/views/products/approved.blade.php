<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Approved Products') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!$products->isEmpty())
                <div class="flex flex-col items-center justify-center py-12 text-center">
                    <h3 class="text-lg font-medium text-gray-900 mb-2">📦 No products found</h3>
                    <p class="text-gray-500 max-w-md">There are no pending products at the moment.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        <div class="transition-all duration-300 hover:shadow-lg transform hover:-translate-y-1">
                            <div class="relative h-48 overflow-hidden rounded-t-lg">
                                <img
                                    src=""
                                    alt=""
                                    class="w-full h-full object-cover"
                                />
                            </div>
                        </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
