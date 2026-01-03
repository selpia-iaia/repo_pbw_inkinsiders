@extends('layouts.app')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">
        <div>
            <h2 class="text-xl font-bold text-slate-800">Daftar Produk ATK</h2>
            <p class="text-sm text-slate-500">Manajemen Inventaris Ink Insiders</p>
        </div>

        <form action="{{ route('products.index') }}" method="GET" class="flex gap-2 w-full md:w-auto">
            <input type="text" name="search" placeholder="Cari nama atau kode..." value="{{ request('search') }}" 
                   class="flex-1 md:w-64 p-2.5 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
            <button type="submit" class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-indigo-700 transition">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('products.index') }}" class="bg-slate-100 text-slate-600 px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-slate-200 transition">Reset</a>
            @endif
        </form>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50">
                    <th class="p-4 font-semibold text-slate-600 text-sm">Kode</th>
                    <th class="p-4 font-semibold text-slate-600 text-sm">Nama Produk</th>
                    <th class="p-4 font-semibold text-slate-600 text-sm">Kategori</th>
                    <th class="p-4 font-semibold text-slate-600 text-sm text-right">Harga</th>
                    <th class="p-4 font-semibold text-slate-600 text-sm text-center">Stok</th>
                    <th class="p-4 font-semibold text-slate-600 text-sm text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($products as $p)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="p-4 text-sm font-mono text-indigo-600 font-bold">{{ $p->kode_produk }}</td>
                    <td class="p-4 text-sm font-medium text-slate-800">{{ $p->nama_produk }}</td>
                    <td class="p-4 text-sm text-slate-500">{{ $p->kategori }}</td>
                    <td class="p-4 text-sm font-bold text-slate-800 text-right">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td class="p-4 text-center">
                        <span class="px-2 py-1 rounded-md text-xs font-bold {{ $p->stok < 10 ? 'bg-red-50 text-red-600' : 'bg-emerald-50 text-emerald-600' }}">
                            {{ $p->stok }}
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('products.edit', $p->kode_produk) }}" class="px-3 py-1.5 bg-amber-50 text-amber-600 rounded-lg text-xs font-bold hover:bg-amber-100 transition">
                                EDIT
                            </a>
                            <form action="{{ route('products.destroy', $p->kode_produk) }}" method="POST" onsubmit="return confirm('Yakin hapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-bold hover:bg-red-100 transition">
                                    HAPUS
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-12 text-center">
                        <div class="flex flex-col items-center">
                            <span class="text-slate-300 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                            </span>
                            <p class="text-slate-400 italic">Data produk tidak ditemukan atau masih kosong.</p>
                            <a href="{{ route('products.create') }}" class="mt-4 text-indigo-600 font-bold hover:underline text-sm">+ Tambah Produk Pertama</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection