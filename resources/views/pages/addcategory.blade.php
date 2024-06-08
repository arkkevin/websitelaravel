@extends('layouts.app')

@section('content')
<h1 class="text-center mb-10">Insert Category </h1>
    <div class="container ">
        <div class="row justify-content-center">
         <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <form action="/categoryinserted" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 col-md-10">
                            <label for="exampleInputEmail1" class="form-label">Category Name</label>
                            <input type="text"name="namabarang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4 row">
                                <div class="form-group col-md-3">
                                  <label for="inputid">Category ID</label>
                                  <input type="text" class="form-control" id="inputid" name="itemid" value="">
                                </div>
                              </div>
                        <div class="mb-4 col-md-10">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <input type="text" name="keterangan"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          </div>
                        <button type="submit" class="btn btn-primary">Insert</button>
                      </form>
                </div>
            </div>
         </div>
        </div>
    </div>


@endsection
