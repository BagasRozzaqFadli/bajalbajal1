<!-- resources/views/produk/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Produk</h2>
        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" required>
            </div>
            <div class="form-group">
                <label for="kategori_produk">Kategori Produk:</label>
                <input type="text" class="form-control" id="kategori_produk" name="kategori_produk" value="{{ $produk->kategori_produk }}" required>
            </div>
            <div class="form-group">
                <label for="gambar_produk">Gambar Produk:</label>
                <input type="text" class="form-control" id="gambar_produk" name="gambar_produk" value="{{ $produk->gambar_produk }}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi_produk">Deskripsi Produk:</label>
                <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" required>{{ $produk->deskripsi_produk }}</textarea>
            </div>
            <div class="form-group">
                <label for="jumlah_produk">Jumlah Produk:</label>
                <input type="number" class="form-control" id="jumlah_produk" name="jumlah_produk" value="{{ $produk->jumlah_produk }}" required>
            </div>
            <div class="form-group">
                <label for="harga_produk">Harga Produk:</label>
                <input type="number" class="form-control" id="harga_produk" name="harga_produk" value="{{ $produk->harga_produk }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
