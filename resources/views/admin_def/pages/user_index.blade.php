@extends('admin_master_def')

@section('title', "| {$user_type}s List")

@section('content')
    <div class="user-page clearfix">
        <div class="col-xs-12">
            <h3>{{ $user_type }}s List</h3>
            <div class="box box-warning">
                <div class="box-body">
                    <table id="table-users" class="table">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th width="140px">Phone</th>
                                <th width="140px">Address</th>
                                <th width="140px">Activated at</th>
                                <th width="140px">Orders</th>
                                <th width="150px">Successful payment</th>
                                <th width="80px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ !empty($user->getFullName()) ? $user->getFullName() : $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ? $user->phone : "N/A" }}</td>
                                <td>{{ $user->address ? $user->address : "N/A" }}</td>
                                <td>{{ $user->email_verified_at ? $user->email_verified_at : 'Not Activated'}}</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-default"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('lib-css')
    <link rel="stylesheet" href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@push('lib-js')
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
@endpush

@push('js')
    <script>
        $('#table-users').DataTable({
            'paging'      : true,
            'pageLength'  : 15,
            'lengthChange': false,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'columns'     : [
                {orderable: true},
                {orderable: true},
                {orderable: true},
                {orderable: true},
                {orderable: true},
                {orderable: true},
                {orderable: true},
                {orderable: false},
            ],
            order: [4, 'desc'],
        });
    </script>
@endpush