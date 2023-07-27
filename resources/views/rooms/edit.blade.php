@extends('layouts.admin')

@section('contents')


<div class="container py-3">
<div class="row">
    <div class="col-lg-4 text-center p-5">
        <i class="fa fa-building" style="font-size:200px;color:orange;"></i>
    </div>
    <div class="col-lg-8">
        <form action="{{route('rooms.update',$room->id)}}" style="width: 80%;" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <input type="text" name="roomtype" class="form-control mb-3" value="{{$room->roomtype}}">
            <input type="text" name="room_area" class="form-control mb-3" value="{{$room->room_area}}">
            <input type="text" name="address" class="form-control mb-3" value="{{$room->address}}">
            <input type="text" name="price" class="form-control mb-3" value="{{$room->price}}">
            <input type="text" name="facilities" class="form-control mb-3" value="{{$room->facilities}}">
            <input type="text" name="description" class="form-control mb-3" value="{{$room->description}}">
            <input type="text" name="phone" class="form-control mb-3" value="{{$room->phone}}">
           
            <ul class="list-group list-group-flush">
                <li class="list-group-item "><label> Current Photo 1</label></li>
                <li class="list-group-item"><img src="{{asset('images')}}/{{$room->photo1}}" class="img-thumbnail" style="width: 50px; height: auto"></li>
                <li class="list-group-item"><label> New Photo </label></li>
            </ul>
            <input type="hidden" name="currphoto1" value="{{$room->photo1}}" class="form-control mb-3">
            <input type="file" name="newphoto1" class="form-control mb-3">

            <ul class="list-group list-group-flush">
                <li class="list-group-item "><label> Current Photo 2</label></li>
                <li class="list-group-item"><img src="{{asset('images')}}/{{$room->photo2}}" class="img-thumbnail" style="width: 50px; height: auto"></li>
                <li class="list-group-item"><label> New Photo </label></li>
            </ul>
            <input type="hidden" name="currphoto2" value="{{$room->photo2}}" class="form-control mb-3">
            <input type="file" name="newphoto2" class="form-control mb-3">

            <ul class="list-group list-group-flush">
                <li class="list-group-item "><label> Current Photo 3</label></li>
                <li class="list-group-item"><img src="{{asset('images')}}/{{$room->photo3}}" class="img-thumbnail" style="width: 50px; height: auto"></li>
                <li class="list-group-item"><label> New Photo </label></li>
            </ul>
            <input type="hidden" name="currphoto3" value="{{$room->photo3}}" class="form-control mb-3">
            <input type="file" name="newphoto3" class="form-control mb-3">

            <ul class="list-group list-group-flush">
                <li class="list-group-item "><label> Current Photo 4</label></li>
                <li class="list-group-item"><img src="{{asset('images')}}/{{$room->photo4}}" class="img-thumbnail" style="width: 50px; height: auto"></li>
                <li class="list-group-item"><label> New Photo </label></li>
            </ul>
            <input type="hidden" name="currphoto4" value="{{$room->photo4}}" class="form-control mb-3">
            <input type="file" name="newphoto4" class="form-control mb-3">
         
            <button type="submit" class="form-control mb-3 btn btn-primary" name="submit"><i class="fa fa-refresh"></i> Update </button>
            <a href="{{route('rooms.index')}}" class="form-control mb-3 btn btn-warning"><i class="fa fa-circle-left"></i> Go Back </a>
        </form>
    </div>
   </div>
  
    
</div>


@endsection('contents')

