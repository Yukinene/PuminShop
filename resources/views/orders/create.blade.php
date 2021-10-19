@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="text-center">Order Payment</h1>
        <br>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="50%">Product</th>
                    <th width="10%">Price</th>
                    <th width="8%">Quantity</th>
                    <th width="22%">Sub Total</th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $product)
                        @php
                            $sub_total = $product['price'] * $product['quantity'];
                            $total += $sub_total;
                        @endphp
                        <tr>
                            <td>
                                <span>{{$product['name']}}</span>
                            </td>
                            <td>฿{{$product['price']}}</td>
                            <td>
                                <span>{{$product['quantity']}}</span>
                            </td>
                            <td>฿{{$sub_total}}</td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td><strong>Total ฿{{$total}}</strong></td>
                </tr>
                </tfoot>
            </table>
            <p>Please inform infomation to proceed</p>
            <hr>
            <form action="{{  route('orders.store')  }}" method = "POST">
                @csrf
                <div class="mt-4">
                    <label for="name">Name</label><br>
                    <input type="text" name="name"
                           value="{{ old('name') }}"
                           class="w-full border p-2 "
                           placeholder="Your Name" autocomplete="off">
                </div>
                <div class="mt-4">
                    <label for="name">Telephone</label><br>
                    <input type="text" name="tel"
                           value="{{ old('tel') }}"
                           class="w-full border p-2"
                           placeholder="Telephone" autocomplete="off">
                </div>
                <div>
                    <label for ="address">Address</label><br>
                    <textarea name="address"
                              id="address"
                              class="w-full border p-2"
                              value = ""
                              rows="5">
                    </textarea>
                </div>
                <div>
                    <input type="hidden" name="amount" value="{{$total}}">
                </div>
                <div>
                    <button type="submit" class="btn btn-success" >pay</button>
                </div>
            </form>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
        </div>

    </div>

@endsection
