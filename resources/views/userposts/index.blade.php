@extends('layouts.admin')

@section('contents')

<div class="container py-3">
    <div class="row" class="d-flex content-align-center">
        <div class="col"> {{$userposts->links()}} </div>
        <div class="col d-flex justify-content-end">
            <form action="{{route('userposts.search')}}" method="post">
                @csrf
                <input type="text" name="search" id="">
                <button type="submit"><i class="fa fa-search"></i> Search </button>
            </form>
         </div>
    </div>
</div>

<div class="container py-3">
    
    <table class="table table-striped">
        <tr>
            <td>User Id</td>
            <td>User Name</td>
            <td>Category </td>
            <td>Posted date</td>
          
            <td> Actions </td>
        </tr>
        @foreach($userposts as $userpost)
        <tr>
            <td>{{$userpost->tenant_id}}</td>
            <td>{{$userpost->username}}</td>
            <td>{{$userpost->category}}</td>
            <td>{{$userpost->post_date}}</td>
          
            <td class="d-flex content-align-center"> 
                  <a href="{{route('userposts.show',$userpost->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Details </a>
                  &nbsp;&nbsp;
                  <form action="#" method="post">
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
    {{$userposts->links()}}
</div>



@endsection('contents')
