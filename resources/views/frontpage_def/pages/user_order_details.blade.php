@extends('frontpage_master_def')

@section('title', '| Order Details')

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Orders</li>
                <li class="active">Order Details</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            @include('frontpage_def.layouts.user_sidenav')
            <div class="col-lg-8 col-md-9 col-12 user-account-right">
                <span class="page-title bg-warning text-white">Order Details</span>
                <table class="table table-borderless table-user-order">
                    <tbody>
                        @if (!empty($order))
                            <tr>
                                <th scope="row" class="w-25">Products</th>
                                <td>
                                    <ul>
                                    @foreach ($order->orderedProducts as $product)
                                        <li>
                                            <span class="product-thumb d-inline-block mr-10">
                                                <a href="{{ route('product.details', $product->id) }}" target="_blank">
                                                    <img src="{{ $product->getThumb() }}" alt="" class="img img-thumbnail">
                                                </a>
                                            </span>
                                            <a href="{{ route('product.details', $product->id) }}" target="_blank"><strong>{{ $product->name }}</strong></a>
                                                --> {{ $product->money_format(1, $product->pivot->price, 1100) }} VNĐ &times; {{ $product->pivot->quantity_ordered }}
                                        </li>
                                    @endforeach
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td>{{ $order->textStatus() }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Created at</th>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Updated at</th>
                                <td>{{ $order->log->count() ? $order->log->last()->updated_at : '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Notes</th>
                                <td>{{ $order->comment ?? '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Shipping Address</th>
                                <td>{{ $order->ship_to_address ?? '' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Subtotal</th>
                                <td>{{ number_format($order->getAmount()*1000, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            <tr>
                                <th scope="row">Total (VAT required)</th>
                                <td>{{ number_format($order->getAmount()*1100, 0, ',', '.') }} VNĐ</td>
                            </tr>
                            <tr>
                                <th colspan=2>
                                    <a href="javascript: history.back()" class="btn-cart">&times; Cancel</a>
                                </th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Checkout Area End-->
@endsection
