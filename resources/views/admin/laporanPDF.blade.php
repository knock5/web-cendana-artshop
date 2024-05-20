<!DOCTYPE html>
<html>
<head>
	<title>Laporan Penjualan</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
        #p{
            text-align: center;
            vertical-align: middle;
        }
	</style>
	<center>
		<h5>Laporan Penjualan</h4>
		<h6>CendanaArtshop</h6>
	</center>
 
	<table class='table table-bordered'>
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
 
</body>
</html>