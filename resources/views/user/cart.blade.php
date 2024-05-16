@extends('user.template.appuser')

@section('title', 'Keranjang Anda')
@section('image', asset('user/images/2.png'))
@section('body', 'sub_page')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    table{
        border-radius: 10px 10px 10px 10px;
        background-color: #AF8F6F;
        border: 1px solid black;
    }
    td{
        border: 1px solid black;
        padding: 5px;
        font-weight: bold;
        color: black;
    }
</style>
<section class="food_section layout_padding  ">
    <div class="container-fluid">
      <div class="heading_container heading_center ">
      @if(empty($data))
        <h2 class="text-white">
        Tidak ada Produk Dalam Keranjang
        </h2>
      </div>
      @else
      <h2 class="text-white">
          Keranjang Anda
        </h2>
      </div>
      <div class="row bg-white ">
        <div class=" col-12 mt-3 table-responsive">
            <table class="table table-hover rounded" >
                <thead>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>jumlah</th>
                </thead>
                <tbody>
                    @foreach ($data as $kr)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td> @if(empty($kr->Product->GAMBAR_PRODUK))
                                                    <img src="{{asset('admin/img/nophoto.jpeg')}}" alt="" width="200px">
                                                    @else
                                                    <img src="{{asset('storage/'.$kr->Product->GAMBAR_PRODUK)}}" alt="" width="200px">
                                                    @endif</td>
                        <td>{{$kr->Product->NAMA_PRODUK}}</td>
                        <td class="price1">{{$kr->Product->HARGA_PRODUK}}</td>
                        <td><input class="count1" type="number" id="jumlah_barang_{{$kr->ITEM_ID}}" value="{{$kr->JUMLAH}}" onchange="updateJumlah({{$kr->ITEM_ID}})" ></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">Total Harga :</td>
                        <td colspan="3" id="totalHarga2"></td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="5"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
Pesan Sekarang
</button></td>
                    </tr>
                </tbody>
            </table>

        </div>
       
      
        
       </div>

      </div>
    
     
      @endif
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">Form pembayaran</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{url('/pembayaran')}}" method="post" enctype="multipart/form-data">
  @csrf
          <div class="row g-4">
            <div class="col-12">
              <div class="rounded h-100 p-4">
                <!-- input pertama -->
                <div>
                <input type="hidden" name="total" id="totalHarga3">
                </div>
                
                <div class="form-floating mb-3">
  <input type="text" class="form-control" name="alamat" id="floatingInput" placeholder="name@example.com">
  <label for="floatingInput">Alamat tujuan</label>
</div>
<div class="form-floating">
  <select class="form-select" name="metode" id="floatingSelect" aria-label="Floating label select example">
    <option selected>----pilih metode ----</option>
    <option value="BRIVA">BRIVA</option>
    <option value="BNI">BNI</option>
    <option value="BCA">BCA</option>
  </select>
  <label for="floatingSelect">Metode Pembayaran</label>
</div>

          </div>
      </div>
      <div class="modal-footer">
       
        <button type="submit" name="proses"  class="btn btn-primary">bayar</button>
      </div>
      </form>
    </div>
  </div>
</div>
     

    </div>
</div>

  </section>
  <script>
    function updateJumlah(id) {
        var jumlah = $("#jumlah_barang_" + id).val(); // Ambil nilai input
        $.ajax({
            url: "/editCart/" + id, // URL untuk mengirim permintaan
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                jumlah: jumlah
            },
            success: function(response) {
                // Handle jika permintaan berhasil
                console.log(response);
            },
            error: function(xhr) {
                // Handle jika terjadi kesalahan
                console.log(xhr.responseText);
            }
        });
    }
    
            // Set nilai total harga ke dalam elemen HTML
            
    const prices1 = document.querySelectorAll('.price1');
    const counts1 = document.querySelectorAll('.count1');

    let totalHarga1 = 0;
   
    
    // Loop melalui setiap elemen dan tambahkan harga produk yang dihitung dengan jumlahnya ke total harga
    for (let i = 0; i < prices1.length; i++) {
        const harga1 = parseInt(prices1[i].innerText.replace('Rp.', '').replace('.', '').trim());
        const jumlahText1 = counts1[i].value;
        // const jumlah = parseInt(counts[i].value.replace('Jumlah :', '').trim()); 
        totalHarga1 += harga1 * jumlahText1;
        
    }

    // Set nilai total harga ke dalam elemen HTML
    document.getElementById("totalHarga2").innerText = "Rp." + totalHarga1.toLocaleString();
    document.getElementById("totalHarga3").value =  totalHarga1;
  
    
</script>

@endsection