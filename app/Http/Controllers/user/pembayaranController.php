<?php

namespace App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\keranjang;
use App\Models\pembayaran;
use App\Models\pemesanan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class pembayaranController extends Controller
{
    //
    public function insert(Request $request) 
    {
        $user_id = Auth::user()->USER_ID;
        $pesanan = pemesanan::create([
            'USER_ID' => $user_id,
            'TOTAL_HARGA'=> $request->total,
            'ALAMAT'=> $request->alamat

        ]);
        $keranjang = keranjang::where('USER_ID', $user_id)->where('status', 'belum')->first();
        if($keranjang){
            $keranjang->update([
                'status'=> 'selesai'
            ]);
        };
        $pembayaran = new pembayaran;
        $pembayaran->PEMESANAN_ID = $pesanan->PEMESANAN_ID;
        $pembayaran->METODE_PEMBAYARAN = $request->metode;
        $pembayaran->USER_ID = $user_id;
        $pembayaran->save();
        Alert::success('Berhasil!', 'Pembayaran Berhasil Dilakukan');
        return back();
    }
}
