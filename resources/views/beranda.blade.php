@extends('app')

@section('content')
<div class="container" style="margin-top: 100px">
    <div class="row">
        @foreach($produk as $p)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/'.$p->gambar) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->nama }}</h5>
                    <p class="card-text">{{ $p->kategori->nama }}</p>
                    <p class="card-text">{{ $p->deskripsi }}</p>
                    <p class="card-text">Rp {{ number_format($p->harga,0,',','.') }}</p>
                    <form action="{{ route('add.to.cart', ['id' => $p->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Beli</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
