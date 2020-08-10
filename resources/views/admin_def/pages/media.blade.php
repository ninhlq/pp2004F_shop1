@extends('admin_master_def')

@section('title', "| Media Manager")

@section('content')
    <iframe src="/filemanager?type=images" style="width: 100%; height: 92vh; overflow: hidden; border: none;"></iframe>
@endsection