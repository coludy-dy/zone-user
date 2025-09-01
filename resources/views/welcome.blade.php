@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <!-- Text Section -->
            <div class="col-md-6">
                <h2 class="fw-bold">The Best Mobiles Phone</h2>
                <h5 class="fw-bold">Why Choose Mobile Zone</h5>
                <p>
                    At <strong>MobileZone</strong>, we bring you the latest smartphones at unbeatable prices.
                    Whether you're looking for performance, style, battery life, or the best camera — we've got it all.
                </p>
                <a href="{{ route('product') }}" class="btn btn-primary mt-3">Shop Now</a>
            </div>

            <!-- Image Section -->
            <div class="col-md-6 text-center">
                <img src="{{ asset('pj-img/main.png') }}" alt="Mobile Products" class="img-fluid">
            </div>
        </div>
    </div>

<!-- Best Sellers Section -->
    <div class="container">
        <!-- Section Title -->
        <div class="text-center mb-5">
            <h3 class="fw-bold">
                <i class="bi bi-star-fill text-dark me-2"></i>Best Sellers
            </h3>
        </div>
        <!-- Product Cards -->
        <div class="row g-4">
            @foreach ($best_sellers as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('storage/' . $product->img_path) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="text-danger">{{ number_format($product->price) }} MMK</p>

                            <form action="{{ route('cart.store', ['product' => $product]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="quantity" id="hidden-quantity" value="1">
                                <input type="hidden" name="product_id" value="{{$product->id}}">

                                <button type="submit" 
                                    class="btn btn-success" 
                                    {{ $product->status != 'available' ? 'disabled' : '' }}>
                                    Add To Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@include('common')

@endsection

@push('scripts')
<script>
function changeQuantity(amount) {
    let qtyInput = document.getElementById('quantity');
    let hiddenQty = document.getElementById('hidden-quantity');
    let current = parseInt(qtyInput.value);

    let newQty = current + amount;
    if (newQty < 1) return; // prevent quantity < 1

    qtyInput.value = newQty;
    hiddenQty.value = newQty; // update form value
}
</script>
@endpush