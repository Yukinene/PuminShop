@extends('layouts.main')


@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if (Auth::check())
        <div class="container text-center">
            <div class="row justify-content-center">
                <h1 >Welcome {{ Auth::user()->name }}</h1>
            </div>
        </div>
    @else
        <div class="container text-center">
            <div class="row justify-content-center">
                <h1 >Welcome to PuminShop</h1>
            </div>
        </div>
        <hr>

        <p class="lead">Where are food among you want. <br>
            Please See Our Product to purchase.
        </p>

    @endif

@endsection
