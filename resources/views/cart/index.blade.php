@extends('layouts.app')

@section('content')
<div style=" min-height: 100vh; padding: 40px 20px;">
    <h2 style="font-size: 28px; font-weight: bold; margin-bottom: 30px;">
        <i class="fa fa-shopping-cart"></i> Your Cart
    </h2>
    
    @if($carts->count())
        @foreach($carts as $cart)
        <div style="
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        ">
            <div style="display: flex; gap: 20px;">
                <div>
                    <img src="{{ asset('storage/' . $cart->product->img_path) }}" alt="{{ $cart->product->name }}" style="width: 90px; height: 90px; object-fit: cover; border-radius: 8px;">
                </div>

                <div style="flex: 1;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h4 style="margin: 0;">{{ $cart->product->name }}</h4>
                            <small>{{ $cart->product->storage }} / {{ $cart->product->color }}</small>
                        </div>
                        <div style="font-weight: bold; color: green;">
                            {{ number_format($cart->product->price * $cart->quantity) }} MMK
                        </div>
                    </div>

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <form method="POST" 
                            action="{{ route('cart.decrease', ['cart' => $cart]) }}"
                            >
                                @csrf
                                <button type="submit" style="width: 35px; height: 35px; background-color: red; color: white; border: none; border-radius: 4px;"><strong>-</strong></button>
                            </form>

                            <span style="font-weight: bold;">{{ $cart->quantity }}</span>

                            <form method="POST" 
                            action="{{ route('cart.increase', $cart) }}"
                            >
                                @csrf
                                <button type="submit" style="width: 35px; height: 35px; background-color: darkgreen; color: white; border: none; border-radius: 4px;"><strong>+</strong></button>
                            </form>
                        </div>

                        <form method="POST" 
                        action="{{ route('cart.remove', $cart) }}"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none;">
                                <i class="fa fa-trash" style="color: red; font-size: 18px;"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


        {{-- Total Price --}}
        <form action="{{ route('cart.confirm') }}" method="POST">
            @csrf
            <div style="
                background: white;
                border-radius: 10px;
                text-align: center;
                padding: 30px;
                margin-top: 40px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.05);
                max-width: 400px;
                margin-left: auto;
                margin-right: auto;
            ">
                <h4>Total: <span style="color: green; font-weight: bold;">{{ number_format($total_amount) }} MMK</span></h4>
                <button type="submit" style="
                    background-color: darkgreen;
                    color: white;
                    padding: 12px 25px;
                    margin-top: 20px;
                    display: inline-block;
                    text-decoration: none;
                    font-weight: bold;
                    border-radius: 5px;
                ">
                    Proceed to Checkout
                </button>
            </div>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif

</div>
@endsection

{{-- @push('scripts')
<script>

    function changeQuantity(amount) {
        const maxCount = @json($cart->product->stock);
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
@endpush --}}
