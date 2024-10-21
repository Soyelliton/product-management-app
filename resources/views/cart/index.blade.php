<x-app-layout>
    <div class="container mt-4">
        <h2 class="mb-4">Your Cart</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(count($cart) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $id => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="form-control w-25 d-inline">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                            <td>${{ $item['price'] }}</td>
                            <td>${{ $item['price'] * $item['quantity'] }}</td>
                            <td>
                                <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                <h4>Total: ${{ $total }}</h4>
            </div>
            <a href="{{ route('checkout.create') }}" class="btn btn-primary">Checkout</a>
            <a href="{{ route('welcome') }}" class="btn btn-success">Back to List</a>
        @else
            <div class="alert alert-info">Your cart is empty.</div>
            <a href="{{ route('welcome') }}" class="btn btn-success">Back to List</a>
        @endif
    </div>
</x-app-layout>
