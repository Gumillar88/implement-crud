@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pesanan</h1>
    <p>Total Harga: Rp {{ $order->total_price }}</p>
    <p>Tanggal Pesanan: {{ $order->order_date }}</p>
    <h3>Produk yang Dipesan</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orderItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->subtotal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Buat Pesanan Baru</a>
</div>
@endsection