<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\KategoriProduk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    /**
     * Menampilkan form tambah produk.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = KategoriProduk::all();
        return view('produk.create', compact('categories'));
    }

    /**
     * Menyimpan produk baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_produk' => 'required|exists:kategori_produk,id',
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_produk' => 'required|string',
            'jumlah_produk' => 'required|integer',
            'harga_produk' => 'required|numeric',
        ]);

        $path = $request->file('gambar_produk')->store('public/images');

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'kategori_produk_id' => $request->kategori_produk,
            'gambar_produk' => $path,
            'deskripsi_produk' => $request->deskripsi_produk,
            'jumlah_produk' => $request->jumlah_produk,
            'harga_produk' => $request->harga_produk,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit produk.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $categories = KategoriProduk::all();
        return view('produk.edit', compact('produk', 'categories'));
    }

    /**
     * Update produk yang diedit.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori_produk' => 'required|exists:kategori_produk,id',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi_produk' => 'required|string',
            'jumlah_produk' => 'required|integer',
            'harga_produk' => 'required|numeric',
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('gambar_produk')) {
            Storage::delete($produk->gambar_produk);
            $path = $request->file('gambar_produk')->store('public/images');
            $produk->gambar_produk = $path;
        }

        $produk->nama_produk = $request->nama_produk;
        $produk->kategori_produk_id = $request->kategori_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->jumlah_produk = $request->jumlah_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        Storage::delete($produk->gambar_produk);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('detail_produk', compact('produk'));
    }
}
