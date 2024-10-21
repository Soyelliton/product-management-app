<x-app-layout>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bold text-dark">
                    {{ __('Dashboard') }}
                </h2>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p class="text-dark">
                            {{ __("You're logged in!") }}
                        </p>
                        @if (auth()->check() && auth()->user()->role === 'admin')
                            <a href="{{ url('/products') }}" class="btn btn-success">
                                Product Management
                            </a>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-success">Order Management</a>
                        @else
                        <a href="{{ route('welcome') }}" class="btn btn-success">Products</a>
                        <a href="{{ url('/cart') }}" class="btn btn-success">Cart</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
