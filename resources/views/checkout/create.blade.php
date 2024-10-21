<x-app-layout>
    <div class="container mt-4">
        <h2 class="mb-4">Checkout</h2>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
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
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ $item['price'] }}</td>
                            <td>${{ $item['price'] * $item['quantity'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                <h4>Total: ${{ $total }}</h4>
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>
</x-app-layout>
