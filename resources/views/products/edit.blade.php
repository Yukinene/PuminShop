@extends('layouts.main')

@section('content')
    <h1>Edit Product : {{$product->name}}</h1>
    <hr>
    <form action="{{  route('products.update',['product'=>$product->id])  }}" method = "POST">
        @csrf
        @method('PUT')
        <div class="mt-4">
            <label for="name">Name</label><br>
            <input type="text" name="name"
                   class="w-full border p-2"
                   value = "{{ $product->name }}"
                   placeholder="Product Name" autocomplete="off">
        </div>
        <div class="mt-4">
            <label for="name">Description</label><br>
            <input type="text" name="description"
                   class="w-full border p-2"
                   value = "{{ $product->description }}"
                   placeholder="Description" autocomplete="off  ">
        </div>
        <div>
            <label for ="price">Price</label><br>
            <input type = "number"  name="price"
                   min = "1"
                   value = "{{ $product->price }}" >
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-success" >Edit Product</button>
        </div>
    </form>
    <br>
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
@endsection
