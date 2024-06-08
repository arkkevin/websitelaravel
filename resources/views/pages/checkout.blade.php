@extends('layouts.app')
@section('content')
<style>
    body{
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(236,7,7,1) 100%);
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-light"><a href="{{ url('home') }}" class="text-light text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body shadow">
                    <h3><i class="bi bi-cart2"></i> Check Out</h3>
                    @if(!empty($pesanan))
                    <p class="text-end">Order Date : {{ $pesanan->tanggal }}</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanandetails as $detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ asset('img/'.$detail->barang->images) }}" width="100" alt="...">
                                </td>
                                <td>{{ $detail->barang->namabarang }}</td>
                                <td>{{ $detail->jumlah }} Pcs</td>
                                <td>Rp. {{ number_format($detail->barang->harga) }}</td>
                                <td>Rp. {{ number_format($detail->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('check-out') }}/{{ $detail->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5"><strong>Total Price :</strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-outline-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                                        <i class="bi bi-cart2"></i> Check Out
                                    </a>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                    <i class="text-center"> <span class="text-danger ">*</span> Please Insert Address and Mobile Phone first <a href="/editprofile"><i>click here</i></a></i>
                    @endif



                </div>
            </div>
        </div>

    </div>
</div>
@if(empty($pesanan))
        <div class="text-center mt-5">
       <h4> <i class="text-light"> Great Your Checkout is already done </i> </h4>
         </div>
     @endif
@endsection
