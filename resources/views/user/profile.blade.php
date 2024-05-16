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
        <div class="col-12 mt-3">
        <div class="card">
                        <div class="card-body">
                            <form action="{{url('admin/profile/'.$user->id)}}" method="post" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}"  readonly required autocomplete="name">
                                        
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email',$user->email)}}" readonly>
                                       
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" value="{{$user->ALAMAT}}" readonly >
                                     
                                    </div>
                                </div>
                              
                            </form>
                        </div>
                    </div>
        </div>
    </div>

</section>
@endsection