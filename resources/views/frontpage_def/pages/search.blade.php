@extends('frontpage_master_def')

@section('title', '| Search')

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">Search</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="{{ asset('images/bg-banner/2.jpg') }}" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    @if (!empty($products))
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                        </div>
                        <div class="toolbar-amount">
                            <span>Showing {{ $fromResult }} to {{ $toResult}} of {{ $total }} results</span>
                        </div>
                    </div>
                    <div class="product-select-box">
                        <div class="product-short">
                            <p>Sort By:</p>
                            <select class="nice-select">
                                <option value="trending">Relevance</option>
                                <option value="sales">Name (A - Z)</option>
                                <option value="sales">Name (Z - A)</option>
                                <option value="rating">Price (Low &gt; High)</option>
                                <option value="date">Rating (Lowest)</option>
                                <option value="price-asc">Model (A - Z)</option>
                                <option value="price-asc">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    @if (!empty($products))
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row product-list">
                                    @foreach ($products as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mt-40">
                                        @include('frontpage_def.partials.product_item')
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="list-view" class="tab-pane product-list-view fade pt-40" role="tabpanel">
                            <div class="row product-layout-list mt-20">
                                @foreach ($products as $product)
                                    @include('frontpage_def.partials.product_item_list')
                                @endforeach
                            </div>
                        </div>
                        <div class="paginatoin-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p>Showing {{ $fromResult }} to {{ $toResult}} of {{ $total }} results</p>
                                </div>
                                <div class="col-lg-6 col-md-6 d-flex flex-row-reverse">
                                    {!! $products->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- shop-products-wrapper end -->
            </div>
        </div>
    </div>
</div>
@include('frontpage_def.layouts.modal')
@endsection
