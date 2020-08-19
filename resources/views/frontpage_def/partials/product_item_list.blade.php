<div class="col-lg-3 col-md-5 pl-0">
    <div class="product-image">
        <a href="{{ url('product/' . $product->id) }}">
            <img src="{{ $product->getThumb($product->images[0]->image) }}" alt="{{ $product->name }}"">
        </a>
        <span class="sticker">New</span>
    </div>
</div>
<div class="col-lg-5 col-md-7">
    <div class="product_desc">
        <div class="product_desc_info">
            <div class="product-review">
                <h5 class="manufacturer">
                    <a href="#">{{ $product->brand->name }}</a>
                </h5>
                <div class="rating-box">
                    <ul class="rating">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                    </ul>
                </div>
            </div>
            <h4><a class="product_name" href="{{ url('product/' . $product->id) }}">{{ $product->name }}</a></h4>
            <div class="price-box">
                <span class="new-price">{{ $product->money_format() }} VNĐ</span>
            </div>
            <p>{{ $product->description }}</p>
        </div>
    </div>
</div>
<div class="col-lg-4 pr-0">
    <div class="shop-add-action mb-xs-30">
        <ul class="add-actions-link">
            <li class="add-cart"><a data-request="{{ $product->id }}">Add to cart</a></li>
            <li><a class="quick-view" data-toggle="modal" 
                data-target="#productPreview" data-request="{{ $product->id }}"><i class="fa fa-eye"></i>Quick view</a></li>
        </ul>
    </div>
</div>