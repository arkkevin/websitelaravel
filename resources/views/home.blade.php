@extends('layouts.app')
@section('content')
<style>
    body{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(236,7,7,1) 100%);
    }
    .card{
        background: rgb(255,255,255,0.7);
    }
</style>
<div class="text-center mt-2" >
    <a href="{{ url('product') }}"><img src="{{ asset('img/banner.jpg') }}" style="max-height: 700px" alt=""></a>
 </div>
<div class="container">
    <section class="mt-4">
       <h3><p class="text-light">Pilih Brand</p></h3>
       <div class="row mt-4">
          @foreach($categories as $kategori)
          <div class="col">
             <a href="/categories/{{ $kategori->id }}">
                <div class="card shadow ">
                   <div class="card-body text-center opacity-10">
                      <img src="{{ asset('img/'.$kategori->images) }}" style="max-height: 100px" class="img-fluid">
                   </div>
                </div>
             </a>
          </div>
          @endforeach
       </div>
    </section>

    <section class="mt-5 mb-5">
       <h3>
          <p class="text-light">Best Products</p>
          <a href="/product" class="btn btn-outline-light"><span class="text-end"> Lihat Semua </span></a>
       </h3>
       <div class="row mt-4 ">
          @foreach($barangs as $barang)
          <div class="col-md-3">
             <div class="card outline">
                <div class="card-body text-center">
                   <img src="{{ asset('img/'.$barang->images) }}" style="max-height: 150px" class="img-fluid">
                   <div class="row mt-2">
                      <div class="col-md-12">
                         <h5><strong>{{ $barang->namabarang }}</strong> </h5>
                         <h5>Rp. {{ number_format($barang->harga) }}</h5>
                      </div>
                   </div>
                   <div class="row mt-2">
                      <div class="col-md-12">
                         <a href="{{ url('barang') }}/{{ $barang->id }}" class="btn btn-outline-dark"><i class="bi bi-eye"></i> Detail</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          @endforeach
       </div>
    </section>
 </div>
@endsection
