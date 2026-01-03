@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Tambah Produk Baru</h2>
        <a href="{{ route('products.index') }}" class="text-indigo-600 text-sm hover:underline">← Kembali ke Daftar</a>
    </div>

    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Kode Produk</label>
                <input type="text" name="kode_produk" placeholder="Contoh: ATK-001" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Kategori</label>
                <input type="text" name="kategori" placeholder="Kertas/Alat Tulis" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-1">Nama Produk</label>
            <input type="text" name="nama_produk" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Harga (Rp)</label>
                <input type="number" name="harga" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Stok Awal</label>
                <input type="number" name="stok" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none" required>
            </div>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">
            Simpan Produk
        </button>
    </form>
</div>
@endsection