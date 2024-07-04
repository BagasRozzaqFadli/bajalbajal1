<!-- resources/views/produk/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Produk Baru</h2>
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
            </div>
            <div class="form-group">
                <label for="kategori_produk">Kategori Produk:</label>
                <select class="form-control" id="kategori_produk" name="kategori_produk" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="gambar_produk">Gambar Produk:</label>
                <input type="file" class="form-control-file" id="gambar_produk" name="gambar_produk" required>
            </div>
            <div class="form-group">
                <label for="deskripsi_produk">Deskripsi Produk:</label>
                <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" required></textarea>
            </div>
            <div class="form-group">
                <label for="jumlah_produk">Jumlah Produk:</label>
                <input type="number" class="form-control" id="jumlah_produk" name="jumlah_produk" required>
            </div>
            <div class="form-group">
                <label for="harga_produk">Harga Produk:</label>
                <input type="number" class="form-control" id="harga_produk" name="harga_produk" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
