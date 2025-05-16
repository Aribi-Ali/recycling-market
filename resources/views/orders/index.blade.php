<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if ($orders->isEmpty())
                <div class="p-6 text-center bg-white rounded-lg shadow">
                    <p class="text-gray-600">You haven't placed any orders yet.</p>
                </div>
            @else
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($orders as $order)
                        <div class="p-6 bg-white border border-gray-100 shadow-md rounded-xl">
                            <h3 class="mb-2 text-lg font-bold text-gray-800">
                                {{ $order->product->name ?? 'Product not found' }}
                            </h3>

                            <p class="mb-1 text-sm text-gray-600">
                                <strong>Status:</strong>
                                <span
                                    class="capitalize {{ $order->status === 'cancelled' ? 'text-red-600' : 'text-blue-600' }}">
                                    {{ $order->status }}
                                </span>
                            </p>

                            <p class="mb-1 text-sm text-gray-600">
                                <strong>Location:</strong> {{ $order->location ?? 'N/A' }}
                            </p>

                            <p class="mb-1 text-sm text-gray-600">
                                <strong>Address:</strong>
                                {{ optional($order->address)->full_address ?? 'Not provided' }}
                            </p>

                            <p class="mt-2 text-xs text-gray-500">
                                Ordered at: {{ $order->created_at->format('M d, Y h:i A') }}
                            </p>

                            <div class="flex items-center justify-between mt-4">
                                <a href="{{ route('orders.show', $order->id) }}"
                                    class="text-sm text-blue-500 hover:underline">View Details</a>

                                @if ($order->status === 'pending')
                                    <form action="{{ route('orders.cancel', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-sm text-red-500 hover:underline"
                                            onclick="return confirm('Are you sure you want to cancel this order?')">
                                            Cancel
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
