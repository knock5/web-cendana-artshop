@extends('user.template.appuser')

@section('title', 'Menu')
@section('image', asset('user/images/2.png'))
@section('body', 'sub_page')
@section('menu', 'active')
@section('content')

<style>
  td{
    padding: 5px;
   
  }
</style>
<section class="food_section layout_padding position-relative ">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Daftar Menu
        </h2>
      </div>

     

      <div class="filters-content">
        <div class="row grid">
            @foreach ($produk as $row)
          <div class="col-sm-6 col-lg-4 all ">
            <div class="box">
              <div>
                <div class="img-box">
                @if(empty($row->GAMBAR_PRODUK))
                                                    <img src="{{asset('admin/img/nophoto.jpeg')}}" alt="" class="img-fluid"  >
                                                    @else
                                                    <img src="{{asset('storage/'.$row->GAMBAR_PRODUK)}}" alt="" class="img-fluid"  >
                                                    @endif
                </div>
                <div class="detail-box">
                  <h5>
                   {{$row->NAMA_PRODUK}}
                  </h5>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$row->PRODUK_ID}}">
                                Detail Produk</button>
                  <div class="options">
                    <h6>
                    Rp.{{number_format($row->HARGA_PRODUK, 0, ',', '.')}}
                    </h6>
                    @auth
                    <a href="{{url('addCart/'.$row->PRODUK_ID)}}">
                      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                          </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                      </svg>
                    </a>
                    @else
                    <a href="" id="link" data-id="{{ $row->PRODUK_ID }}">
                      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                        <g>
                          <g>
                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                         c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                         C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                         c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                         C457.728,97.71,450.56,86.958,439.296,84.91z" />
                          </g>
                        </g>
                        <g>
                          <g>
                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                         c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                          </g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                      </svg>
                    </a>
                  
                    @endauth

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="exampleModal{{$row->PRODUK_ID}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog">    
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title fs-5" id="exampleModalLabel">Detail Produk</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-8 mx-auto">
                                                    @if(empty($row->GAMBAR_PRODUK))
                                                    <img src="{{asset('admin/img/nophoto.jpeg')}}" alt="" class="img-fluid" style="aspect-ratio: 1/1; object-fit: cover;">
                                                    @else
                                                    <img src="{{asset('storage/'.$row->GAMBAR_PRODUK)}}" alt="" class="img-fluid" style="aspect-ratio: 1/1; object-fit: cover;">
                                                    @endif
                                                </div>
                                               <div class="col-12 mt-2">
                                                <table>
                                                    <tr>
                                                        <td >Nama</td>
                                                        <td>:</td>
                                                        <td >{{ $row->NAMA_PRODUK }}</td>
                                                    </tr>
                                                    <tr >
                                                        <td >Deskripsi</td>
                                                        <td>:</td>
                                                        <td>{{ $row->DESKRIPSI }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Harga</td>
                                                        <td>:</td>
                                                        <td>Rp.{{number_format($row->HARGA_PRODUK, 0, ',', '.')}}</td>
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
         
       @endforeach
          
          
          
       
          
        </div>
      
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

var links = document.querySelectorAll('#link');
    // Fungsi untuk menampilkan SweetAlert2 jika pengguna belum login
    function login() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Silahkan login terlebih dahulu untuk menambahkan produk ke keranjang belanja.',
        });
    }

    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            // Mencegah perilaku default dari anchor tag
            event.preventDefault();

            // Panggil fungsi login
            login();
        });
    });
   
</script>

@endsection