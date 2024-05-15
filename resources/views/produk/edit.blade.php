@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Edit Produk</h2>
        <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $produk->kategori }}">
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}">
            </div>
            <div class="form-group">
                <label for="foto_produk">Foto Produk</label>
                <input type="file" class="form-control-file" id="foto_produk" name="foto_produk" value="{{ $produk->foto_produk }}">
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
@endsection
