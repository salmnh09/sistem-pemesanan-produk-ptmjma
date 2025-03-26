@extends('app')

@section('content')
<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Keranjang Belanja</div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <div class="panel-body">


                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Nama</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cartItems as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                                                <td><input type="number" name="qty[{{ $item->id }}]" value="{{ $item->quantity }}" min="1" class="form-control qty"></td>
                                                <td class="price">{{ number_format($item->getPriceSum(), 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </form>
                                    <p class="fw-bold">Total: Rp {{ number_format(Cart::getTotal(), 0, ',', '.') }}</p>

                                    <a href="{{ route('cart.checkout') }}" class="btn btn-primary">chekout</a>
                                </div>


                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".qty").on('input', function() {
            let grandTotal = 0;
console.log('hasilnya : ',$(".qty").val());

            $("tbody tr").each(function() {
                let row = $(this);
                let price = parseInt(row.find(".price").text().replace(/\D/g, '')) || 0;
                let qty = parseInt(row.find(".qty").val()) || 1;
                let subtotal = price * qty;

                row.find(".subtotal").text(subtotal.toLocaleString('id-ID'));
                grandTotal += subtotal;
            });

            $("#grand-total").text(grandTotal.toLocaleString('id-ID'));
        });
    });
</script>
@endsection



