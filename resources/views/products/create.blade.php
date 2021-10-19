@extends('layouts.main')


@section('content')
    <h1>Add Product :</h1>
    <hr>
    <div class="container">
        <form action="{{  route('products.store')  }}" method = "POST">
            @csrf
            <div class="mt-4">
                <label for="name">Name</label><br>
                <input type="text" name="name"
                       class="w-full border p-2"
                       placeholder="Product Name" autocomplete="off">
            </div>
            <div class="mt-4">
                <label for="name">Description</label><br>
                <input type="text" name="description"
                       class="w-full border p-2"
                       placeholder="Description" autocomplete="off">
            </div>
            <div>
                <label for ="price">Price</label><br>
                <input type = "number"
                       min = "1"
                       value="1"
                       name="price" >
            </div>

            <br>
            <div>
                <button type="submit" class="btn btn-success" >Add</button>
            </div>
        </form>
        <br>
        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
    </div>
@endsection
