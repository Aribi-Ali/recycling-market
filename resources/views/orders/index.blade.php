<x-app-layout>
  <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($orders as $order)
        <div class="p-5 bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="flex items-center justify-between mb-2">
                <h2 class="text-lg font-semibold text-gray-800">Order #{{ $order->id }}</h2>
                <span
                    class="text-xs px-2 py-1 rounded-full
                @switch($order->status)
                    @case('confirmed') bg-blue-100 text-blue-700 @break
                    @case('delivered') bg-green-100 text-green-700 @break
                    @case('shipped') bg-indigo-100 text-indigo-700 @break
                    @case('cancelled') bg-red-100 text-red-700 @break
                    @default bg-yellow-100 text-yellow-700
                @endswitch">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <div class="mb-1 text-sm text-gray-600">
                <strong>User:</strong> {{ $order->user->name ?? 'Guest' }}
            </div>

            <div class="mb-1 text-sm text-gray-600">
                <strong>Product:</strong> {{ $order->product->title ?? 'N/A' }}
            </div>

            <div class="mb-1 text-sm text-gray-600">
                <strong>Address:</strong>
                @if ($order->address)
                    {{ $order->address->city ?? '' }}, {{ $order->address->country ?? '' }}
                @else
                    N/A
                @endif
            </div>

            <div class="mt-3 text-sm text-gray-500">
                <strong>Created At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}
            </div>
        </div>
    @endforeach
</div>
</x-app-layout>
