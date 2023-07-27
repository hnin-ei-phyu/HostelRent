@extends('layouts.admin')

@section('contents')


<div class="container py-3">
<div class="row">
    <div class="col-lg-4 text-center p-5">
        <i class="fa fa-building" style="font-size:200px;color:orange;"></i>
    </div>
    <div class="col-lg-8">
        <form action="{{route('rooms.store')}}" style="width: 80%;" method="post" enctype="multipart/form-data">
            @csrf
            
            <select name="category" class="form-control mb-3">
                <option>--Category--</option>
                @foreach( $categories as $cat)
                <option value="{{$cat->name}}"> {{$cat->name}} </option>
               @endforeach
            </select>

            <input type="text" name="roomtype" class="form-control mb-3" placeholder="Enter RoomType">
            <input type="text" name="room_area" class="form-control mb-3" placeholder="Enter Room Area">
            <select name="township" class="form-control mb-3">
                <option>-Towship-</option>
                @foreach( $townships as $town)
                <option value="{{$town->township}}"> {{$town->township}} </option>
               @endforeach
            </select>

            <input type="text" name="address" class="form-control mb-3" placeholder="Enter Address">
            <input type="text" name="price" class="form-control mb-3" placeholder="Enter Price">
            <input type="text" name="facilities" class="form-control mb-3" placeholder="Enter Facilities">
            <input type="text" name="description" class="form-control mb-3" placeholder="Enter Dedcription">
            <input type="text" name="phone" class="form-control mb-3" placeholder="Enter Phone that can Contact You">
            <input type="file" name="one" class="form-control mb-3">
            <input type="file" name="two" class="form-control mb-3">
            <input type="file" name="three" class="form-control mb-3">
            <input type="file" name="four" class="form-control mb-3">
         
            <button type="submit" class="form-control mb-3" name="submit"><i class="fa fa-save"></i> Save </button>
        </form>
    </div>
   </div>
  
    
</div>


@endsection('contents')