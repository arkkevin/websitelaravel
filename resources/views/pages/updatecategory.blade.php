@extends('layout')

@section('content')
    @if (@session('success'))
        <div class="alert alert-success" role="alert">
            <strong> Data has been save</strong>
        </div>
    @endif
    <div class="row">
        <div class="col-4">
            <img src="{{ asset('storage/' . $book->photo) }}" alt="cover buku">
        </div>
        <div class = "col-8">
            <form action="{{ route('book.update', ['book' =>$book->id]) }}"method="POST" enctype="multipart/form-data">

                @csrf
                @method("PUT")
                <div class="row">
                    <div class="col">
                        <div class="form-grup">
                            <label for="genre">Genre</label>
                            <select class="form-control" name="genre_id" id="">
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" @selected(old('genre_id', $book->genre_id) == $genre->id)>{{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('genre_id')
                                <div class="alert alert-danger">
                                    <strong> {{ $message }} </strong>
                                </div>
                            @enderror

                        </div>
                        <div class="form-grup">
                            <label for="name">Name</label>
                            <input type = "text" class="form-control" name="name" id=""
                                value="{{ old('name', $book->name)}}">
                            @error('name')
                                <div class="alert alert-danger">
                                    <strong> {{ $message }} </strong>
                                </div>
                            @enderror
                        </div>


                        <div class="form-grup">
                            <label for="description">Description</label>

                            <textarea class="form-control" name="description" id="" rows="" value="{{ old('description', $book->description) }}"></textarea>
                            @error('description')
                                <div class="alert alert-danger">
                                    <strong> {{ $message }} </strong>
                                </div>
                            @enderror
                        </div>

                            @enderror
                        </div>

                        <button type="submit" class= "btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    @endsection
