<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {

        $orders = $this->orderService->getUserOrders();
        return view('orders.index', compact('orders'));
    }

    public function store(OrderRequest $request)
    {
        $this->orderService->create($request);
        return redirect()->back()->with('success', 'Order created!');
    }

    // Admin views all orders
    public function adminIndex()
    {
        $orders = $this->orderService->getAllOrders();
        return view('admin.orders.index', compact('orders'));
    }

    public function changeStatus(Order $order, Request $request)
    {
        $this->orderService->updateStatus($order, $request);
        return redirect()->back()->with('success', 'Order status updated!');
    }

    public function destroy(Order $order)
    {
        $this->orderService->delete($order);
        return redirect()->back()->with('success', 'Order deleted!');
    }
}
