<x-app-layout>
  <div class="py-12 bg-white">
    <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-10 lg:grid-cols-2">
        <!-- Product Image -->
        <div>
          <img
            src="{{ $product->images->first()?->image_url ? asset('storage/' . $product->images->first()->image_url) : asset('images/placeholder.png') }}"
            alt="{{ $product->title }}"
            class="w-full h-[400px] object-cover rounded-xl shadow-md"
          />
        </div>

        <!-- Product Details & Order Form -->
        <div>
          <h2 class="text-2xl font-bold text-gray-900">{{ $product->title }}</h2>
          <p class="mt-1 text-sm text-indigo-600">{{ $product->category->name }}</p>
          <p class="mt-4 text-xl font-semibold text-gray-800">${{ number_format($product->price, 2) }}</p>

          <p class="mt-6 text-gray-700">{{ $product->description }}</p>

          <!-- Order Form -->
          <form action="{{ route('orders.store') }}" method="POST" class="mt-8 space-y-4">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div>
              <label for="location" class="block text-sm font-medium text-gray-700">Your Location</label>
              <input
                type="text"
                name="location"
                id="location"
                placeholder="Street name, door number..."
                class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                required
              >
            </div>

            <button type="submit"
              class="inline-flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-indigo-600 rounded-md shadow-md hover:bg-indigo-700">
              Make Order Now
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
