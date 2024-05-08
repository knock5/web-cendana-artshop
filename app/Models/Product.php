<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'produk';
    public $timestamps = false;
    protected $fillable = ['NAMA_PRODUK','GAMBAR_PRODUK','KATEGORI_PRODUK','HARGA_PRODUK','DESKRIPSI','STOK'];
public function transaksi()
{
    return $this->hasMany(transaksi::class);
}    
}
