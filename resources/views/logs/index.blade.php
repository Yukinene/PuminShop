@extends('layouts.main')


@section('content')
    <div class="container">
        <h1 class="text-center">Customer Log</h1>
        @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="10%">ID</th>
                    <th width="20%">Customer Name</th>
                    <th width="20%">Product Name</th>
                    <th width="20%">Product Amount</th>
                    

                </tr>
                </thead>
                <tbody>
                    @foreach($logs as $log)
                        <tr>
                            <td>
                                {{$log->orderid}}
                            </td>
                            <td>
                                {{$log->name}}
                            </td>
                            <td>
                                {{$log->pname}}
                            </td>
                            <td>
                                {{$log->amount}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr>
    </div>
@endsection
