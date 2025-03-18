@extends('app')
@section('content')
    <div class="container" style="margin-top:100px">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">No. HP</label>
                        <input type="text" name="no_hp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
<div class="form-group">
                    <div class="form-group">
                        <label for="">Produk</label>
                        <select name="produk_id" class="form-control" required>
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($produk as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
</div>
                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Beli</button>
                </form>
            </div>
        </div>
    </div>
@endsection
