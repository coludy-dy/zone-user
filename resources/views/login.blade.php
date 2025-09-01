@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:50px;margin-bottom: 70px">
    <div class="d-flex justify-content-center">
        <div class="card col-md-6">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first('login_name') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3 row align-items-center">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row align-items-center">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-2">
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
