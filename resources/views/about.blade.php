@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="text-center mb-5">
            <h2 class="fw-bold">About Us</h2>
             <p>Discover the Mobile Phones and facilities from our Mobile Zone.</p>
        </div>

        <div class="row align-items-center mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
                <img src="{{ asset('pj-img/about.png') }}" class="img-fluid rounded shadow" alt="Mobile Shop">
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold">Who We Are</h4>
                <p>
                    At <strong>MobileZone</strong>, we are passionate about technology and customer satisfaction.
                    Since our founding in 2025, we’ve become one of the leading mobile phone retailers in the region, providing customers with the newest smartphones, and accessories at unbeatable prices.
                </p>
                <p>
                    We offer a wide selection of brands including Apple, Samsung, Xiaomi, Huawei, Oppo, and more. Whether you're looking for the latest iPhone, a budget-friendly Android, or essential mobile accessories — we’ve got you covered.
                </p>
            </div>
        </div>

                <div class="row text-center mb-5 g-4 justify-content-center">
            <div class="col-md-4 col-lg-3">
                <div class="card shadow rounded text-black bg-white p-3 h-auto">
                    <h5 class="fw-bold mb-2">Trusted Brands</h5>
                    <p class="small">We only offer authentic and top-quality products from the most trusted mobile brands in the market.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card shadow rounded text-black bg-white p-3 h-auto">
                    <h5 class="fw-bold mb-2">Affordable Prices</h5>
                    <p class="small">Competitive pricing and regular promotions make sure you always get the best value.</p>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="card shadow rounded text-black bg-white p-3 h-auto">
                    <h5 class="fw-bold mb-2">Customer Support</h5>
                    <p class="small">We pride ourselves on after-sales service, warranties, and friendly customer support both in-store and online.</p>
                </div>
            </div>
        </div>

        <div class="text-center">
            <h5>Visit Us Today!</h5>
            <p>Drop by our store or shop online and experience the difference. Your next device is just a click away.</p>
            <a href="{{ route('product') }}" class="btn btn-primary">Browse Products</a>
        </div>
    </div>
    @include('common')
@endsection