<footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              Feane
            </a>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
            </p>
            <div class="footer_social">
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
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a><br><br>
          
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