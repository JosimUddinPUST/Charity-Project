@extends('front.layouts.app')

@section('main_content')
<div class="page-top" style="background-image: url({{ asset('uploads/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Reset Password</h2>
                <div class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Reset Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content pt_70 pb_70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    
                <div class="login-form">
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="text" name="email" :value="old('email')" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="password"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">
                                Submit
                            </button>
                            <a href="{{ route('login') }}" class="primary-color">Back to Login Page</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection