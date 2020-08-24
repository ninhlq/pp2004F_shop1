@extends('admin_master_def')

@section('title', '| Product Details')

@section('content')
    <div class="col-xs-12">   
        <h3>Product Details</h3>
    </div>
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-body">
                <div class="col-xs-12 col-md-3">
                    @if (count($product->images) > 1)
                        <div class="product-details-images slider-navigation-1 text-center">
                            @foreach($product->images as $img)
                            <div class="lg-image text-center">
                                <img src="{{ $img->image }}" alt="product image" style="width: 100%; max-height: 330px">
                            </div>
                            @endforeach
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">                                        
                            @foreach($product->images as $img)
                            <div class="sm-image">
                                <img src="{{ $product->getThumb() }}" class="img img-thumbnail" style="max-height: 120px">
                            </div>
                            @endforeach
                        </div>
                    @elseif (count($product->images) == 1)
                        <div class="sm-image text-center">
                            <img src="{{ $product->images->first()->image }}" alt="" class="img img-responsive" style="max-height: 330px">    
                        </div>
                    @else
                        <p>Product Image Not Available</p>
                    @endif
                </div>
                <div class="col-xs-12 col-md-9">
                    <h3 class="box-title lead"><b>{{ $product->name }}</b></h3>
                    <div class="product-details">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th colspan="2">Details</th>
                                </tr>
                                <tr>
                                    <th style="width: 30%">Product Code</th>
                                    <td>{{ $product->product_code }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <th>Brand</th>
                                    <td>{{ $product->brand->name }}</td>
                                </tr>
                                <tr>
                                    <th>Import Price</th>
                                    <td>{{ $product->buy_price }}.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <th>Current price</th>
                                    <td>{{ $product->current_price }}.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <th>Sale Off</th>
                                    <td>@isset($product->sale_off) {{ $product->sale_off}} @endisset</td>
                                </tr>
                                <tr>
                                    <th>Sales</th>
                                    <td>63643</td>
                                </tr>
                                <tr>
                                    <th>Sales last month</th>
                                    <td>653</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit Product</a>
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@push('lib-css')
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
@endpush

@push('lib-js')
    <script src="{{ asset('js/slick.min.js') }}"></script>
@endpush

@push('js')
    <script>
        $('.product-details-images').each(function(){
            var $this = $(this);
            var $thumb = $this.siblings('.product-details-thumbs, .tab-style-left');
            $this.slick({
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 5000,
                dots: false,
                infinite: true,
                centerMode: true,
                centerPadding: 0,
                asNavFor: $thumb,
            });
        });
        $('.product-details-thumbs').each(function(){
            var $this = $(this);
            var $details = $this.siblings('.product-details-images');
            $this.slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 5000,
                dots: false,
                infinite: true,
                focusOnSelect: true,
                centerMode: true,
                centerPadding: 0,
                prevArrow: '<span class="slick-prev"><i class="fa fa-angle-left"></i></span>',
                nextArrow: '<span class="slick-next"><i class="fa fa-angle-right"></i></span>',
                asNavFor: $details,
            });
        });
    </script>
@endpush