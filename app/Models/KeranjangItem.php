<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'ITEM_ID';
    protected $table = 'keranjang_item';
    public $timestamps = false;
    protected $fillable = ['PRODUK_ID', 'ID_KERANJANG','JUMLAH'];
    
    
    public function Product()
    {
        return $this->belongsTo(Product::class, 'PRODUK_ID');
    }

    public function keranjang()
    {
        return $this->belongsTo(keranjang::class , 'ID_KERANJANG');
    }
}
