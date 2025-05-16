<x-app-layout>
    @if(session('success'))
        @include('components.notification', [
            'message' => session(('success'))
        ])
    @endif
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Pending Products') }}
        </h2>
    </x-slot>

    <div class="w-full py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if ($products->isEmpty())
                <div class="flex flex-col items-center justify-center py-12 text-center">
                    <h3 class="mb-2 text-lg font-medium text-gray-900">📦 No products found</h3>
                    <p class="max-w-md text-gray-500">There are no pending products at the moment.</p>
                </div>
            @else
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left">Title</th>
                            <th class="px-4 py-3 text-left">Description</th>
                            <th class="px-4 py-3 text-left">Free?</th>
                            <th class="px-4 py-3 text-left">Price</th>
                            <th class="px-4 py-3 text-left">Condition</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Category</th>
                            <th class="px-4 py-3 text-left">Seller</th>
                            <th class="px-4 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-800 divide-y divide-gray-100">
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-4 py-3">
                                        <a href="{{route("products.show",$product->id)}} ">
                                            {{ $product->title }}</td>
                                        </a>
                                <td class="max-w-xs px-4 py-3 line-clamp-2">{{ $product->description }}</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="px-2 py-1 rounded-full text-xs {{ $product->is_free ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $product->is_free ? 'Yes' : 'No' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">{{ $product->price }}</td>
                                <td class="px-4 py-3 capitalize">{{ $product->condition }}</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="px-2 py-1 rounded-full text-xs
                                        @if ($product->status === 'approved') bg-green-100 text-green-700
                                        @elseif($product->status === 'pending') bg-yellow-100 text-yellow-700
                                        @else bg-red-100 text-red-700 @endif">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">{{ $product->category->name }}</td>
                                <td class="px-4 py-3">{{ $product->seller->last_name }} {{ $product->seller->first_name }}</td>
                                <td class="flex gap-2 px-4 py-3">
                                    <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" class="flex gap-4">
                                        @csrf
                                        @method('PUT')
                                        <Button
                                            type="submit"
                                            class="flex items-center px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                                        >
                                            Approve
                                        </Button>
                                    </form>
                                    <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" class="flex gap-4">
                                        @csrf
                                        @method('PUT')
                                        <Button
                                            type="submit"
                                            class="flex items-center px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                                        >
                                            Reject
                                        </Button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @endif
        </div>
    </div>
</x-app-layout>
