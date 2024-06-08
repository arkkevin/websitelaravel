@extends('layouts.app')

@section('content')
<style>
    body{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgb(0, 0, 0) 0%, rgb(236, 7, 7) 100%);
    }
    .card{
        background: rgb(255,255,255,0.7);
    }
</style>
<div class="container">
    <div class="row mb-2">
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-2">
                    <li class="breadcrumb-item text-light"><a href="{{ url('home') }}" class="text-light text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List Laptop</li>
                </ol>
            </nav>
        </div>
    </div>
        <div class="col-md-3">
            <form action="{{ url('/product/search')}}" class="d-flex text-truncate  ">
                <input type="search" class="form-control me-2" placeholder="Search" aria-label="search" name="search">
                <button class="btn btn-outline-light bi bi-search" type="submit"></button>
            </form>
        </div>
    </div>
    <section class="products mb-5">
        <div class="row mt-4">
            @foreach($barangs as $barang)
            <div class="col-md-3 mb-3 card-group">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('img/'.$barang->images) }}" style="max-height:150px"  class="img-fluid ">
                        <div class="row mt-2">
                            <div class="col-md-12 ">
                                <h5><strong class="d-inline-block text-truncate" style="max-width: 200px;">
                                    {{ $barang->namabarang }}
                                  </strong> </h5>
                                <h5>Rp. {{ number_format($barang->harga) }}</h5>
                            </div>
                        </div>
                        <div class="row align-items-end mt-2">
                            <div class="col-md-12 ">
                                <a href="{{ url('barang') }}/{{ $barang->id }}" class="btn btn-outline-dark"><i class="bi bi-eye"></i> Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

            <div class="d-flex justify-content-center">
                <p class="bg-light">{{ $barangs->links() }}</p>
            </div>
    </section>
 @endsection
