<!-- resources/views/produk/create.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Tambah Produk</h2>
        <form action='{{url("produk")}}' method='post' enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori:</label>
                <input type="text" class="form-control" id="kategori" name="kategori">
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="form-group">
        <label for="foto_produk">Foto Produk</label>
        <input type="file" class="form-control-file" id="foto_produk" name="foto_produk" required>
    </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
