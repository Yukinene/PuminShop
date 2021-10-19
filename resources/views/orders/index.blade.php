@extends('layouts.main')


@section('content')
    <div class="container">
        <h1 class="text-center">Order List</h1>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="20%">Name</th>
                    <th width="20%">Telephone</th>
                    <th width="10%">Amount</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>
                                {{$order->tel}}
                            </td>
                            <td>{{$order->amount}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
