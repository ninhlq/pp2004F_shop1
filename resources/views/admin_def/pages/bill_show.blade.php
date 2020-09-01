@extends('admin_master_def')

@section('title', '| Bill Details')

@section('content')
<div class="col-xs-12">
<h3>Bill Details</h3>
</div>
<div class="col-xs-12 col-md-6">
    <div class="ro">
        <div class="box box-warning box-order-details">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="width: 30%">Customer</th>
                            <td>{{ $order->customer->getFullName() }}</td>
                        </tr>
                        <tr>
                            <th>Products</th>
                            <td>
                                <ul class="list-unstyled">
                                @foreach($order->orderedProducts as $product)
                                    <li>
                                        <a href="{{ route('admin.product.show', $product->id) }}">
                                            <img src="{{ $product->images->first()->image }}" alt="" style="width: 80px; max-height: 100px; margin-right: 10px">
                                            {{ $product->name }} - {{ vnd_format($product->pivot->price, 1, 1100) }} VNĐ
                                            <b>({!! '&times;' !!} {{ $product->pivot->quantity_ordered }})</b>
                                        </a>
                                    </li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Check Number</th>
                            <td>{{ $bill->check_number }}</td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td>{{ $bill->payment_date }}</td>
                        </tr>
                        <tr>
                            <th>Subtotal</th>
                            <td>{{ vnd_format($bill->amount / 1.1) }} VNĐ</td>
                        </tr>
                        <tr>
                            <th>Total Amount (VAT required)</th>
                            <td><h4>{{ vnd_format($bill->amount) }} VNĐ</h4></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection