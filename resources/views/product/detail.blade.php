@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card p-4 shadow mb-4" style="background-color: #d4fcd4;">
        <div class="row">
            <div class="col-md-6 text-center">
                <img id="mainImage" src="{{ asset('storage/' . $product->img_path) }}" class="img-fluid mb-3" alt="iPhone 16" style="max-height: 400px;">

                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    @foreach ($product->photos as $photo )
                            <img src="{{ asset('storage/' . $photo->path) }}" 
                             class="img-thumbnail" 
                             onclick="document.getElementById('mainImage').src = this.src" 
                             style="width: 50px; height: 50px; cursor: pointer;">
                    @endforeach
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <h3>{{ $product->name }}</h3>
                <h4 class="text-success mb-3">{{ $product->price }} MMK</h4>
                <p>{{ $product->description }}</p>

                @if ($product->status == 'available')
                    <p class="badge" style="background-color: green">
                        <i class="fa-solid fa-check"></i> Available
                    </p>
                @else
                    <p class="badge" style="background-color: red">
                        <i class="fa-solid fa-xmark"></i> Out of Stock
                    </p>
                @endif

                <table class="table table-bordered">
                    <tr><th>Camera</th><td>{{ $product->camera }}</td></tr>
                    <tr><th>Display Size</th><td>{{ $product->screen_size }}</td></tr>
                    <tr><th>Battery</th><td>{{ $product->battery }}</td></tr>
                    <tr><th>Memory</th><td>{{ $product->ram }}</td></tr>
                    <tr><th>Storage</th><td>{{ $product->storage }}</td></tr>
                    <tr><th>Color</th><td>{{ $product->color }}</td></tr>
                </table>    

                <form action="{{ route('cart.store', ['product' => $product]) }}" method="POST">
                    @csrf
                    <h6 class="mt-3">Number</h6>
                    <div class="input-group mb-3" style="width: 150px;">
                        <button class="btn btn-outline-danger" type="button" onclick="changeQuantity(-1)">-</button>
                        <input type="text" class="form-control text-center" id="quantity" value="1" readonly>
                        <button class="btn btn-outline-success" type="button" onclick="changeQuantity(1)">+</button>
                    </div>

                    <input type="hidden" name="quantity" id="hidden-quantity" value="1">
                    <input type="hidden" name="product_id" value="{{$product->id}}">

                    <div class="d-flex gap-2">
                        <!-- Add to Cart button -->
                        <button type="submit" class="btn btn-success btn-sm" {{ $product->status != 'available' ? 'disabled' : '' }}>
                            <i class="fa-solid fa-cart-shopping"></i>
                            Add To Cart
                        </button>

                        <!-- Back button -->
                        <a href="{{ route('product.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fa-solid fa-arrow-left"></i>
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

    function changeQuantity(amount) {
        const maxCount = @json($product->stock);
        if(document.getElementById('hidden-quantity').value == maxCount )
        {
            alert("Maxmium Reach, Out of Stocks");
            
        }else{
            let qtyInput = document.getElementById('quantity');
            let hiddenQty = document.getElementById('hidden-quantity');
            let current = parseInt(qtyInput.value);

            let newQty = current + amount;
            if (newQty < 1) return; // prevent quantity < 1

            qtyInput.value = newQty;
            hiddenQty.value = newQty;
        }

    }
</script>
@endpush
