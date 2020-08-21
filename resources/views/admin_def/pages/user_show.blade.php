@extends('admin_master_def')

@section('title', '| Customer Details')

@section('content')
    <div class="col-xs-12">   
        <h3>Customer Details</h3>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="box box-warning">
            <div class="box-body">
                <h3 class="box-title lead"><b></b></h3>
                <div class="product-details">
                    <div class="table-responsive">
                        <p class="lead">{{ $user->getFullName() }}</p>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" width="30%">First Name</th>
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
                                    <th scope="row"></th>
                                    <td><a href="{{ route('user.account.edit', $user->id) }}" class="btn btn-warning">Edit Profile</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><span class="lead">Orders</span></a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><span class="lead">Bills</span></a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false"><span class="lead">Comments</span></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <table class="table table-borderless">
                        <tbody>
                            @if (!empty($orders))
                                <tr>
                                    <th class="w-25">Status</th>
                                    <th class="w-25">Amount</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->textStatus() }}</td>
                                        <td>{{ number_format($order->getAmount()*1100, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td class="text-right"><a href="{{ route('admin.order.show', $order->id) }}" class="btn-sm">View details</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="tab_2">
                    <table class="table table-borderless">
                        <tbody>
                            @if (!empty($bills))
                                <tr>
                                    <th class="w-25">Status</th>
                                    <th class="w-25">Amount</th>
                                    <th>Created At</th>
                                    <th></th>
                                </tr>
                                @foreach ($bills as $bill)
                                    <tr>
                                        <td>{{ $bill->textStatus() }}</td>
                                        <td>{{ number_format($bill->getAmount()*1100, 0, ',', '.') }} VNĐ</td>
                                        <td>{{ $bill->created_at }}</td>
                                        <td class="text-right"><a href="{{ route('admin.bill.show', $bill->bill->id) }}" class="btn-sm">View details</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane" id="tab_3">
                    Comments
                </div>
            </div>
        </div>
    </div>
@endsection
