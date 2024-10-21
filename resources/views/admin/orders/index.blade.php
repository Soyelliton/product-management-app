<x-app-layout>
    <div class="container mt-4">
        <h2 class="mb-4">Order Management</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>${{ $order->total }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to List</a>
        {{ $orders->links() }}
    </div>
</x-app-layout>
