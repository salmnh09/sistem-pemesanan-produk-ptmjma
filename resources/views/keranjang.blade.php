@extends('app')

@section('content')
<div class="container" style="margin-top:100px">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Keranjang Belanja</div>
                <div class="panel-body">
                    
                       
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-md-8">
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
                                                <td><input type="number" name="qty[{{ $item->id }}]" value="{{ $item->qty }}" min="1" class="form-control"></td>
                                                <td>{{ number_format($item->getPriceSum(), 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    </form>
                                    <p class="fw-bold">Total: Rp {{ number_format(Cart::getTotal(), 0, ',', '.') }}</p>
                                </div>
                                <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                                <div class="col-md-4">
                                    <div class="card p-3">
                                        <h4 class="mb-3">Data Pemesan</h4>
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nomor_hp" class="form-label">Nomor HP</label>
                                            <input type="text" name="nomor_hp" id="nomor_hp" class="form-control" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
