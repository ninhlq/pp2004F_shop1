@extends('frontpage_master_def')

@section('title', '| Checkout')

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">User Account</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-12 user-account">
                <div class="card info-box">
                    <div class="card-body">
                        <div class="media mb-20 d-flex align-items-center">
                            <div class="w-25 mr-3">
                                <img src="{{ $user->avatar ? $user->avatar : asset('images/team/1.png') }}" alt="" class="img-thumbnail">
                            </div>
                            <div class="media-body">
                                <h6>{{ ucwords($user->getFullName()) }}</h6>
                            </div>
                        </div>
                        <div class="nav flex-column nav-pills row" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link" href="{{ route('account') }}">Profile</a>
                            <a class="nav-link">Orders</a>
                            <a class="nav-link">Billing</a>
                            <a class="nav-link">Bank Account</a>
                            <a class="nav-link">Settings</a>
                            <a class="nav-link" href="{{ route('logout') }}">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-9 col-12">
                <h4 class="bg-warning text-white p-3">Edit Profile</h4>
                <form action="{{ route('account.update', $user->id) }}" method="POST" class="form-vertical pt-40">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row align-items-center">
                        <label for="" class="col-form-label col-4"><strong>First Name</strong></label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-form-label col-4"><strong>Last Name</strong></label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-form-label col-4"><strong>Phone</strong></label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="phone" value="{{ $user->phone ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-form-label col-4"><strong>Primary Address</strong></label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="address1" value="{{ $user->address1 ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-form-label col-4"><strong>Secondary Address</strong></label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="address2" value="{{ $user->address2 ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-form-label col-4"><strong>City</strong></label>
                        <div class="col-8">
                            <input type="text" class="form-control" name="city" value="{{ $user->city ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label for="" class="col-form-label col-4"></label>
                        <button type="submit" class="btn btn-cart ml-15">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--Checkout Area End-->
@endsection
