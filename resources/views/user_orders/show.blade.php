<x-app-layout>
    <div class="container mt-4">
        <h2 class="mb-4">Order #{{ $order->id }} Details</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ $item->price }}</td>
                        <td>${{ $item->price * $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            <h4>Total: ${{ $order->total }}</h4>
        </div>
    </div>
</x-app-layout>
