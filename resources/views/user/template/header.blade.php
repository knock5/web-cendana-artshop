@php
use Illuminate\Support\Facades\Auth;
use App\Models\keranjang;
use App\Models\KeranjangItem;
use App\Models\Produk;
if(Auth::check()){

$id = Auth::user()->USER_ID;
$cart = keranjang::where('USER_ID', $id)->where('status','belum')->first();
if($cart !== null){
        $idCart = $cart->ID_KERANJANG;
        $data = KeranjangItem::where('ID_KERANJANG',$idCart)->get();
    } else {
        // $cart null, berikan nilai default untuk $data
        $data = [];
    }
}else{
  $data = [];
}
@endphp

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{asset('user/images/favicon.png')}}" type="">

  <title>@yield('title')</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('user/css/bootstrap.css')}}" />

  <!--owl slider stylesheet -->
  
  <!-- font awesome style -->
  <link href="{{asset('user/css/font-awesome.min.css')}}" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{asset('user/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('user/css/responsive.css')}}" rel="stylesheet" />


</head>

<body class="@yield('body')">
@include('sweetalert::alert')
  <div class="hero_area">
    <div class="bg-box">
      <img src="@yield('image')" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="#">
            <span >
             CendanaArtshop
            </span>
          </a>
          
          <div class=" mb-2 d-xl-none">
          <div class="user_option ">
              <div class="">
              <a class="cart_link" href="" type="button " data-toggle="dropdown">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              @auth
              <span class="badge badge-pill badge-info">{{count($data) ?? 0}}</span>
              @else
              <span class="badge badge-pill badge-info"></span>
              @endauth
              </a>
              <div class="dropdown-menu dropdown-menu-right " >
          <div class="row mx-auto"style="width: 320px; margin:auto; overflow-y: auto; max-height: 300px;">
            <div class="col-sm-12 total-section text-right">
            <p>total : <span id="totalHarga1"></span></p>
            </div>
          
          @foreach($data as $dt)
           <div class="col-4 mt-3 cart-detail-img">
            @if(empty($dt->Product->GAMBAR_PRODUK))
              <img src="{{asset('admin/img/nophoto.jpeg')}}" alt="" width="100px " style="aspect-ratio: 1/1">
            @else
              <img src="{{asset('storage/'.$dt->Product->GAMBAR_PRODUK)}}" alt="" width="100px " style="aspect-ratio: 1/1">
             @endif
            </div>
            <div class="col-8 mt-4 ms-2 cart-detail-product">
            <p>{{$dt->Product->NAMA_PRODUK}}</p>
              <span class="price harga text-info">
              Rp.{{number_format($dt->Product->HARGA_PRODUK, 0, ',', '.')}} 
              
</span>
              <span class="count jumlah">jumlah : {{$dt->JUMLAH}}</span>

            </div>
          @endforeach
            
          </div>
          <div class="col-sm-12 text-center">
              <a href="{{url('showCart')}}" class="btn btn-primary" type="button">view all</a>
            </div>
               </div>
              </div>
              </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item @yield('home')">
                <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
              </li>
            
              <li class="nav-item @yield('menu')" >
                <a class="nav-link" href="{{url('cart')}}">Produk</a>
              </li>
             
              <li class="nav-item @yield('tentang')">
                <a class="nav-link" href="{{url('tentang')}}">Tentang</a>
              </li>
             
            </ul>
            <div class="user_option">
              <a href="" class="user_link" type="button" data-toggle="dropdown">
                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" style=" margin:auto;">
              <div class="row mx-auto"> 
            <div class="col-sm-12">
              @auth
              <a class="dropdown-item " href="{{ url('profile') }}" >
              Profile
            </a>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
              <i class="bi bi-box-arrow-right"></i>
              {{__('Sign Out')}}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
            @else
            <a class="dropdown-item " href="{{ url('login') }}" >
              Login
            </a>
            @endauth
            </div>
           
              </div>
              </div>
              <div class="user_option d-none d-xl-block ">
              <div class="">
              <a class="cart_link" href="" type="button " data-toggle="dropdown">
              <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
              @auth
              <span class="badge badge-pill badge-info">{{count($data) ?? 0}}</span>
              @else
              <span class="badge badge-pill badge-info"></span>
              @endauth
              </a>
              <div class="dropdown-menu dropdown-menu-right ">
          <div class="row mx-auto"  style="width: 350px; margin:auto; overflow-y: auto; max-height: 300px;">
            <div class="col-sm-12 total-section text-right">
              <p>total : <span id="totalHarga"></span></p>
            </div>
         
          @foreach($data as $dt)
           <div class="col-sm-4 mt-3 cart-detail-img">
            @if(empty($dt->Product->GAMBAR_PRODUK))
              <img src="{{asset('admin/img/nophoto.jpeg')}}" alt="" width="100px " style="aspect-ratio: 1/1">
            @else
              <img src="{{asset('storage/'.$dt->Product->GAMBAR_PRODUK)}}" alt="" width="100px " style="aspect-ratio: 1/1">
             @endif
            </div>
            <div class="col-sm-8 mt-4 cart-detail-product">
            <p>{{$dt->Product->NAMA_PRODUK}}</p>
              <span class="price text-info">
              Rp.{{number_format($dt->Product->HARGA_PRODUK, 0, ',', '.')}} 
              
</span>
              <span class="count">jumlah : {{$dt->JUMLAH}}</span>

            </div>
          @endforeach
         
          </div>
          <div class="col-sm-12 mt-2 text-center">
              <a href="{{url('showCart')}}" class="btn btn-primary" type="button">view all</a>
            </div>
               </div>
              </div>
              </div>
              </div>
             
        </nav>
      </div>
    
    </header>
  