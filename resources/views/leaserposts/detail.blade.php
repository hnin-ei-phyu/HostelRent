@extends('layouts.admin')

@section('contents')

<div class="container mb-3 py-4">
    <div class="row"> 
    
       <div class="col-lg-6">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        @if($leaserpost->photo1=="" || $leaserpost->photo1=="none")
                        <img src="{{asset('images/p1.png')}}" style="width: 400px;" class="d-block w-100" alt="...">
                        @else
                        <img src="{{asset('images')}}/{{$leaserpost->photo1}}" style="width: 400px;" class="d-block w-100" alt="...">
                        @endif
                    </div>
                    <div class="carousel-item">
                        @if($leaserpost->photo2=="" || $leaserpost->photo2=="none")
                        <img src="{{asset('images/p2.png')}}" style="width: 400px;" class="d-block w-100" alt="...">
                        @else
                        <img src="{{asset('images')}}/{{$leaserpost->photo2}}" style="width: 400px;" class="d-block w-100" alt="...">
                        @endif
                    </div>
                    <div class="carousel-item">
                        @if($leaserpost->photo3=="" || $leaserpost->photo3=="none")
                        <img src="{{asset('images/p3.png')}}" style="width: 400px;" class="d-block w-100" alt="...">
                        @else
                        <img src="{{asset('images')}}/{{$leaserpost->photo3}}" style="width: 400px;" class="d-block w-100" alt="...">
                        @endif
                    </div>
                    <div class="carousel-item">
                        @if($leaserpost->photo4=="" || $leaserpost->photo4=="none")
                        <img src="{{asset('images/p4.png')}}" style="width: 400px;" class="d-block w-100" alt="...">
                        @else
                        <img src="{{asset('images')}}/{{$leaserpost->photo4}}" style="width: 400px;" class="d-block w-100" alt="...">
                        @endif
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
                <li class="list-group-item active"> About Leaser </li>
                <li class="list-group-item"> <h3>Name: {{$leaserpost->leasername}}</h3></li>
                <li class="list-group-item">Email : {{$leaserpost->leaseremail}}</li>
                <li class="list-group-item">leaser ID : {{$leaserpost->leaser_id}}</li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item active"> Room Details </li>
                <li class="list-group-item"> <h3>Category: {{$leaserpost->category}}</h3></li>
                <li class="list-group-item">Room ID : {{$leaserpost->room_id}}</li>
                <li class="list-group-item">Room Type : {{$leaserpost->roomtype}}</li>
                <li class="list-group-item">Room Area : {{$leaserpost->room_area}}</li>
                <li class="list-group-item">Price  : {{$leaserpost->price}}</li>
                <li class="list-group-item">Phone: {{$leaserpost->phone}}</li>
                <li class="list-group-item">Address: {{$leaserpost->address}}</li>
                <li class="list-group-item"> <span style="color: dark; font-weight: 800;">Township  : {{$leaserpost->township}} </span></li>
                <li class="list-group-item">Facilities: {{$leaserpost->facilities}}</li>
                <li class="list-group-item">Description: {{$leaserpost->description}}</li>
                <li class="list-group-item">Posted Date: {{$leaserpost->post_date}}</li>
            </ul>
            <div class="d-flex justify-content-end py-3">

                <div>
                    <a href="{{route('leaserposts.index')}}" class="btn btn-warning"><i class="fa fa-circle-left"></i> Go Back </a>
                </div>        
        </div>
       </div>
       

    </div>
</div>


@endsection('contents')
