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
		<h6>CendanaArshop</h6>
	</center>
 
	<table class='table table-bordered'>
    <thead>
                        <tr>
                        <td>NO</td>
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

                {{-- Loop setiap produk pada transaksi --}}
                @for ($i = 0; $i < count($produks); $i++)
                    <tr>
                        
                        {{-- Baris pertama menampilkan nama akun --}}
                        @if ($i === 0)
                        <td id="p" rowspan="{{ count($produks) }}">{{ $id++ }}</td>
                            <td id="p" rowspan="{{ count($produks) }}" data-dt-order="disable">{{ $transaksi->nama_akun }}</td>
                        @endif

                        {{-- Tampilkan detail produk --}}
                        <td>{{ $produks[$i] }}</td>
                        <td>{{ $hargaProduks[$i] }}</td>
                        <td>{{ $jumlahProduks[$i] }}</td>

                        {{-- Tampilkan total harga hanya pada baris pertama --}}
                        @if ($i === 0)
                            <td id="p" rowspan="{{ count($produks) }}" data-dt-order="disable">Rp.{{number_format($transaksi->total_harga, 0, ',', '.')}}</td>
                            <td id="p" rowspan="{{ count($produks) }}" data-dt-order="disable">{{ $transaksi->metode_pembayaran }}</td>
                            <td id="p" rowspan="{{ count($produks) }}" data-dt-order="disable">{{ $transaksi->waktu }}</td>
                        @endif
                    </tr>
                @endfor
            @endforeach
        </tbody>
	</table>
 
</body>
</html>