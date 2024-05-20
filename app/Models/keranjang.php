<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    use HasFactory;
    protected $primaryKey = 'ID_KERANJANG';
    protected $table = 'keranjang';
    public $timestamps = false;
    public $fillable = ['USER_ID','waktu','status'];

    public function users()
    {
        return $this->belongsTo(users::class,'USER_ID');
    }
}
