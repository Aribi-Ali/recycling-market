<x-app-layout>
  <div class="bg-white">
    <div class="max-w-2xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
      <h2 class="mb-8 text-2xl font-bold tracking-tight text-gray-900">Our Products</h2>

      <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
        @foreach ($products as $product)
          <a href="{{ route('products.show', $product->id) }}"
             class="relative block overflow-hidden transition-shadow duration-300 bg-white border border-gray-200 shadow-md group rounded-xl hover:shadow-xl">

            <div class="overflow-hidden">
              <img
                src="{{ $product->images->first()?->image_url ? asset('storage/' . $product->images->first()->image_url) : asset('images/placeholder.png') }}"
                alt="{{ $product->title }}"
                class="object-cover w-full transition-transform duration-300 ease-in-out h-60 group-hover:scale-105"
              >
            </div>

            <div class="p-4">
              <h3 class="text-xs font-semibold tracking-wide text-indigo-600 uppercase">{{ $product->category->name }}</h3>
              <h4 class="mt-1 text-base font-bold text-gray-900 group-hover:text-indigo-700">{{ $product->title }}</h4>
              <p class="mt-2 text-lg font-semibold text-gray-800">${{ number_format($product->price, 2) }}</p>
            </div>

            <div class="absolute px-2 py-1 text-xs font-medium text-indigo-700 bg-indigo-100 rounded-full top-2 right-2">
              New
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
