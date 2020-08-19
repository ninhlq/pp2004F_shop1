<div class="single-product-wrap">
    <div class="product-image">
        <a href="{{ route('product.details', $product->id) }}">
            <img src="{{ $product->getThumb($product->images[0]->image) }}" alt="Li's Product Image">
        </a>
        <span class="sticker sticker-hot">Hot</span>
    </div>
    <div class="product_desc">
        <div class="product_desc_info">
            <div class="product-review">
                <h5 class="manufacturer">
                    <a href="{{ url('brand/' . $product->brand->id) }}">{{ $product->brand->name }}</a>
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
            <h4><a class="product_name" href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a></h4>
            <div class="price-box">
                <span class="new-price">{{ $product->money_format() }} VNĐ</span>
            </div>
        </div>
        <div class="add-actions">
            <ul class="add-actions-link">
                <li class="add-cart active"><a data-request="{{ $product->id }}">Add to cart</a></li>
                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal"
                        data-target="#productPreview" data-request="{{$product->id}}"><i class="fa fa-eye"></i></a></li>
            </ul>
        </div>
    </div>
</div>