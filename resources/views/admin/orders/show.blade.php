<x-app-layout>
    <div class="container mt-4">
        <h2 class="mb-4">Order #{{ $order->id }} Details</h2>

        <div class="mb-3">
            <strong>User:</strong> {{ $order->user->name }} ({{ $order->user->email }})
        </div>
        <div class="mb-3">
            <strong>Status:</strong> {{ $order->status }}
        </div>
        <div class="mb-3">
            <strong>Total:</strong> ${{ $order->total }}
        </div>

        <h4 class="mb-3">Order Items:</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price }}</td>
                        <td>${{ $item->price * $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
