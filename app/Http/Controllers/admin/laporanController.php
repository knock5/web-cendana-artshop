<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\KeranjangItem;
use App\Models\pemesanan;
use App\Models\users;
use App\Models\pembayaran;
use App\Models\keranjang;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
class laporanController extends Controller
{
    //
    public function index()
    {
        // $laporanPenjualan = DB::table('pemesanan as pm')
        // ->select(
        //     'u.name as nama_akun',
        //     'p.NAMA_PRODUK as produk',
        //     'p.HARGA_PRODUK as harga_produk',
        //     'ki.JUMLAH as jumlah_produk',
        //     DB::raw('(p.HARGA_PRODUK * ki.JUMLAH) as total_harga'),
        //     'pb.METODE_PEMBAYARAN as metode_pembayaran',
        //     'pb.WAKTU as waktu'
        // )
        // ->join('users as u', 'pm.USER_ID', '=', 'u.USER_ID')
        // ->join('keranjang as k', 'pm.USER_ID', '=', 'k.USER_ID')
        // ->join('keranjang_item as ki', 'k.ID_KERANJANG', '=', 'ki.ID_KERANJANG')
        // ->join('produk as p', 'ki.PRODUK_ID', '=', 'p.PRODUK_ID')
        // ->join('pembayaran as pb', 'pm.PEMESANAN_ID', '=', 'pb.PEMESANAN_ID')
        // ->where('k.status', '=', 'selesai')
        // ->orderBy('pb.WAKTU', 'DESC')
        // ->get();
        $laporanPenjualan = DB::table('pemesanan AS pm')
    ->join('users AS u', 'pm.USER_ID', '=', 'u.USER_ID')
    ->join('keranjang AS k', 'pm.USER_ID', '=', 'k.USER_ID')
    ->join('keranjang_item AS ki', 'k.ID_KERANJANG', '=', 'ki.ID_KERANJANG')
    ->join('produk AS p', 'ki.PRODUK_ID', '=', 'p.PRODUK_ID')
    ->join('pembayaran AS pb', 'pm.PEMESANAN_ID', '=', 'pb.PEMESANAN_ID')
    ->where('k.status', 'selesai')
    ->groupBy('pm.PEMESANAN_ID', 'u.name', 'pb.METODE_PEMBAYARAN', 'pb.WAKTU')
    ->orderByDesc('pb.WAKTU')
    ->select(
        'u.name AS nama_akun',
        DB::raw("GROUP_CONCAT(p.NAMA_PRODUK SEPARATOR ', ') AS produk"),
        DB::raw("GROUP_CONCAT(p.HARGA_PRODUK SEPARATOR ', ') AS harga_produk"),
        DB::raw("GROUP_CONCAT(ki.JUMLAH SEPARATOR ', ') AS jumlah_produk"),
        DB::raw("SUM(p.HARGA_PRODUK * ki.JUMLAH) AS total_harga"),
        'pb.METODE_PEMBAYARAN AS metode_pembayaran',
        'pb.WAKTU AS waktu'
    )
    ->get();
        // $laporanPenjualan = DB::table('pemesanan AS pm')
        // ->join('users AS u', 'pm.USER_ID', '=', 'u.USER_ID')
        // ->join('keranjang AS k', 'pm.USER_ID', '=', 'k.USER_ID')
        // ->join('keranjang_item AS ki', 'k.ID_KERANJANG', '=', 'ki.ID_KERANJANG')
        // ->join('produk AS p', 'ki.PRODUK_ID', '=', 'p.PRODUK_ID')
        // ->join('pembayaran AS pb', 'pm.PEMESANAN_ID', '=', 'pb.PEMESANAN_ID')
        // ->where('k.status', 'selesai')
        // ->groupBy('pm.PEMESANAN_ID', 'u.name', 'pb.METODE_PEMBAYARAN', 'pb.WAKTU')
        // ->orderByDesc('pb.WAKTU')
        // ->select(
        //     'u.name AS nama_akun',
        //     DB::raw("GROUP_CONCAT(p.NAMA_PRODUK SEPARATOR ', ') AS produk"),
        //     DB::raw("GROUP_CONCAT(p.HARGA_PRODUK SEPARATOR ', ') AS harga_produk"),
        //     DB::raw("GROUP_CONCAT(ki.JUMLAH SEPARATOR ', ') AS jumlah_produk"),
        //     DB::raw("SUM(p.HARGA_PRODUK * ki.JUMLAH) AS total_harga"),
        //     'pb.METODE_PEMBAYARAN AS metode_pembayaran',
        //     'pb.WAKTU AS waktu'
        // )
        // ->get();
            
        return view('admin.laporan', compact('laporanPenjualan'));
    }
    public function cetak()
    {
        $laporanPenjualan = DB::table('pemesanan AS pm')
    ->join('users AS u', 'pm.USER_ID', '=', 'u.USER_ID')
    ->join('keranjang AS k', 'pm.USER_ID', '=', 'k.USER_ID')
    ->join('keranjang_item AS ki', 'k.ID_KERANJANG', '=', 'ki.ID_KERANJANG')
    ->join('produk AS p', 'ki.PRODUK_ID', '=', 'p.PRODUK_ID')
    ->join('pembayaran AS pb', 'pm.PEMESANAN_ID', '=', 'pb.PEMESANAN_ID')
    ->where('k.status', 'selesai')
    ->groupBy('pm.PEMESANAN_ID', 'u.name', 'pb.METODE_PEMBAYARAN', 'pb.WAKTU')
    ->orderByDesc('pb.WAKTU')
    ->select(
        'u.name AS nama_akun',
        DB::raw("GROUP_CONCAT(p.NAMA_PRODUK SEPARATOR ', ') AS produk"),
        DB::raw("GROUP_CONCAT(p.HARGA_PRODUK SEPARATOR ', ') AS harga_produk"),
        DB::raw("GROUP_CONCAT(ki.JUMLAH SEPARATOR ', ') AS jumlah_produk"),
        DB::raw("SUM(p.HARGA_PRODUK * ki.JUMLAH) AS total_harga"),
        'pb.METODE_PEMBAYARAN AS metode_pembayaran',
        'pb.WAKTU AS waktu'
    )
    ->get();
    $pdf = pdf::loadview('admin.laporanPDF',['laporanPenjualan'=>$laporanPenjualan]);
    return $pdf->download('laporanPenjualan.pdf');
    }
}
