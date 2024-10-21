<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
        // Retrieve all orders with user information for the admin to review
        $orders = Order::with('user')->latest()->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    // Show specific order details
    public function show(Order $order)
    {
        // Load order items and user details
        $order->load('orderItems.product', 'user');

        return view('admin.orders.show', compact('order'));
    }
}
