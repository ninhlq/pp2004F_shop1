@extends('admin_master_def')

@section('title', '| Order List')

@section('content')
    <div class="col-xs-12">
        <h3>Order List</h3>
        <div class="box box-warning">
            <div class="box-body">
                <table id="table-orders" class="table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th width="30%">Amount</th>
                            <th>Check Number</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bills as $bill)
                        <tr>
                            <td>{{ $bill->order->customer->getFullName() }}</td>
                            <td>{{ number_format($bill->order->getAmount(true)*1000, 0, ',', '.') }} VNĐ</td>
                            <td>{{ $bill->check_number }}</td>
                            <td>{{ $bill->payment_date }}</td>
                            <td>
                                <a href="{{ route('admin.bill.show', $bill->id) }}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
        $('#table-orders').DataTable({
            'paging'      : true,
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
                {orderable: false},
            ],
            order: [0, 'desc'],
        });
    </script>
@endpush