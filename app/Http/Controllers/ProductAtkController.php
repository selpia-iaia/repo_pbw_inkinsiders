<?php

namespace App\Http\Controllers;

// Memanggil Model dan Request agar bisa digunakan
use App\Models\ProductAtk;
use Illuminate\Http\Request;

class ProductAtkController extends Controller
{
    /**
     * Menampilkan daftar produk (beserta fitur pencarian)
     */
    public function index(Request $request)
    {
        // 1. Ambil input dari kolom search di view
        $search = $request->input('search');

        // 2. Query ke database: Cari berdasarkan Nama atau Kode Produk
        $products = ProductAtk::when($search, function ($query, $search) {
            return $query->where('nama_produk', 'like', "%{$search}%")
                         ->orWhere('kode_produk', 'like', "%{$search}%");
        })->get();

        // 3. Tampilkan ke folder Product (P besar) di file index
        return view('Product.index', compact('products'));
    }

    /**
     * Menampilkan form tambah produk
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Menyimpan data produk baru ke database
     */
    public function store(Request $request)
    {
        // Validasi input agar data tidak rusak
        $request->validate([
            'kode_produk' => 'required|unique:products_atk,kode_produk',
            'nama_produk' => 'required',
            'kategori'    => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
        ]);

        // Simpan semua data dari form
        ProductAtk::create($request->all());

        // Kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Barang berhasil masuk gudang!');
    }

    /**
     * Menampilkan form edit berdasarkan Kode Produk
     */
    public function edit($id)
    {
        $product = ProductAtk::findOrFail($id);
        return view('Product.edit', compact('product'));
    }

    /**
     * Memperbarui data produk yang sudah ada
     */
    public function update(Request $request, $id)
    {
        $product = ProductAtk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'kategori'    => 'required',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Data barang berhasil diubah!');
    }

    /**
     * Menghapus produk dari database
     */
    public function destroy($id)
    {
        $product = ProductAtk::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Barang berhasil dihapus dari sistem!');
    }
}