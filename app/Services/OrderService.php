<?php

namespace App\Services;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Notifications\OrderConfirmedNotification;
use Illuminate\Support\Facades\Auth;

class OrderService
{

    public function getUserOrders()
    {
        $orders = Auth::user()->orders()->latest()->with("product")->get();
        return OrderResource::collection($orders);
    }

    public function getAllOrders()
    {
        $orders = Order::latest()->with(['user', 'product',])->get();
        return OrderResource::collection($orders);
    }

    public function create($data)
    {
        // dd($data->location);
        Auth::user()->orders()->create([
            'product_id' => $data['product_id'],
            'location' => $data->location,
            // 'address_id' => $data['address_id'],
            'status' => 'pending'
        ]);
    }

    public function updateStatus($orderId, $status)
    {
        $order = Order::findOrFail($orderId);
        $updatedStatus = $order->status = $status;
        $order->save();

        // Send notification
        $message = match ($updatedStatus) {
            "pending" => "Your order #{$order->id} is pending approval.",
            'confirmed' => "Your order #{$order->id} has been confirmed.",
            'shipped'   => "Your order #{$order->id} is on the way!",
            'delivered' => "Your order #{$order->id} has been delivered.",
            'cancelled' => "Your order #{$order->id} has been cancelled.",
        };
        $user = $order->user;
        $user->notify(new OrderConfirmedNotification($order, $message));
    }

    public function delete($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->delete();
    }
}
