@extends('layouts.main')

@section('content')
    <h1>Edit Product : {{$product->name}}</h1>
    <hr>
    <form action="{{  route('products.update',['product'=>$product->id])  }}" method = "POST">
        @csrf
        @method('PUT')
        @if (Auth::user()->isAdmin())
        <div class="mt-4">
            <label for="name">Name</label><br>
            <input type="text" name="name"
                   class="w-full border p-2"
                   value = "{{ $product->name }}"
                   placeholder="Product Name" autocomplete="off">
        </div>
        <div class="mt-4">
            <label for="name">Description</label><br>
            <textarea name="description"
                              id="description"
                              class="w-full border p-2"
                              value = "{{ $product->description }}"
                              rows="5">
                    </textarea>
        </div>
        <div>
            <label for ="price">Price</label><br>
            <input type = "number"  name="price"
                   min = "1"
                   value = "{{ $product->price }}" >
        </div>
        @else
        <div class="mt-4">
            <label for="name">Name : {{ $product->name }}</label><br>
            <input type="hidden" name="name" value = "{{ $product->name }}">
        </div>
        <div class="mt-4">
            <label for="name">Description : {{$product->description}}</label><br>
            <input type="hidden" name="description" value="{{$product->description}}">
        </div>
        <div>
            <label for ="price">Price : {{ $product->price }}</label><br>
            <input type = "hidden"  name="price" value = "{{ $product->price }}" >
        </div>
        @endif
        <div>
            <label for ="amount">Amount</label><br>
            <input type = "number"  name="amount"
                   min = "1"
                   value = "{{ $product->amount }}" >
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
