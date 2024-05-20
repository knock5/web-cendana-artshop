<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'PEMESANAN_ID';
    protected $table = 'pemesanan';
    public $timestamps = false;
    public $fillable = ['ITEM_ID','USER_ID','ALAMAT','TOTAL_HARGA'];

  

    public function users()
    {
        return $this->belongsTo(users::class);
    }
}
