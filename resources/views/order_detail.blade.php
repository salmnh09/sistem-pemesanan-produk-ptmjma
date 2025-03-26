@extends('user')
@section('contant')
<div class="card">
    <div class="card-header text-center">Detail Orderan</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <h5>Detail Pesanan</h5>
                <table class="table">
                    <tr>
                        <td>ID Pesanan</td>
                        <td>: {{ $detail->id }}</td>
                    </tr>
                    <tr>
                        <td>Nama Pemesan</td>
                        <td>: {{ $detail->user->name }}</td>
                    </tr>
                    <tr>
                        <td>No HP</td>
                        <td>: {{ $detail->user->no_hp }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pesan</td>
                        <td>: {{ $detail->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: {{ $detail->status }}</td>
                    </tr>
                </table>
            </div>
        </div>
    
        <div class="row mt-4">
            <div class="col-md-12">
                <h5>Detail Produk</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail->orderDetails as $item)
                        <tr>
                            <td>{{ $item->produk->nama_produk }}</td>
                            <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total</strong></td>
                            <td><strong>Rp {{ number_format($detail->total_harga, 0, ',', '.') }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection