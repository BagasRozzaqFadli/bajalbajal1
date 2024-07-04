<!-- resources/views/produk/confirm.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Konfirmasi Hapus Produk</h2>
        <p>Apakah Anda yakin ingin menghapus produk ini?</p>

        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batalkan</a>
        </form>
    </div>
@endsection
