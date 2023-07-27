@extends('layouts.admin')

@section('contents')

<div class="container mb-3 py-4">
    <div class="row"> 
    
       <div class="col-lg-6">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{asset('images')}}/{{$room->photo1}}" style="width: 400px;" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('images')}}/{{$room->photo2}}" style="width: 400px;" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('images')}}/{{$room->photo3}}" style="width: 400px;" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('images')}}/{{$room->photo4}}" style="width: 400px;" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
       </div>

       <div class="col-lg-6">
            <ul class="list-group list-group-flush">
                <li class="list-group-item active"> Room Details </li>
                <li class="list-group-item"> <h3>Category: {{$room->category}}</h3></li>
                <li class="list-group-item">Room ID : {{$room->room_id}}</li>
                <li class="list-group-item">Room Type : {{$room->roomtype}}</li>
                <li class="list-group-item">Room Area : {{$room->room_area}}</li>
                <li class="list-group-item">Price  : {{$room->price}}</li>
                <li class="list-group-item">Phone: {{$room->phone}}</li>
                <li class="list-group-item">Address: {{$room->address}}</li>
                <li class="list-group-item"> <span style="color: dark; font-weight: 800;">Township  : {{$room->township}} </span></li>
                <li class="list-group-item">Facilities: {{$room->facilities}}</li>
                <li class="list-group-item">Description: {{$room->description}}</li>
                <li class="list-group-item">Posted Date: {{$room->post_date}}</li>
            </ul>
            <div class="d-flex justify-content-end">
                <div>
                    <a href="{{route('rooms.edit',$room->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                </div>&nbsp;&nbsp;
                <div>
                    <form action="{{route('rooms.destroy',$room->id)}}" method="post">
                    @csrf 
                    @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button>
                   </form>
                </div>&nbsp;&nbsp;
                <div>
                    <a href="{{route('rooms.index')}}" class="btn btn-warning"><i class="fa fa-circle-left"></i> Go Back </a>
                </div>        
        </div>
       </div>
       

    </div>
</div>


@endsection('contents')
