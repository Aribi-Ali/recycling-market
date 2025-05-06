<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Approved Products') }}
        </h2>
    </x-slot>

    <div class="w-full py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (!$products->isEmpty())
                <div class="flex flex-col items-center justify-center py-12 text-center">
                    <h3 class="mb-2 text-lg font-medium text-gray-900">📦 No products found</h3>
                    <p class="max-w-md text-gray-500">There are no pending products at the moment.</p>
                </div>
            @else
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                    <thead class="text-sm text-gray-700 uppercase bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left">Title</th>
                            <th class="px-4 py-3 text-left">Slug</th>
                            <th class="px-4 py-3 text-left">Description</th>
                            <th class="px-4 py-3 text-left">Free?</th>
                            <th class="px-4 py-3 text-left">Price</th>
                            <th class="px-4 py-3 text-left">Condition</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Category</th>
                            <th class="px-4 py-3 text-left">Seller</th>
                            <th class="px-4 py-3 text-left">Published At</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-800 divide-y divide-gray-100">
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-4 py-3">{{ $product->title }}</td>
                                <td class="px-4 py-3">{{ $product->slug }}</td>
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
                                <td class="px-4 py-3">{{ $product->category->name ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $product->seller->name ?? 'N/A' }}</td>
                                <td class="px-4 py-3">
                                    {{ $product->published_at ? $product->published_at->format('Y-m-d') : '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            @endif
        </div>
    </div>
</x-app-layout>
