@extends('frontpage_master_def')

@section('title', '| Login')

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Register</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Login Content Area -->
<div class="page-section mb-60">
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xs-12 mb-30 mt-30">
                <form action="{{ route('register.submit') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="login-form">
                        <h4 class="login-title">Register</h4>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <label>First Name</label>
                                <input class="mb-0 form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" 
                                    type="text" name="first_name" placeholder="First Name">
                                @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <label>Last Name</label>
                                <input class="mb-0 form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                    type="text" name="last_name" placeholder="Last Name">
                                @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Email Address*</label>
                                <input class="mb-0 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    type="email" name="email" placeholder="Email Address">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Password*</label>
                                <input class="mb-0 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    type="password" name="password" placeholder="Password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Confirm Password*</label>
                                <input class="mb-0 form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                    type="password" name="password_confirmation" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Phone</label>
                                <input class="mb-0" type="text" name="phone" placeholder="Phone Number">
                            </div>
                            <div class="col-md-12 mb-20">
                                <label>Address</label>
                                <input class="mb-0" type="text" name="address"" placeholder="Your Address">
                            </div>
                            <div class="col-12">
                                <button class="register-button mt-0" type="submit">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
