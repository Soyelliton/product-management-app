<x-app-layout>
    <div class="container mt-4">
        <h2 class="mb-4">Product List</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-success mb-3">Order Management</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                class="btn btn-warning btn-sm d-inline">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
