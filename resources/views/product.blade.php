@extends('layouts.app')

@section('content')
<div class="text-center mt-4 mb-4">
    <h2 class="fw-bold">Our Product</h2>
</div>
    {{-- Product Search Section --}}
<form action="{{ route('product.index') }}" method="GET" class="mb-4">
    @csrf
    <div class="row g-3 align-items-end">
        <!-- Brand -->
        <div class="col-md-4">
            <label for="brand_id" class="form-label fw-bold">All Brand</label>
            <select name="brand_id" id="brand_id" class="form-control select2 w-100">
                <option value="">All Brands</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Price -->
        <div class="col-md-4">
            <label for="price" class="form-label fw-bold">Price</label>
            <input type="number" class="form-control w-100" name="price" id="price" value="{{ request('price') ?? '' }}">
        </div>

        <!-- Buttons -->
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary px-4">
                <i class="fa-solid fa-magnifying-glass"></i> Search
            </button>
            <a href="{{ route('product.index') }}" class="btn btn-warning px-4">
                <i class="fa-solid fa-rotate-left"></i> Clear
            </a>
        </div>
    </div>
</form>


    <!-- Products Grid -->
    @if ($products->count() == 0)
        <p class="text-center">No products found.</p>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 d-flex mb-4">
                    <div class="card w-100 h-100">
                        
                        <img src="{{ asset('storage/' . $product->img_path) }}" 
                            class="card-img-top" 
                            alt="{{ $product->name }}"
                            style="height: 300px; object-fit: cover;">

                        
                        <div class="card-body d-flex flex-column text-center">
                            <a href="{{route('product.detail',$product)}}" style="text-decoration: none"><h5 class="card-title product-name">{{ $product->name }}</h5></a>

                            <p class="card-text text-danger">{{ number_format($product->price) }} MMK</p>
                            <form action="{{ route('cart.store', ['product' => $product]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" id="hidden-quantity" value="1">
                            <input type="hidden" name="product_id" value="{{$product->id}}">

                            <button type="submit" class="btn btn-success btn-sm" {{ $product->status != 'available' ? 'disabled' : '' }}>
                                <i class="fa-solid fa-cart-shopping"></i>
                                Add To Cart
                            </button>

                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{$products->links()}}
        </div>
    @endif
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

