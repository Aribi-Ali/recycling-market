<x-app-layout>
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <a href="{{ route('products.index') }}" class="mr-4 text-indigo-600 hover:text-indigo-900">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </a>
                        <h1 class="text-2xl font-bold">{{ $product->title }}</h1>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25">
                            Edit Product
                        </a>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    <!-- Product Images Gallery -->
                    <div
                        x-data="{
                            activeImage: '{{ $product->images->count() > 0 ? $product->images->first()->url : '' }}',
                            images: {{ json_encode($product->images->map->url) }},
                            setActiveImage(url) {
                                this.activeImage = url;
                            }
                        }"
                        class="space-y-4"
                    >
                        @if($product->images->count() > 0)
                            <div class="overflow-hidden bg-gray-200 rounded-lg aspect-w-1 aspect-h-1">
                                <img :src="activeImage" alt="{{ $product->title }}" class="object-cover object-center w-full h-full">
                            </div>
                            <div class="grid grid-cols-5 gap-2">
                                <template x-for="(image, index) in images" :key="index">
                                    <button
                                        @click="setActiveImage(image)"
                                        :class="{'ring-2 ring-indigo-500': activeImage === image}"
                                        class="overflow-hidden rounded-md aspect-w-1 aspect-h-1"
                                    >
                                        <img :src="image" alt="{{ $product->title }}" class="object-cover object-center w-full h-full">
                                    </button>
                                </template>
                            </div>
                        @else
                            <div class="flex items-center justify-center bg-gray-200 rounded-lg aspect-w-1 aspect-h-1">
                                <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Product Details -->
                    <div class="space-y-6">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $product->title }}</h2>
                            <p class="text-gray-500">{{ $product->slug }}</p>
                        </div>

                        <div class="flex items-center">
                            <span class="text-2xl font-bold">
                                @if($product->is_free)
                                    Free
                                @else
                                    ${{ number_format($product->price, 2) }}
                                @endif
                            </span>
                            <span class="ml-4 px-2 py-1 text-xs font-semibold rounded-full {{ $product->condition === 'new' ? 'bg-green-100 text-green-800' : ($product->condition === 'used' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                {{ ucfirst($product->condition) }}
                            </span>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium">Description</h3>
                            <div class="mt-2 prose prose-indigo">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-lg font-medium">Category</h3>
                            <p class="mt-1">{{ $product->category->name }}</p>
                        </div>

                        @if($product->variants->count() > 0)
                            <div>
                                <h3 class="text-lg font-medium">Variants</h3>
                                <div class="mt-3 overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Name</th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">SKU</th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Price</th>
                                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($product->variants as $variant)
                                                <tr>
                                                    <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">{{ $variant->name }}</td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $variant->sku }}</td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">${{ number_format($variant->price, 2) }}</td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $variant->stock }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        <div class="pt-4">
                            <button type="button" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
