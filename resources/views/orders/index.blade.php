@extends('layouts.main')


@section('content')
    <div class="container">
        <h1 class="text-center">Order List</h1>
        @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="20%">Name</th>
                    <th width="20%">Telephone</th>
                    <th width="10%">Amount</th>
                    <th width="10%">Status</th>
                    <th width="10%">Change status</th>

                </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>
                                {{$order->tel}}
                            </td>
                            <td>
                                {{$order->amount}}
                            </td>
                            <td>
                                {{$order->status}}
                            </td>
                            @if ($order->status == 3)
                                <td>Not to change anymore.</td>
                            @else
                            @if($order->status < 1)
                                @if(Auth::user()->isAdmin())
                                <td>
                                <a class="" href="{{route('orders.edit',['order' => $order->id])}}"><button class="btn btn-warning">Change status</button></a>
                                </td>
                                @else
                                <td>Not allowed.</td>
                                @endif
                            @else
                            <td>
                                <a class="" href="{{route('orders.edit',['order' => $order->id])}}"><button class="btn btn-warning">Change status</button></a>
                            </td>
                            @endif
                               
                            @endif

                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
        <div class="card-deck" >
                        <div class="card" >
                            <div class="card-header">
                                Status :
                            </div>
                            <div class="card-body">
                                <p>0 = มีการสั่งสื้อสินค้า </p> 
                                <p>1 = อนุมัติ </p>
                                <p>2 = เบิกของและแจ้งว่าลูกค้าให้จ่ายเงิน</p>
                                <p>3 = ส่งสินค้าเรียบร้อย</p>
                            </div>
                        </div>
                        <br>
            </div>
    </div>
@endsection
