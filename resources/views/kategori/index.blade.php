<!-- resources/views/kategori/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Kategori</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $kategori)
            <tr>
                <td>{{ $kategori->id }}</td>
                <td>{{ $kategori->nama }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

