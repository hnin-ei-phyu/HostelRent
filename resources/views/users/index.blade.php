@extends('layouts.admin')

@section('contents')

<div class="container py-3">
    <div class="row" class="d-flex content-align-center">
        <div class="col"> {{$users->links()}} </div>
        <div class="col d-flex justify-content-end">
            <form action="{{route('users.search')}}" method="post">
                @csrf
                <input type="text" name="search" id="">
                <button><i class="fa fa-search"></i> Search </button>
            </form>
         </div>
    </div>
</div>

<div class="container py-3">
    
    <table class="table table-striped">
        <tr>
            <td>UserName</td>
            <td>UserEmail</td>
            <td>UserPhone</td>
            <td>UserAddress</td>
            <td>UserType</td>
            <td>SwitchUserType</td>
          
            <td> Actions </td>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->user_type}}</td>
            <td>
            <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning"><i class="fa fa-refresh" style="color: blue"></i> switch </a>
                &nbsp;
            </td>
            <td>
                <form action="{{route('users.destroy',$user->id)}}" method="post">
                  @csrf 
                  @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button>
                  </form>
            </td>
        </tr>

        @endforeach
        
       
    </table>
 
</div>

<div class="container">
    {{$users->links()}}
</div>



@endsection('contents')
