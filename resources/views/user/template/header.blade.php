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
              <span class="badge badge-pill badge-info">2</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right " style="width: 350px; margin:auto;">
          <div class="row mx-auto">
            <div class="col-sm-12 total-section text-right">
              <p>total : <span>Rp.1000</span></p>
            </div>
          <hr style="border-top: 8px solid black;">
           <div class="col-4 ">
              <img src="{{asset('user/images/2.png')}}" alt="" width="100px " style="aspect-ratio: 1/1">
             
            </div>
            <div class="col-8 ">
            <p>pakaian</p>
              <span class="price text-info">Rp.1000</span>
              <span class="count">jumlah : 1</span>

            </div>
          
            <div class="col-sm-12 text-center">
              <a href="" class="btn btn-primary" type="button">view all</a>
            </div>
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
                <a class="nav-link" href="{{url('cart')}}">Menu</a>
              </li>
              <li class="nav-item @yield('tentang')">
                <a class="nav-link" href="about.html">Tentang</a>
              </li>
             
            </ul>
            <div class="user_option">
              <a href="" class="user_link">
                <i class="fa fa-user" aria-hidden="true"></i>
              </a>
              </div>
              <div class="user_option d-none d-xl-block ">
              <div class="">
              <a class="cart_link" href="" type="button " data-toggle="dropdown">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span class="badge badge-pill badge-info">2</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right " style="width: 350px; margin:auto;">
          <div class="row mx-auto">
            <div class="col-sm-12 total-section text-right">
              <p>total : <span>Rp.1000</span></p>
            </div>
          <hr style="border-top: 8px solid black;">
           <div class="col-sm-4 cart-detail-img">
              <img src="{{asset('user/images/2.png')}}" alt="" width="100px " style="aspect-ratio: 1/1">
             
            </div>
            <div class="col-sm-8 cart-detail-product">
            <p>pakaian</p>
              <span class="price text-info">Rp.1000</span>
              <span class="count">jumlah : 1</span>

            </div>
          
            <div class="col-sm-12 text-center">
              <a href="" class="btn btn-primary" type="button">view all</a>
            </div>
          </div>
               </div>
              </div>
              </div>
              </div>
             
        </nav>
      </div>
    
    </header>
  