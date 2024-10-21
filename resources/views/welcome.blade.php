<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="position-relative d-flex justify-content-center align-items-center bg-light text-dark">
            @if (Route::has('login'))
                <div class="position-absolute top-0 end-0 p-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="fw-semibold text-secondary text-decoration-none me-2">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="fw-semibold text-secondary text-decoration-none me-2">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="fw-semibold text-secondary text-decoration-none me-2">
                                Register
                            </a>
                        @endif
                    @endauth
                    <a href="{{ url('/cart') }}" class="fw-semibold text-secondary text-decoration-none me-2">
                        Cart
                    </a>
                </div>
            @endif
            <h1>Products</h1>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            @php
                $products = App\Models\Product::all();
            @endphp
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text">Price: ${{ $product->price }}</p>
                            {{-- <a href="{{ route('products.show', $product) }}" class="btn btn-primary">View Details</a> --}}
                            <form action="{{ route('cart.store') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Bootstrap JS and Popper.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
