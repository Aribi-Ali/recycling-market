<x-app-layout>
    @if(session('success'))
        @include('components.notification', [
            'message' => session(('success'))
        ])
    @elseif(session('error'))
        @include('components.notification', [
            'message' => session('error')
        ])
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
        <div class="flex-1 relative overflow-y-auto focus:outline-none p-4 md:p-6">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 border-t border-gray-200">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                            🏷️ Add New Category
                        </h2>
                    </div>
                    <div class="px-6 py-4">
                        <form action="{{ route('admin.categories.store') }}" method="POST" class="flex gap-4">
                            @csrf
                            <input
                                type="text"
                                name="name"
                                placeholder="Enter category name"
                                class="flex-1 rounded-md border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            />
                            <Button
                                type="submit"
                                class="flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                Add Category
                            </Button>
                        </form>
                    </div>
                </div>
                {{-- Categories List --}}
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-lg font-semibold text-gray-900">Categories</h2>
                    </div>
                    <div class="px-6 py-4">
                        @if($categories->isEmpty())
                            <div class="text-center py-8 text-gray-500">
                                <p>🏷️ No categories found. Add your first category above.</p>
                            </div>
                        @else
                            <div class="divide-y divide-gray-200">
                                @foreach($categories as $category)
                                    <div class="py-4 flex items-center justify-between group hover:bg-gray-50 px-4 -mx-4 rounded-md transition-colors">
                                        <div>
                                            <h3 class="text-lg font-medium text-gray-900">
                                                {{ $category->name }}
                                            </h3>
                                        </div>
                                        <form action="{{ route("admin.categories.destroy", $category->id) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="opacity-0 group-hover:opacity-100 transition-opacity p-2 text-red-600 hover:bg-red-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                                            🗑️
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
