<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\KeranjangItem;
use App\Models\pemesanan;
use App\Models\users;
class DasboardController extends Controller
{
    //
    public function index()
    {
        $produk = Product::count();
        $keranjangitem = KeranjangItem::sum('JUMLAH');
        $user = users::count();
        $pendapatan = pemesanan::sum('TOTAL_HARGA');
        return view('admin.dashboard', compact('produk','keranjangitem','pendapatan','user'));
    }
}
