<html>
    @extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Edit Produk</h2>
        <p class="text-slate-500">Ubah informasi untuk produk: <span class="text-indigo-600 font-semibold">{{ $product->nama_produk }}</span></p>
    </div>

    <form action="{{ route('products.update', $product->kode_produk) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT') <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Kode Produk</label>
                <input type="text" value="{{ $product->kode_produk }}" class="w-full p-3 rounded-xl bg-slate-100 border-none text-slate-500 outline-none" disabled>
                <p class="text-[10px] text-slate-400 mt-1">*Kode produk tidak bisa diubah</p>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Kategori</label>
                <input type="text" name="kategori" value="{{ $product->kategori }}" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none" required>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-1">Nama Produk</label>
            <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Harga (Rp)</label>
                <input type="number" name="harga" value="{{ $product->harga }}" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none" required>
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Stok</label>
                <input type="number" name="stok" value="{{ $product->stok }}" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-indigo-500 outline-none" required>
            </div>
        </div>

        <div class="pt-4 flex gap-3">
            <button type="submit" class="flex-1 bg-indigo-600 text-white py-3 rounded-xl font-bold hover:bg-indigo-700 transition">Update Data</button>
            <a href="{{ route('products.index') }}" class="flex-1 bg-slate-100 text-slate-600 py-3 rounded-xl font-bold text-center hover:bg-slate-200 transition">Batal</a>
        </div>
    </form>
</div>
@endsection
</html>