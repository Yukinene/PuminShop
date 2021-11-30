@extends('layouts.main')

@section('content')
    <h1>Edit Order : {{$order->id}}</h1>
    <hr>
    <label for="">Name : {{$order->name}}</label><br>
    <label for="">Telephone : {{$order->tel}}</label><br>
    <label for="">Address : {{$order->address}}</label><br>
    <form action="{{  route('orders.update',['order'=>$order->id])  }}" method = "POST">
        @csrf
        @method('PUT')
        
        <label for="">Status : </label>
        <input type="number" name="status" id="status" 
        min = "{{ $order->status }}"
        value = "{{ $order->status }}"
        max = "3"
        >
        <br><br>
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
            </div>
        <br>
        <div>
            <button type="submit" class="btn btn-success" >Update Status</button>
        </div>
    </form>
    <br>
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
@endsection
