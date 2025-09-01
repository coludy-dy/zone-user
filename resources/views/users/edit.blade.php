@extends('layouts.app')

@section('content')
<div class="container mb-5" style="min-height: 100vh; padding: 40px 20px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <form action="{{route('user.update',['user' => $user])}}" method="POST">
                    @csrf
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">User Profile</h5>
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fas fa-user-edit me-1"></i> Update
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Name:</strong></label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Email:</strong></label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Phone:</strong></label>
                            <div class="col-sm-9">
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"><strong>Address:</strong></label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="address" rows="3">{{ $user->address }}</textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
