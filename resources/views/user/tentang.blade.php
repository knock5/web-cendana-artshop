@extends('user.template.appuser')

@section('title', 'Halaman Tentang Kami')
@section('image', asset('user/images/2.png'))
@section('tentang', 'active')
@section('body', 'sub_page')
@section('content')
<style>
    p{
        color: white;
        text-align: justify;
    }
</style>
<section class="food_section layout_padding  ">
<div class="container">
<div class="heading_container heading_center ">
    <h2 class="text-white">
        Tentang Kami
    </h2>
</div>
<div class="row">
    <div class="col-md-6 mt-3">
        <h2 class="text-white">Cerita Kami</h2>
        <p>CendanaArshop lahir dari hasrat kami untuk membangun sebuah fasilitas seni yang bermanfaat. Berawal dari cinta kami terhadap seni lukis dan keinginan untuk memfasilitasi akses yang lebih mudah terhadap alat-alat seni berkualitas, kami memutuskan untuk memulai perjalanan kami di dunia seni.</p>

    </div>
    <div class="col-md-6 mt-3">
    <h2 class="text-white">Visi & Misi</h2>
    <p>Visi kami adalah menjadi destinasi utama bagi seniman dan pecinta seni, yang memberikan alat yang diperlukan untuk mewujudkan karya seni terbaik mereka. Misi kami adalah menyediakan produk seni berkualitas tinggi dengan harga terjangkau, mempromosikan seni lokal, dan mendukung pertumbuhan komunitas seni yang inklusif dan beragam.</p>
    </div>

</div>

</div>
</section>
@endsection