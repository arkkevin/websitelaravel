@extends('layouts.app')

@section('content')

<h1 class="text-center mb-10">Update Item</h1>
    <div class="container ">
        <div class="row justify-content-center">

         <div class="col-6">
            <div class="card">
                <div class="card-body">
                    @if ($category->count() > 0)
                        <ul class="list-group mt-3">
                            @foreach ($category as $category)
                                <li class="list-group-item">
                                    <a href="{{ route('categoryshow', $category) }}">{{ $category->name }} </a>
                                    <p>{{ $category->desription }} </p>
                                </li>
                                @auth
                                    @if(Auth::user()->level == 'admin')
                                    <button type="button" href="{{ route('/item') }}">See Products</button>
                                    <button type="button" href="{{ route('/deletecategory') }}">Delete Category</button>
                                    <button type="button" href="{{ route('/updatecategory') }}">Edit Category</button>
                                @endauth
                                <button type="button" href="{{ route('/item') }}">See Products</button>
                            @endforeach

                    @endif
                </div>
            </div>
         </div>
        </div>
    </div>
@endsection
