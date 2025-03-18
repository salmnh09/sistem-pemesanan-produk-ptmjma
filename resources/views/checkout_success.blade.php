@extends('app')

@section('content')
<div class="container mt-5">
    <h2>Keranjang Belanja</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                        <td>
                            <input type="number" name="qty[{{ $item->id }}]" value="{{ $item->quantity }}" min="1" class="form-control">
                        </td>
                        <td>{{ number_format($item->getPriceSum(), 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="fw-bold">Total: Rp {{ number_format(Cart::getTotal(), 0, ',', '.') }}</p>
        <button type="submit" class="btn btn-primary">Update Keranjang</button>
    </form>
    
    <a href="{{ route('checkout') }}" class="btn btn-success mt-3">Lanjut ke Checkout</a>
</div>
@endsection
