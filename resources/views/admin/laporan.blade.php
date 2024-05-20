@extends('admin.template.appadmin')
@section('title', 'Data Laporan')
@section('content')

<style>
    #p{
        vertical-align: middle;
        text-align: center;
    }
    #d{
        vertical-align: middle;
    }
</style>
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('cetak') }}" class="btn btn-primary"><i class="fas fa-file-pdf"></i> cetak Laporan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Akun</th>
                <th>Produk</th>
                <th>Harga Produk</th>
                <th>Jumlah Produk</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Waktu</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                    @php
                $id = 1;
            @endphp
            @foreach ($laporanPenjualan as $transaksi)
        {{-- Pisahkan produk dalam array menggunakan explode --}}
        @php
            $produks = explode(',', $transaksi->produk);
            $hargaProduks = explode(',', $transaksi->harga_produk);
            $jumlahProduks = explode(',', $transaksi->jumlah_produk);
        @endphp

        {{-- Tentukan jumlah baris untuk setiap transaksi --}}
        @php
            $rowspan = count($produks);
        @endphp

        {{-- Loop setiap produk pada transaksi --}}
        @for ($i = 0; $i < $rowspan; $i++)
            <tr>
                {{-- Baris pertama menampilkan nama akun, total harga, metode pembayaran, dan waktu pembayaran --}}
                
               
                @if ($i === 0)
                    <td id="p" rowspan="{{ $rowspan }}">{{ $id++ }}</td>
                    <td id="p" rowspan="{{ $rowspan }}">{{ $transaksi->nama_akun }}</td>
                    @endif
                    <td>{{ $produks[$i] }}</td>
                <td>{{ $hargaProduks[$i] }}</td>
                <td>{{ $jumlahProduks[$i] }}</td>
                @if ($i === 0)
                    
                    <td id="p" rowspan="{{ $rowspan }}">Rp.{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td id="p" rowspan="{{ $rowspan }}">{{ $transaksi->metode_pembayaran }}</td>
                    <td id="p" rowspan="{{ $rowspan }}">{{ $transaksi->waktu_pembayaran }}</td> {{-- Menggunakan waktu_pembayaran jika nama kolomnya berbeda --}}
                    @endif

                {{-- Tampilkan detail produk --}}
               
            </tr>
        @endfor
    @endforeach


        </tbody>
    </table>
</div>

   
@endsection
