@extends('admin.template.appadmin')
@section('title', 'Data Laporan')
@section('content')
<div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-12 text-center mt-3">
                    <h3>Profile akun anda</h3>
                </div>
               
                <div class="col-lg-8 mt-3 mx-auto">
                 <table class="table table-bordered">
                  <thead>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                  </thead>
                  <tbody>
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->alamat}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                  </tbody>
                 </table>
               
                </div>
            </div>
        </div>
    </div>
@endsection