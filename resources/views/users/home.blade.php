@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="text-center">
        <h1>Welcome to Mobile Zone</h1>
        <p>Your one-stop shop for the latest smartphones.</p>
        <a href="{{ route('product') }}" class="btn btn-primary mt-3">Browse Products</a>
    </div>
@endsection
