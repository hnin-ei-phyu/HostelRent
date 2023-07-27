@extends('layouts.admin')

@section('contents')

<div class="container py-3">
    <a href="{{route('rooms.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Room </a>

</div>

<!--search bar-->
<div class="container">
    <div class="row">
        <div class="col"> {{$rooms->links()}} </div>
        <div class="col d-flex justify-content-end">
            <form action="{{route('rooms.search')}}" method="post">
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
            <td>Room Id</td>
            <td>Post Date</td>
            <td>Category</td>
            <td>RoomType</td>
            <td>Room Area</td>
            <td>Location</td>
            <td>Price</td>     
            <td>Details/Actions </td>
        </tr>
        @foreach($rooms as $room)
        <tr>
            <td>{{$room->room_id}}</td>
            <td>{{$room->post_date}}</td>
            <td>{{$room->category}}</td>
            <td>{{$room->roomtype}}</td>
            <td>{{$room->room_area}}</td>
            <td>{{$room->township}}</td>
            <td>{{$room->price}}</td>
            <td><a href="{{route('rooms.show',$room->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i>&nbsp;|<i class="fa fa-pencil"></i>&nbsp;|<i class="fa fa-trash"></i></a></td>
        
        </tr>

        @endforeach
        
       
    </table>
</div>

<div class="container">
   {{$rooms->links()}}
</div>


@endsection('contents')
