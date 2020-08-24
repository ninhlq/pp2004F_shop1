@extends('admin_master_def')

@section('title', '| Create New Product')

@section('content')
<form action="{{ route('admin.product.update', $product->id) }}" method="POST" class="clearfix">
    @csrf
    @method('PATCH')
    <div class="col-xs-12">
        <h3>Edit Product</h3>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="box box-warning product-create">
                    <div class="box-header"><span class="lead">Product Primary Info</span></div>
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="" class="control-label">Product Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ !empty(old('name')) ? old('name') : $product->name }}">
                            @error('name')
                            <div class="help-block">
                                {{ $errors->first('name') }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group{{ $errors->has('product_code') ? ' has-error' : '' }}">
                            <label for="" class="control-label">Product Code</label>
                            <input type="text" name="product_code" class="form-control" 
                                value="{{ !empty(old('product_code')) ? old('product_code') : $product->product_code }}">
                            @error('product_code')
                            <div class="help-block">
                                {{ $errors->first('product_code') }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group{{ $errors->has('quantity_in_stock') ? ' has-error' : '' }}">
                            <label for="" class="control-label">Quantity in Stock</label>
                            <input type="number" name="quantity_in_stock" class="form-control" 
                                value="{{ !empty(old('quantity_in_stock')) ? old('quantity_in_stock') : $product->quantity_in_stock }}">
                            @error('quantity_in_stock')
                            <div class="help-block">
                                {{ $errors->first('quantity_in_stock') }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
                            <label for="" class="control-label">Excerpt</label>
                            <textarea name="excerpt" class="form-control" 
                                rows="3">{{ !empty(old('excerpt')) ? old('excerpt') : $product->excerpt }}</textarea>
                            @error('excerpt')
                            <div class="help-block">
                                {{ $errors->first('excerpt') }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="" class="control-label">Description</label>
                            <textarea id="prod_description" name="description" class="form-control" 
                                rows="6">{{ !empty(old('description')) ? old('description') : $product->description }}</textarea>
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
                                    <input type="number" name="buy_price" class="form-control" min="0"
                                        value="{{ !empty(old('buy_price')) ? old('buy_price') : $product->buy_price }}">
                                    <span class="input-group-addon"><b>.000</b></span>
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
                                        value="{{ !empty(old('current_price')) ? old('current_price') : $product->current_price }}">
                                    <span class="input-group-addon"><b>.000</b></span>
                                    <span class="input-group-addon">VNĐ</span>
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
                                <table class="table">
                                    @if (count($product->images) > 1)
                                        @foreach ($product->images as $img)
                                            <tr>
                                                <td width="50px">
                                                    <div id="holder_{{ $img->id }}">
                                                        <img src="{{ $product->getThumb($img->image) }}" class="img-thumbnail img-rounded" style="height: 5rem; max-width: none">
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    <div class="input-group">
                                                        <div class="input-group-btn">
                                                            <a id="lfm_{{ $img->id }}" data-input="thumbnail_{{ $img->id }}"
                                                                data-preview="holder_{{ $img->id }}" class="btn-lfm btn btn-default">
                                                                <i class="fa fa-picture-o"></i> Choose
                                                            </a>
                                                        </div>
                                                        <input id="thumbnail_{{ $img->id }}" class="form-control" type="text" name="image[{{$img->id}}]" readonly
                                                            value="{{ !empty(old("image[$img->id]")) ? old("image[$img->id]") : $img->image }}">
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
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
                                <button class="btn btn-lg btn-primary"><i class="fa fa-save"></i> Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div class="box box-info">
                    <div class="box-header"><span class="lead">Product Specs</span></div>
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
        $('.btn-lfm').each(function(){
            $(this).filemanager('image', {prefix: route_prefix});
        });
    </script>
@endpush