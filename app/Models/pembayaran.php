<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'PEMBAYARAN_ID';
    protected $table = 'pembayaran';
    public $timestamps = false;
    public $fillable = ['PEMESANAN_ID', 'METODE_PEMBAYARAN','STATUS','WAKTU','USER_ID'];

    public function users()
    {
        return $this->belongsTo(users::class,);
    }
    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class);
    }
}
