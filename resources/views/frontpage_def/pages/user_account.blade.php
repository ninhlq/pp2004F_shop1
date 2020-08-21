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
                <h4 class="bg-warning text-white p-3">Profile</h4>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row" class="w-25">First Name</th>
                            <td>{{ ucwords($user->first_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Last Name</th>
                            <td>{{ ucwords($user->last_name) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td>{{ $user->phone ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Primary Address</th>
                            <td>{{ $user->address1 ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Secondary Address</th>
                            <td>{{ $user->address2 ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">City</th>
                            <td>{{ $user->city ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Activated at</th>
                            <td>{{ $user->email_verified_at ?? '' }}</td>
                        </tr>
                        <tr>
                            <th scope="row"><a href="{{ route('account.edit', $user->id) }}" class="btn btn-warning text-white">Edit Profile</a></th>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Checkout Area End-->
@endsection
