<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto_produk
       ]);

        if ($request->hasFile('foto_produk')) {
            $image = $request->file('foto_produk');
            $namaFoto = time().'.'.$image->getClientOriginalExtension(); // Nama file menggunakan timestamp untuk menghindari konflik
            $destinationPath = public_path('/images'); // Tentukan folder tujuan untuk menyimpan gambar
            $image->move($destinationPath, $namaFoto); // Pindahkan gambar ke folder tujuan
            $validatedData['foto_produk'] = 'images/'.$namaFoto; // Simpan path gambar ke database
        };
        

    Produk::create($validatedData); // Simpan data produk ke database 
      
        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
{
    $validatedData = $request->validate([
        'nama_produk' => 'required',
        'kategori' => 'required',
        'harga' => 'required|numeric',
        'foto_produk' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('foto_produk')) {
        // Jika gambar baru diunggah, proses dan simpan gambar baru
        $image = $request->file('foto_produk');
        $namaFoto = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images');
        $image->move($destinationPath, $namaFoto);
        $validatedData['foto_produk'] = 'images/'.$namaFoto;

        // Hapus gambar lama jika ada
        if ($produk->foto_produk) {
            $oldImagePath = public_path($produk->foto_produk);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    }

    $produk->update($validatedData);

    return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
}




    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}