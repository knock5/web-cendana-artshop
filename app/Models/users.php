<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $primaryKey = 'USER_ID';
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = ['name','email','password','level','alamat','foto'];
    
    protected $casts = [
        'password' => 'hashed',
    ];
    public function keranjang()
    {
        return $this->hasMany(keranjang::class);
    }
    public function pemesanan()
    {
        return $this->hasMany(pemesanan::class);
    }
    public function pembayaran()
    {
        return $this->hasMany(pembayaran::class);
    }

}
