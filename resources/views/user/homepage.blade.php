@extends('user.template.appuser')

@section('title', 'Homepage')
@section('image', asset('user/images/4.png'))
@section('home', 'active')
@section('content')
<section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box" >
                  <div style="background-color: rgba(0, 0, 0, 0.6); padding: 15px; border-radius: 10px">

                
                    <h1>
                    Lukisan: Cerminan Kreativitas
                    </h1>
                    <p>
                    Sambutlah Kekuatan Warna dan Sentuhan yang Membawa Keajaiban dengan Koleksi Seni Asli Kami.
                    </p>
                    </div>
                    <div class="btn-box">
                      <a href="{{url('cart')}}" class="btn1">
                        Pesan Sekarang
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box" >
                  <div style="background-color: rgba(0, 0, 0, 0.6); padding: 15px; border-radius: 10px">
                    <h1>
                    Kecantikan Abadi
                    </h1>
                    <p >
                    Temukan Karya Seni yang Membangkitkan Perasaan, Menjadi Pusat Perhatian, dan Menyinari Ruang Anda.
                    </p>
                  </div>
                    <div class="btn-box">
                    <a href="{{url('cart')}}" class="btn1">
                        Pesan Sekarang
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                  <div style="background-color: rgba(0, 0, 0, 0.6); padding: 15px; border-radius: 10px">
                    <h1>
                    Karya yang Memikat
                    </h1>
                    <p>
                    Dari Kanvas ke Dinding Anda: Dapatkan Koleksi Lukisan Berkualitas Tinggi, Dibuat dengan Cinta dan Kecantikan yang Abadi.
                    </p>
                  </div>
                    <div class="btn-box">
                    <a href="{{url('cart')}}" class="btn1">
                        Pesan Sekarang
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
            <li data-target="#customCarousel1" data-slide-to="2"></li>
          </ol>
        </div>
      </div>
      
</section>

    
@endsection