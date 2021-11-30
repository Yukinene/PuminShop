@extends('layouts.main')


@section('content')
    <h1>Add Employee :</h1>
    <hr>
    <div class="container">
        <form action="{{  route('users.store')  }}" method = "POST">
            @csrf
            <div><label for="">Name :</label>
            <input type="text" name="name"
                       class="w-full border p-2"
                       placeholder="Employee Name" autocomplete="off"></div>
            <div><label for="">Mail :</label>
            <input type="email" name="mail"
                       class="w-full border p-2"
                       placeholder="Employee mail" autocomplete="off"></div>
            <div><label for="">Password :</label>
            <input type="password" name="pwd"
                       class="w-full border p-2"
                       placeholder="Employee password" autocomplete="off"></div>
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
