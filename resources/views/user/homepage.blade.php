@extends('user.template.appuser')

@section('title', 'Dashboard - TrackMyShipment')

@section('content')
<!-- <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Fast Food Restaurant
                    </h1>
                    <p>
                      Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
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
                  <div class="detail-box">
                    <h1>
                      Fast Food Restaurant
                    </h1>
                    <p>
                      Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
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
                    <h1>
                      Fast Food Restaurant
                    </h1>
                    <p>
                      Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
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
</section> -->
    </section>
    <section class="section swiper-container swiper-slider swiper-slider-2 swiper-slider-3" data-loop="true" data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
     <div class="swiper-wrapper text-sm-left">
         <div class="swiper-slide context-dark" data-slide-bg="{{asset('user/images/hero-bg.jpg')}}">
             <div class="swiper-slide-caption section-md">
                 <div class="container">
                     <div class="row">
                         <div class="col-sm-9 col-md-8 col-lg-7 col-xl-7 offset-lg-1 offset-xxl-0">
                             <h1 class="oh swiper-title"><span class="d-inline-block" data-caption-animate="slideInUp" data-caption-delay="0">Makanan Lezat</span></h1>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="swiper-slide context-dark" data-slide-bg="{{asset('user/images/o2.jpg')}}">
             <div class="swiper-slide-caption section-md">
                 <div class="container">
                     <div class="row">
                         <div class="col-sm-8 col-lg-7 offset-lg-1 offset-xxl-0">
                             <h1 class="oh swiper-title"><span class="d-inline-block" data-caption-animate="slideInDown" data-caption-delay="0">Bergizi</span></h1>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Swiper Pagination-->
     <div class="swiper-pagination" data-bullet-custom="true"></div>
     <!-- Swiper Navigation-->
     <div class="swiper-button-prev">
         <div class="preview">
             <div class="preview__img"></div>
         </div>
         <div class="swiper-button-arrow"></div>
     </div>
     <div class="swiper-button-next">
         <div class="swiper-button-arrow"></div>
         <div class="preview">
             <div class="preview__img"></div>
         </div>
     </div>
 </section>
@endsection