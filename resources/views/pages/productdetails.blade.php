@extends('layouts.app')

@section('content')
<style>
    body{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgb(0, 0, 0) 0%, rgba(236,7,7,1) 100%);
    }
    .card{
        background: rgb(255,255,255,0.7);
    }

</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-dark"><a href="{{ url('home') }}"class="text-light text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light"><a href="/product"class="text-light text-decoration-none">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('img/'.$barang->images) }}" class="rounded mx-auto d-block" width="100%" alt="">
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $barang->namabarang }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Category</td>
                                        <td>:</td>
                                        <td> <img src="{{ url('img/'.$barang->category->images)  }}" class="img-fluid"
                                            width="50"></td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($barang->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stock</td>
                                        <td>:</td>
                                        <td>{{ number_format($barang->stok) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>:</td>
                                        <td>{{ $barang->keterangan }}</td>
                                    </tr>

                                    @auth
                                    @if (Auth::user()->level == 'admin')

                                    @endif
                                    @if (Auth::user()->level == 'member')
                                    <tr>
                                        <td>Quantity</td>
                                        <td>:</td>
                                        <td>
                                             <form method="post" action="{{ url('barang') }}/{{ $barang->id }}" >
                                            @csrf
                                            <input type="number" min="0" step="1" class="form-control col-md-2" name="jumlah_pesan" id="amountInput">
                                                <div class="form-group mt-3 text-center">
                                                    <button type="submit" class="btn btn-outline-primary col-md-4 ">
                                                        <span class="bi bi-cart2 mt-2">  Add to Cart</span>
                                                    </button>
                                                </div>

                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                    @endauth
                                    @guest


                                             <form method="post" action="{{ url('barang') }}/{{ $barang->id }}" >
                                            @csrf
                                                <button type="submit" class="btn btn-outline-primary mt-2"><i class="bi bi-box-arrow-in-right"></i>  Login to buy</button>
                                            </form>

                                    @endguest



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
