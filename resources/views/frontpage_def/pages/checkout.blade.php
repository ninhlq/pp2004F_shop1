@extends('frontpage_master_def')

@section('title', '| Checkout')

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        @if (!\Auth::check())
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">
                    <h3>Returning customer? <a href="{{ url('login') }}">Click here to login</span>
                    <div class="checkout-form-list create-acc mt-20">
                        <a href="">Create an account?</a>
                    </div>
                    </h3>
                </div>
            </div>
        </div>
        @endif
        <form action="{{ route('user.order.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="checkbox-form">
                        @if (\Auth::check())
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input placeholder="" type="text" value="{{ \Auth::user()->last_name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input placeholder="" type="text" value="{{ \Auth::user()->first_name }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input placeholder="Street address" type="text" {{ \Auth::user()->address ?? '' }}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input placeholder="" type="email" value="{{ \Auth::user()->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" name="phone" value="{{ \Auth::user()->phone ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="cbox-info" class="checkout-form-list create-account">
                                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                    <label>Account password <span class="required">*</span></label>
                                    <input placeholder="password" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="different-address">
                            <div class="ship-different-title">
                                <h3>
                                    <input id="ship-box" type="checkbox">
                                    <label for="ship-box">Ship to a different address?</label>
                                </h3>
                            </div>
                            <div id="ship-box-info" class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Ship to Address <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text" name="ship_to_address">
                                    </div>
                                </div>
                            </div>
                            <div class="order-notes">
                                <div class="checkout-form-list">
                                    <label>Order Notes</label>
                                    <textarea id="checkout-mess" name="comment" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                            <input type="submit" id="order_submit" value="Order" style="display: none">
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if (!empty($products))
                                @foreach($products as $product)
                                    @php
                                        $quantity = (!empty($product->quantity)) ? $product->quantity : 1;
                                    @endphp
                                    <tr class="cart_item">
                                        <td class="cart-product-name">{{ $product->name }}
                                            <strong class="product-quantity">{!! '&times;' !!} {{ $quantity }}</strong>
                                        </td>
                                        <td class="cart-product-total">
                                            <span class="amount">{{ $product->money_format($quantity) }} VNĐ</span>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="cart[]" value="{{ $product->id }}" required>
                                    <input type="hidden" name="{{$product->id}}" value="{{ $quantity }}" required>
                                @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">{{ $product->money_format(1, $total) }} VNĐ</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount">{{ $product->money_format(1, $total, 1100) }} VNĐ</span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="order-button-payment">
                                <label class="btn-cart" type="submit" for="order_submit">Order</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Checkout Area End-->
@endsection
