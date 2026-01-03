<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAtk extends Model
{
    protected $table = 'products_atk';
    protected $primaryKey = 'kode_produk';
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'kode_produk', 'nama_produk', 'kategori', 'harga', 'stok', 'deskripsi'
    ];
}
