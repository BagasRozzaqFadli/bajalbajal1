<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'nama_produk', 'deskripsi_produk', 'jumlah_produk', 'harga_produk', 'kategori_produk_id', 'gambar_produk',
    ];

    public function kategori_produk()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk_id');
    }
}
