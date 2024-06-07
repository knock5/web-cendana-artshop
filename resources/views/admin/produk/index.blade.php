@extends('admin.template.appadmin')
@section('title', 'Data Produk')
@section('data', 'active')
@section('content')

<div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ url('produk/tambah') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        @php
                            $id = 1;
                        @endphp
                        @foreach ($produk as $pr)
                            <tr>
                                <td>{{ $id++ }}</td>
                                <td>{{ $pr->NAMA_PRODUK }}</td>
                               
                                <td>Rp.{{number_format($pr->HARGA_PRODUK, 0, ',', '.')}}</td>
                               
                                
                                <td><!-- Button trigger modal -->

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$pr->PRODUK_ID}}">
                                <i class="fas fa-eye"></i></button>
                                    <a href="{{ url('produk/edit/'. $pr->PRODUK_ID)}}"><button
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#exampleModal1{{ $pr->PRODUK_ID }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <div class="modal fade" id="exampleModal{{$pr->PRODUK_ID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">    
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title fs-5" id="exampleModalLabel">Detail Produk</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-8 mx-auto">
                                                    @if(empty($pr->GAMBAR_PRODUK))
                                                    <img src="{{asset('admin/img/nophoto.jpeg')}}" alt="" class="img-fluid" style="aspect-ratio: 1/1; object-fit: cover;">
                                                    @else
                                                    <img src="{{asset('storage/'.$pr->GAMBAR_PRODUK)}}" alt="" class="img-fluid" style="aspect-ratio: 1/1; object-fit: cover;">
                                                    @endif
                                                </div>
                                               <div class="col-12">
                                                <table>
                                                    <tr>
                                                        <td >Nama</td>
                                                        <td >{{ $pr->NAMA_PRODUK }}</td>
                                                    </tr>
                                                    <tr >
                                                        <td >Deskripsi</td>
                                                        <td>{{ $pr->DESKRIPSI }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga</td>
                                                        <td>Rp.{{number_format($pr->HARGA_PRODUK, 0, ',', '.')}}</td>
                                                    </tr>
                                                    
                                                </table>
                                               </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal1{{ $pr->PRODUK_ID }}" tabindex="-1" -->
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin Hapus Data {{ $pr->NAMA_PRODUK }} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <a href="{{ url('produk/delete/'. $pr->PRODUK_ID) }}"><button
                                                            type="button" class="btn btn-danger">Hapus</button></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection