@extends('layouts.admin')

@section('contents')


<!--search bar-->
<div class="container pt-3">
    <div class="row">
        <div class="col"> {{$leaserposts->links()}} </div>
        <div class="col d-flex justify-content-end">
            <form action="{{route('leaserposts.search')}}" method="post">
                @csrf
                <input type="text" name="search">
                <button><i class="fa fa-search"></i> Search </button>
            </form>
        </div>
    </div>
</div>
<!--search bar-->

<div class="container py-3"> 
    <table class="table table-striped">
        <tr>
            <td>Leaser Name</td>
            <td>Leaser Email</td>
            <td>Room Id</td>
            <td>Post Date</td>
            <td>Category</td>
            <td>RoomType</td>
            <td>Price</td>     
            <td>Details</td>
            <td>Delete</td>
        </tr>
        @foreach($leaserposts as $leaserpost)
        <tr>
            <td>{{$leaserpost->leasername}}</td>
            <td>{{$leaserpost->leaseremail}}</td>
            <td>{{$leaserpost->room_id}}</td>
            <td>{{$leaserpost->post_date}}</td>
            <td>{{$leaserpost->category}}</td>
            <td>{{$leaserpost->roomtype}}</td>
            <td>{{$leaserpost->price}}</td>
            <td><a href="{{route('leaserposts.show',$leaserpost->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a></td>
             <td>
                    <form action="{{route('leaserposts.destroy',$leaserpost->id)}}" method="post">
                    @csrf 
                    @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>  </button>
                   </form>
             </td>
        </tr>

        @endforeach
        
       
    </table>
</div>

<div class="container">
   {{$leaserposts->links()}}
</div>


@endsection('contents')
