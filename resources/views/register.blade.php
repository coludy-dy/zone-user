{{-- @extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Create a new account</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('create-user') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" rows="3" class="form-control">{{ old('address') }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="text-center mt-4 mb-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm rounded-3">
            <div class="card-header bg-gray text-black text-center">
                <h4 class="mb-0">Create a New Account</h4>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="{{ route('create-user') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <small class="text-danger d-block mb-2">{{ $message }}</small>
                    @enderror

                    <!-- Email -->
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <small class="text-danger d-block mb-2">{{ $message }}</small>
                    @enderror

                    <!-- Password -->
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    @error('password')
                        <small class="text-danger d-block mb-2">{{ $message }}</small>
                    @enderror

                    <!-- Phone -->
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                        <small class="text-danger d-block mb-2">{{ $message }}</small>
                    @enderror

                    <!-- Address -->
                    <div class="mb-4 input-group">
                        <span class="input-group-text"><i class="fas fa-home"></i></span>
                        <textarea name="address" rows="2" class="form-control" placeholder="Address">{{ old('address') }}</textarea>
                    </div>
                    @error('address')
                        <small class="text-danger d-block mb-2">{{ $message }}</small>
                    @enderror

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success px-4">Register</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

