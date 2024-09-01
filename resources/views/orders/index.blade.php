@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Pembelian Konsumen</h1>
    <table class="table table-bordered" id="orders-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Total Harga</th>
                <th>Tanggal Pesanan</th>
                <th>Tanggal Dibuat</th>
            </tr>
        </thead>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
$(function() {
    $('#orders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('
        orders.datatables ') }}',
        columns: [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'total_price',
                name: 'total_price'
            },
            {
                data: 'order_date',
                name: 'order_date'
            },
            {
                data: 'created_at',
                name: 'created_at'
            }
        ]
    });
});
</script>
@endsection