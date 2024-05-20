@extends('admin.template.appadmin')
@section('title', 'Tambah Data Produk')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <a href="{{url('produk')}}" class="btn btn-primary ml-md-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
    <div class="pagetitle ml-md-3">
        <h1>Edit Data Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">dashboard</li>
                <li class="breadcrumb-item">Produk</li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
        </nav>
        @foreach($produk as $pr)
        <form action="{{url('produk/update', $pr->PRODUK_ID)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="col-md-6 col-12">
                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
                <div class="form-floating mb-3">
                <input type="text" name="nama_produk" class="form-control  @error('nama_produk') is-invalid @enderror" id="floatingInput" value="{{$pr->NAMA_PRODUK}}" placeholder="name@example.com">
                <label for="floatingInput">nama barang</label>
                @error('nama_produk')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                </div>
                <div class="input-group mb-3">
                <img src="{{asset('storage/'.$pr->GAMBAR_PRODUK)}}" alt="" width="100px">
                <input type="file" class="form-control @error('GAMBAR_PRODUK') is-invalid @enderror" name="GAMBAR_PRODUK" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                @error('GAMBAR_PRODUK')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror    
            </div>
                <div class="form-floating mb-3">
                <input type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" id="floatingInput" value="{{$pr->HARGA_PRODUK}}" placeholder="name@example.com">
                <label for="floatingInput">Harga Barang</label>
                @error('harga')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                </div>
                <div class="form-floating mb-3">
                <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" id="floatingInput" value="{{$pr->DESKRIPSI}}" placeholder="name@example.com">
                <label for="floatingInput">Deskripsi</label>
                @error('deskripsi')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
                </div>
             
                <div class="col-12 mx-auto">
                <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </div>

                </div>

            </div>
            </form>
@endforeach
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
            