@extends('admin.template.appadmin')
@section('title', 'Tambah Data Produk')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <a href="{{url('produk')}}" class="btn btn-primary ml-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
    <div class="pagetitle ml-md-3">
        <h1>Edit Data Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">dashboard</a></li>
                <li class="breadcrumb-item">Produk</li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
        </nav>
        @foreach($produk as $pr)
        <form action="{{url('produk/update', $pr->PRODUK_ID)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="col-md-6 col-12">
                <div class="form-floating mb-3">
                <input type="text" name="nama_produk" class="form-control" id="floatingInput" value="{{$pr->NAMA_PRODUK}}" placeholder="name@example.com">
                <label for="floatingInput">nama barang</label>
                </div>
                <div class="input-group mb-3">
                <img src="{{asset('storage/'.$pr->GAMBAR_PRODUK)}}" alt="" width="100px">
                <input type="file" class="form-control" name="GAMBAR_PRODUK" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="harga" class="form-control" id="floatingInput" value="{{$pr->HARGA_PRODUK}}" placeholder="name@example.com">
                <label for="floatingInput">Harga Barang</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="deskripsi" class="form-control" id="floatingInput" value="{{$pr->DESKRIPSI}}" placeholder="name@example.com">
                <label for="floatingInput">Deskripsi</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="stok" class="form-control" id="floatingInput" value="{{$pr->STOK}}" placeholder="name@example.com">
                <label for="floatingInput">jumlah stok</label>
                </div>
                <div class="col-12 mx-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>

                </div>

            </div>
            </form>
@endforeach
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
            