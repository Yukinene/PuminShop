@extends('layouts.main')


@section('content')
    <div class="container">
        <h1 class="text-center">Employee List</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="20%">Name</th>
                    <th width="20%">Mail</th>
                    <th width="20%">Role</th>
                    <th width="20%">Delete user</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                {{$user->role}}
                            </td>
                            @if($user->role === "ADMIN")
                            <td>Cannot delete ADMIN</td>
                            @else
                            <td>
                            <form action="{{ route('users.destroy',['user'=>$user->id])  }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete User</button>
                                    </form>
                            </td>
                            @endif
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <a href="{{route('users.create')}}"
                           class="btn btn-success" width="20%"
                        >Add more Employee</a>
    </div>
@endsection
