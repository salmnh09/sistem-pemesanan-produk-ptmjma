@extends('user')

@section('content')
<div class="card">
    <div class="card-header text-center">Daftar Orderan</div>
    <div class="card-body">
        @if($orders->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Pemesan</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->no_hp }}</td>
                        <td>{{ number_format($order->total_harga, 2) }}</td>
                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                        <td>{{ $order->status }}</td>
                        <td><a href="{{ route('order.detail',$order->id) }}" class="btn btn-sm btn-primary btn-mini">detail</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $orders->links() }}
            </div>
        @else
            <p class="text-center">Tidak ada orderan.</p>
        @endif
    </div>
</div>
@endsection
