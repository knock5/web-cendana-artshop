<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\keranjang;
use App\Models\pembayaran;
use App\Models\KeranjangItem;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class cartController extends Controller
{
    //
    public function cart(String $id)
{
    $produk = Product::findOrFail($id);
    $user_id = Auth::user()->USER_ID;
    $jumlah = 1;
    
    // Cek apakah ada keranjang yang belum selesai untuk pengguna ini
    $keranjang = keranjang::where('USER_ID', $user_id)->where('status', 'belum')->first();
    
    if (!$keranjang) {
        // Jika tidak ada keranjang yang belum selesai, buat yang baru
        $keranjang = keranjang::create([
            'USER_ID' => $user_id,  
        ]);
    }
    
    // Periksa apakah produk sudah ada dalam keranjang
    $existingItem = KeranjangItem::where('ID_KERANJANG', $keranjang->ID_KERANJANG)
                                  ->where('PRODUK_ID', $id)
                                  ->first();
    
    if ($existingItem) {
        // Jika produk sudah ada dalam keranjang, tampilkan pesan peringatan
        Alert::warning('Peringatan!', 'Produk sudah ada dalam keranjang.');
        return back();
    }
    
    // Tambahkan item ke keranjang
    $keranjangItem = new KeranjangItem;
    $keranjangItem->ID_KERANJANG = $keranjang->ID_KERANJANG;
    $keranjangItem->PRODUK_ID = $id;
    $keranjangItem->JUMLAH = $jumlah;

    $keranjangItem->save();
    Alert::success('Berhasil!', 'Data berhasil ditambahkan');

    return back();
}
public function showCart()
{
    $user_id = Auth::user()->USER_ID;
    $keranjang = keranjang::where('USER_ID', $user_id)->where('status', 'belum')->first();
    if($keranjang){
        $idCart = $keranjang->ID_KERANJANG;
        $data = KeranjangItem::where('ID_KERANJANG',$idCart)->get();
        return view('user.cart', compact('data'));
    }else{
        $data= [];
        return view('user.cart', compact('data'));
    }
  

}
public function editCart(Request $request, $id)
{
    $user_id = Auth::user()->USER_ID;
    $keranjang = keranjang::where('USER_ID', $user_id)->where('status', 'belum')->first();
    $idCart = $keranjang->ID_KERANJANG;
    $keranjangItem = KeranjangItem::where('ITEM_ID', $id)->first();
    $keranjangItem->JUMLAH = $request->jumlah;
    $keranjangItem->save();
    return back();
    

}

}
