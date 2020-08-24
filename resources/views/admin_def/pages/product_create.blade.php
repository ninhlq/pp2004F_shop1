@extends('admin_master_def')

@section('title', '| Create New Product')

@section('content')
<form action="{{ route('admin.product.store') }}" method="POST" class="clearfix">
    <div class="col-xs-12">
        <h3>Create New Product</h3>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="box box-warning">
                    <div class="box-header">
                        <span class="lead">Product Primary Info</span>
                    </div>
                    <div class="box-body">
                        <div class="product-create">
                            @csrf
                            @method('POST')
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="" class="control-label">Product Name</label>
                                <input type="text" name="name" class="form-control" 
                                    @if(!empty(old('name'))) value="{{ old('name') }} @endif">
                                @error('name')
                                <div class="help-block">
                                    {{ $errors->first('name') }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group{{ $errors->has('product_code') ? ' has-error' : '' }}">
                                <label for="" class="control-label">Product Code</label>
                                <input type="text" name="product_code" class="form-control" 
                                    @if(!empty(old('product_code'))) value="{{ old('product_code') }} @endif">
                                @error('product_code')
                                <div class="help-block">
                                    {{ $errors->first('product_code') }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group{{ $errors->has('quantity_in_stock') ? ' has-error' : '' }}">
                                <label for="" class="control-label">Quantity in Stock</label>
                                <input type="number" name="quantity_in_stock" class="form-control" 
                                    @if(!empty(old('quantity_in_stock'))) value="{{ old('quantity_in_stock') }} @endif">
                                @error('quantity_in_stock')
                                <div class="help-block">
                                    {{ $errors->first('quantity_in_stock') }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
                                <label for="" class="control-label">Excerpt</label>
                                <textarea name="excerpt" class="form-control" 
                                    rows="3">@if(!empty(old('excerpt'))) {{ old('excerpt') }} @endif</textarea>
                                @error('excerpt')
                                <div class="help-block">
                                    {{ $errors->first('excerpt') }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="" class="control-label">Description</label>
                                <textarea id="prod_description" name="description" class="form-control" 
                                    rows="30">@if(!empty(old('description'))) {{ old('description') }} @endif</textarea>
                                @error('description')
                                <div class="help-block">
                                    {{ $errors->first('description') }}
                                </div>
                                @enderror
                            </div>
                            <div class="row form-group{{ $errors->has('brand_id') ? ' has-error' : '' }}">
                                <label for="" class="control-label col-xs-12 col-md-3">Brand</label>
                                <div class="col-xs-12 col-md-9">
                                    <select name="brand_id" id="" class="form-control">
                                        <option value="">--- Please choose a Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" 
                                                @if(!empty(old('brand_id')) && $brand->id == old('brand_id')) {{ 'selected' }}@endif>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                    <div class="help-block">
                                        {{ $errors->first('brand_id') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('buy_price') ? ' has-error' : '' }}">
                                <label for="" class="control-label col-xs-12 col-md-3">Import Price</label>
                                <div class="col-xs-12 col-md-9">
                                    <div class="input-group">
                                        <input type="number" name="buy_price" class="form-control" min="0"
                                            @if(!empty(old('buy_price'))) value="{{ old('buy_price') }}" @endif>
                                        <div class="input-group-addon"><b>.000</b></div>
                                        <span class="input-group-addon">VNĐ</span>
                                    </div>
                                    @error('buy_price')
                                    <div class="help-block">
                                        {{ $errors->first('buy_price') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('current_price') ? ' has-error' : '' }}">
                                <label for="" class="control-label col-xs-12 col-md-3">Current Price</label>
                                <div class="col-xs-12 col-md-9">
                                    <div class="input-group">
                                        <input type="number" name="current_price" class="form-control" min="0"
                                            @if(!empty(old('current_price'))) value="{{ old('current_price') }}" @endif>
                                        <div class="input-group-addon"><b>.000</b></div>
                                        <span class="input-group-addon">VNĐ</span>
                                    </div>
                                    @error('current_price')
                                    <div class="help-block">
                                        {{ $errors->first('current_price') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                <label class="control-label col-xs-12 col-md-3">Product Images</label>
                                <div class="col-xs-12 col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default text-white">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </div>
                                        <input id="thumbnail" class="form-control" type="text" name="image" readonly
                                            @if(!empty(old('image'))) value="{{ old('image') }}" @endif>
                                    </div>
                                    <div id="holder" style="margin-top:15px; max-height:100px;">
                                        @if(!empty(old('image'))) <img src="{{ old('image') }}" style="height: 6rem"> @endif
                                    </div>
                                    @error('image')
                                    <div class="help-block">
                                        {{ $errors->first('image') }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-xs-12 col-md-9 col-md-offset-3">
                                    <button class="btn btn-lg btn-success"><i class="fa fa-save"></i> Create Product</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="box box-info">
                    <div class="box-header">
                        <span class="lead">Product Specs</span>
                    </div>
                    <div class="box-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('styles')
  <link rel="shortcut icon" type="image/png" href="{{ asset('vendor/laravel-filemanager/img/72px color.png') }}">
@endpush

@push('lib-js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script>
        {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
    </script>
@endpush

@push('js')
     <script>
        var route_prefix = "/filemanager";
        CKEDITOR.replace('prod_description', {
            height: 100,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
@endpush