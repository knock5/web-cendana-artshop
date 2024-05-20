@extends('user.template.appuser')

@section('title', 'Halaman Profile')
@section('image', asset('user/images/2.png'))
@section('body', 'sub_page')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<section class="food_section layout_padding  ">
    <div class="container">
        <div class="heading_container heading_center ">
            <h2 class="text-white ">
               Detail profile anda
            </h2>
        </div>
        <div class="row">
        <div class="col-6 mt-3 mx-auto">
        <table bgcolor="white" class="table table-bordered rounded">
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

</section>
@endsection