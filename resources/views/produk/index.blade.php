@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Produk</h2>
        <a href="{{ route('produk.create') }}" class="btn btn-primary mb-2">Tambah Produk</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Foto</th>
                <th width="280px">Aksi</th>
            </tr>
            @foreach ($produks as $produk)
                <tr>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->kategori }}</td>
                    <td>{{ $produk->harga }}</td>
                    <td><img src="{{ asset($produk->foto_produk) }}" style="max-width: 100px;"></td>
                    <td>
                        <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('produk.edit', $produk->id_produk) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
