<
<footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box ">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                Jl. Seni No. 123, Kota Seni, Indonesia
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                +62 123 4567
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                info@cendanaarshop.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
            CendanaArtshop
            </a>
            <p style="text-align: justify;">
            Selamat datang di CendanaArshop, destinasi bagi pencinta seni untuk inspirasi, kreativitas, dan produk berkualitas. Kami platform online untuk alat seni berkualitas dan mendukung komunitas seni lokal.
            </p>
            <!-- <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div> -->
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Tautan penting
          </h4>
        <ul class="list-unstyled ">
          <li><a style="text-decoration: none; color: white"  href="{{url('/')}}">Home </a></li>
          <li><a style="text-decoration: none; color: white"  href="{{url('cart')}}">Produk </a></li>
          <li><a style="text-decoration: none; color: white"  href="{{url('tentang')}}">Tentang </a></li>
        </ul>
         
        </div>
      </div>
      <div class="footer-info">
        <p style="text-align: center;">
          &copy; <span id="displayYear"></span> All Rights Reserved By
         
          
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="{{asset('user/js/jquery-3.4.1.min.js')}}"></script>
  <!-- popper js -->
  <!-- bootstrap js -->

    <script src="{{asset('user/js/bootstrap.bundle.js')}}"></script>
  <!-- owl slider -->

  <!-- custom js -->
  <script src="{{asset('user/js/custom.js')}}"></script>
  <!-- Google Map -->
  <!-- End Google Map -->

  <script src="{{asset('user/js/core.min.js')}}"></script>
<!-- <script src="{{asset('user/js/script.js')}}"></script> -->
<script>
            // Set nilai total harga ke dalam elemen HTML
            
           const prices = document.querySelectorAll('.harga');
    const counts = document.querySelectorAll('.jumlah');

    let totalHarga = 0;
    console.log(prices);
    // Loop melalui setiap elemen dan tambahkan harga produk yang dihitung dengan jumlahnya ke total harga
    for (let i = 0; i < prices.length; i++) {
        const harga = parseInt(prices[i].innerText.replace('Rp.', '').replace('.', '').trim());
        const jumlahText = counts[i].innerText;
const jumlah = parseInt(jumlahText.match(/\b1\b/)); 
        totalHarga += harga * jumlah;
        console.log(jumlah);
    }
    console.log(totalHarga);
    // Set nilai total harga ke dalam elemen HTML
    document.getElementById("totalHarga").innerText = "Rp." + totalHarga.toLocaleString();
    document.getElementById("totalHarga1").innerText = "Rp." + totalHarga.toLocaleString();
        </script>
</body>

</html>