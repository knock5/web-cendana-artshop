@extends('admin.template.appadmin')
@section('title', 'Tambah Data Produk')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <a href="{{url('produk')}}" class="btn btn-primary ml-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
    <div class="pagetitle ml-md-3">
        <h1>Tambah Data Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">dashboard</a></li>
                <li class="breadcrumb-item">Produk</li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
        </nav>
        <form action="{{url('produk/store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 col-12">
                <div class="form-floating mb-3">
                <input type="text" name="nama_produk" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">nama barang</label>
                </div>
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Gambar Barang</span>
                <input type="file" class="form-control" name="GAMBAR_PRODUK" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="harga" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Harga Barang</label>
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="deskripsi" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Deskripsi</label>
                </div>
               
                <div class="col-12 mx-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>

                </div>

            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
            