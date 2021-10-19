@extends('layouts.main')


@section('content')
    <div class="container">
        <h1 class="text-center">Product</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <div class="row">
            <div class="card-deck" >
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="card" >
                            <div class="card-header">
                                {{$product->name}}<br>
                                <span class="float-right">฿{{$product->price}}</span>
                            </div>
                            <div class="card-body">
                                <p>{!! $product->description !!}</p>
                            </div>
                            @if (Auth::check())
                                <div class="card-footer">
                                    <a class="" href="{{route('products.edit',['product' => $product->id])}}"><button class="btn btn-warning">Edit Product</button></a>
                                    <br><br>
                                    <form action="{{ route('products.destroy',['product'=>$product->id])  }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete Product</button>
                                    </form>
                                </div>
                            @else
                                <div class="card-footer">
                                    <a
                                        href="{{route('add-cart', [$product->id])}}"
                                        class="btn btn-success btn-block"
                                    >Add To Cart</a>
                                </div>
                            @endif
                        </div>
                        <br>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
