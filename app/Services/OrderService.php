<?php

namespace App\Services;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderService{

    public function getUserOrders(){
        $orders = Auth::user()->orders()->latest()->with("product", "address")->get();
        return OrderResource::collection($orders);
    }

    public function getAllOrders(){
        $orders = Order::latest()->with(['user', 'product', 'address'])->get();
        return OrderResource::collection($orders);
    }

    public function create($data){
        Auth::user()->orders()->create([
            'product_id' => $data['product_id'],
            'address_id' => $data['address_id'],
            'status' => 'pending'
        ]);
    }

    public function updateStatus($orderId, $status){
        $order = Order::findOrFail($orderId);
        $order->status = $status;
        $order->save();
    }

    public function delete($orderId){
        $order = Order::findOrFail($orderId);
        $order->delete();
    }
}
