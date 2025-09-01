{{-- @extends('layouts.app') 

@section('content')
<div class="container mb-5" style="background-color: #b2f2bb; min-height: 100vh; padding: 40px 20px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm mb-4">
                <div class="card-header d-flex row">
                    <div class="col-md-6">
                        <h5 class="my-2">User Profile</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('user.edit',['user' => $user]) }}" class="btn btn-primary"> <i class="fa-thin fa-user-pen"></i>Edit</a>
                    </div>

                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Phone:</strong> {{ $user->phone }}</p>
                    <p><strong>Address:</strong> {{ $user->address }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container mb-5" style="min-height: 100vh; padding: 40px 20px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-header bg-gray text-black d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">User Profile</h5>
                    <a href="{{ route('user.edit',['user' => $user]) }}" class="btn btn-success  shadow-sm">
                        <i class="fa-thin fa-user-pen"></i> Edit
                    </a>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Name:</strong>
                        <span class="ms-2">{{ $user->name }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong>
                        <span class="ms-2">{{ $user->email }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Phone:</strong>
                        <span class="ms-2">{{ $user->phone }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Address:</strong>
                        <span class="ms-2">{{ $user->address }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
