@extends('layouts.app')

@section('content')
<div class="container mb-5" style=" min-height: 100vh; padding: 40px 20px;">
    <h5 style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">
        <i class="fa fa-shopping-cart"></i> Your Purchase History
    </h5>
    {{-- Search Section --}}
   <div class="card shadow-sm mb-4">
        <div class="card-header bg-gray text-black fw-bold">
            Search Date
        </div>
        <div class="card-body">
            <form action="{{ route('my-order') }}" method="GET">
                @csrf
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <label for="name" class="form-label">Purchase Date</label>
                        <input type="date" class="form-control" name="created_at" id="created_at" value="{{ request('created_at') ?? '' }}">
                    </div>
                    <div class="col-md-4 mt-2 mt-md-0">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="fa-solid fa-magnifying-glass me-1"></i> Search
                        </button>
                        <a href="{{ route('my-order') }}" class="btn btn-warning text-black">
                            <i class="fa-solid fa-rotate-left"></i> Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

{{-- filter section end --}}

    <div class="row justify-content-center">
        @foreach ($orders as $order)
            <div class="col-md-12">

                <div class="card p-3 mb-3">
                    <div class="card-header d-flex row">
                        <div class="col-md-6"><h5>Order #{{ $order->id }} &Tab;
                            @if (empty($order->complete_date))
                                <span class="text-warning">(Processing...)</span>
                            @else
                                <span class="text-success">(Completed)</span>
                            @endif</h5></div>
                        <div class="col-md-6 text-end"><p><strong>Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p></div>
                    </div>    
                    @foreach ($order->orderItems as $item)
                        <div class="d-flex justify-content-between mt-2">
                            <p><strong>Product Name:</strong> {{ $item->product->name }}</p>
                            <p><strong>Price:</strong> {{ number_format($item->product->price) }} MMK</p>
                            <p class="me-4"><strong>Quantity:</strong> {{ $item->quantity }}</p>
                        </div>
                    @endforeach
                    <hr>
                    <div class="text-end me-4">
                        <p><strong>Total:</strong> {{ number_format($order->total_amount) }} MMK</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div>
        {{$orders->links()}}
    </div>
</div>
@endsection
