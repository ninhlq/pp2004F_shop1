@extends('frontpage_master_def')

@section('title', '| No Result')

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li class="active">No Result</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Error 404 Area Start -->
<div class="error404-area pt-30 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="error-wrapper text-center ptb-50 pt-xs-20">
                    <div class="error-text">
                        <h3>No Result</h3>
                        <p>Sorry but the there is no result matching your searching.</p>
                    </div>
                    <div class="error-button">
                        <a href="{{ url('/') }}">Back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
