<!-- Begin Quick View | Modal Area -->

<div class="modal-inner-area row">
    <div class="col-lg-5 col-md-6 col-sm-6">
        <!-- Product Details Left -->
        <div class="product-details-left">
            <div class="product-details-images slider-navigation-1">
            @if(count($product->images) > 1)
                @foreach($product->images as $img)
                    <div class="lg-image">
                        <img src="{{ $img->image }}" alt="product image">
                    </div>
                @endforeach
            @elseif (count($product->images) == 1)
                <div class="lg-image">
                    <img src="{{ $product->images->first()->image }}" alt="">
                </div>
            @endif
            </div>
            @if(count($product->images) > 1)
            <div class="product-details-thumbs slider-thumbs-1">
                @foreach($product->images as $thumb)
            <div class="sm-image"><img src="{{ $product->getThumb($thumb->image) }}" alt="{{ $product->name }}" class="img"></div>
                @endforeach
            </div>
            @endif
        </div>
        <!--// Product Details Left -->
    </div>

    <div class="col-lg-7 col-md-6 col-sm-6">
        <div class="product-details-view-content pt-30">
            <div class="product-info">
                <h2>{{ $product->name }}</h2>
                <span class="product-details-ref">Reference: demo_15</span>
                <div class="rating-box pt-20">
                    <ul class="rating rating-with-review-item">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                        <li class="review-item"><a href="#">Read Review</a></li>
                        <li class="review-item"><a href="#">Write Review</a></li>
                    </ul>
                </div>
                <div class="price-box pt-20">
                    <span class="new-price new-price-2">{{ $product->money_format() }} VNĐ</span>
                </div>
                <div class="product-desc">
                    <p>
                        <span>{{ $product->excerpt }}</span>
                    </p>
                </div>
                <div class="single-add-to-cart">
                    <form action="#" class="cart-quantity">
                        <div class="quantity">
                            <label>Quantity</label>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" value="1" type="text">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                        </div>
                        <button class="add-to-cart" data-request="{{$product->id}}">Add to cart</button>
                    </form>
                </div>
                <div class="product-additional-info pt-25">
                    <div class="product-social-sharing pt-25">
                        <ul>
                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                            <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
