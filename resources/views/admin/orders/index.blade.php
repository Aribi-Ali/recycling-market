<x-app-layout>
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
        <thead class="text-sm text-gray-700 uppercase bg-gray-100">
            <tr>
                <th class="px-4 py-3 text-left">Order ID</th>
                <th class="px-4 py-3 text-left">User</th>
                <th class="px-4 py-3 text-left">Product</th>
                <th class="px-4 py-3 text-left">Address</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Created At</th>
            </tr>
        </thead>
        <tbody class="text-sm text-gray-800 divide-y divide-gray-100">
            @foreach ($orders as $order)
                <tr>
                    <td class="px-4 py-3">{{ $order->id }}</td>
                    <td class="px-4 py-3">{{ $order->user->first_name . ' ' . $order->user->last_name ?? 'Guest' }}</td>
                    <td class="px-4 py-3">{{ $order->product->title ?? 'N/A' }}</td>
                    <td class="px-4 py-3">
                        @if ($order->location)
                            {{ $order->location ?? '' }}, {{ $order->location ?? '' }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <span
                            class="px-2 py-1 rounded-full text-xs
                    @switch($order->status)
                        @case('confirmed') bg-blue-100 text-blue-700 @break
                        @case('delivered') bg-green-100 text-green-700 @break
                        @case('shipped') bg-indigo-100 text-indigo-700 @break
                        @case('cancelled') bg-red-100 text-red-700 @break
                        @default bg-yellow-100 text-yellow-700
                    @endswitch">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="px-4 py-3">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
