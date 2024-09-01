@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pesan Produk</h1>
    <form id="order-form" action="{{ route('orders.store') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga per Lembar</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody id="order-items">
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>
                        <input type="hidden" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                        <input type="number" name="products[{{ $product->id }}][quantity]"
                            class="form-control product-quantity" data-price="{{ $product->price }}" value="1" min="1">
                    </td>
                    <td>{{ $product->price }}</td>
                    <td class="product-subtotal">{{ $product->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total: Rp <span id="total-price">0</span></h3>
        <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    calculateTotal();

    $('.product-quantity').on('input', function() {
        var quantity = $(this).val();
        var price = $(this).data('price');
        var subtotal = quantity * price;
        $(this).closest('tr').find('.product-subtotal').text(subtotal);

        calculateTotal();
    });

    function calculateTotal() {
        var total = 0;
        $('.product-subtotal').each(function() {
            total += parseFloat($(this).text());
        });
        $('#total-price').text(total);
    }
});
</script>

@endsection