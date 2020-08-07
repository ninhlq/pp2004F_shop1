@extends('admin_master_def')

@section('title', '| Create New Product')

@section('content')
<div class="col-md-6">
    <h3>Edit Product</h3>
    <div class="product-create">
        <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="" class="control-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}"
                    @if(!empty(old('name'))) value="{{ old('name') }} @endif">
                @error('name')
                <div class="help-block">
                    {{ $errors->first('name') }}
                </div>
                @enderror
            </div>
            <div class="form-group{{ $errors->has('product_code') ? ' has-error' : '' }}">
                <label for="" class="control-label">Product Code</label>
                <input type="text" name="product_code" class="form-control" value="{{ $product->product_code }}"
                    @if(!empty(old('product_code'))) value="{{ old('product_code') }} @endif">
                @error('product_code')
                <div class="help-block">
                    {{ $errors->first('product_code') }}
                </div>
                @enderror
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="" class="control-label">Description</label>
                <textarea name="description" class="form-control" rows="3"
                    @if(!empty(old('description'))) onload="this.value={{ old('description') }}" @endif>{{ $product->description }}</textarea>
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
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}"
                                @if($brand->id == $product->brand_id) {{ 'selected' }} @endif>{{ $brand->name }}</option>
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
                        <span class="input-group-addon">VNĐ</span>
                        <input type="number" name="buy_price" class="form-control" min="0" value="{{ $product->buy_price }}"
                            @if(!empty(old('buy_price'))) value="{{ old('buy_price') }}" @endif>
                        <span class="input-group-addon"><b>,000</b></span>
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
                        <span class="input-group-addon">VNĐ</span>
                        <input type="number" name="current_price" class="form-control" min="0" value="{{ $product->current_price }}"
                            @if(!empty(old('current_price'))) value="{{ old('current_price') }}" @endif>
                        <span class="input-group-addon"><b>,000</b></span>
                    </div>
                    @error('current_price')
                    <div class="help-block">
                        {{ $errors->first('current_price') }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row form-group{{ $errors->has('thumbs') ? ' has-error' : '' }}">
                <label class="control-label col-xs-12 col-md-3">Product Images</label>
                <div class="col-xs-12 col-md-9">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-white">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </div>
                        <input id="thumbnail" class="form-control" type="text" name="thumbs" readonly
                            value="{{ $product->allThumbs($product->images) }}"
                            @if(!empty(old('thumbs'))) value="{{ old('thumbs') }}" @endif>
                    </div>
                    <div id="holder" style="margin-top:15px; max-height:100px;">
                        @if (count($product->images)) 
                            @foreach($product->allThumbs($product->images, false) as $thumb)
                                <img src="{{ $thumb }}" style="height: 6rem">
                            @endforeach
                        @endif
                        @if(!empty(old('thumbs'))) <img src="{{ old('thumbs') }}" style="height: 6rem"> @endif
                    </div>
                    @error('thumbs')
                    <div class="help-block">
                        {{ $errors->first('thumbs') }}
                    </div>
                    @enderror
                </div>
            </div>
            @if (!Request::is('admin/product/create'))
            <div class="row form-group{{ $errors->has('sale_off') ? ' has-error' : '' }}">
                <label for="" class="control-label col-xs-12 col-md-3">Sale Off</label>
                <div class="col-xs-12 col-md-9">
                    <div class="input-group">
                        <span class="input-group-addon"><b>%</b></span>
                        <input type="number" name="sale_off" class="form-control" min="0" max="100">
                    </div>
                    @error('sale_off')
                    <div class="help-block">
                        {{ $errors->first('sale_off') }}
                    </div>
                    @enderror
                </div>
            </div>
            @endif
            <div class="row form-group">
                <div class="col-xs-12 col-md-9 col-md-offset-3">
                    <button class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
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
        /* CKEDITOR.replace('content',{
            height: 100,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        }); */
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
@endpush