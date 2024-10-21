<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Show the checkout page
    public function create()
    {
        $cart = session()->get('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        return view('checkout.create', compact('cart', 'total'));
    }

    // Store a new order
    public function store(Request $request)
    {
        // Get the cart from the session
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Calculate the total
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));

        // Create the order
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'pending', // Default status
        ]);

        // Create order items
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // Clear the cart after placing the order
        session()->forget('cart');

        return redirect()->route('user-orders.display', $order->id)->with('success', 'Order placed successfully!');
    }

    // Show order details
    public function display(Order $order)
    {
        $this->authorize('view', $order); // Ensure the user can only see their own orders
        $orderItems = $order->orderItems;

        return view('user_orders.show', compact('order', 'orderItems'));
    }
}
