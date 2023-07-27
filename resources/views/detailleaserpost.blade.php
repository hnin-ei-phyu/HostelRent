@extends('layouts.master')

@section('navbar')
<div class="container mt-3 ">    
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
            <div class="container-fluid">
              <img src="{{asset('images/homey.png')}}"  style="width: 50px;">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('leaser-home')}}"><span style="color: white;">Leaser Home &nbsp; |</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('leaserposts.create')}}"><span style="color: white;">Add New Room &nbsp; |</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('leaser-post')}}"span style="color: white;">My Ad Posts &nbsp; |</span></a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('user-findingpost')}}"span style="color: white;">User Finding Posts &nbsp; |</span></a>
                  </li>
                       
                </ul>


                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @guest
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{route('leasers.login')}}">
                      <button class="btn btn-outline-dark bg-light" data-mdb-ripple-color="dark" style="z-index: 1;"><i class="fa fa-sign-in"></i> Sing-in as Leaser </button>
                      </a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link active" aria-current="page" href="{{route('login')}}">
                       <button class="btn btn-outline-dark bg-light" data-mdb-ripple-color="dark" style="z-index: 1;"><strong><i class="fa fa-sign-in"></i> Login </strong></button>
                       </a>
                    </li>
                    @else

                  
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <button class="btn btn-outline-dark bg-light" data-mdb-ripple-color="dark" style="z-index: 1;"><i class="fa fa-sign-in"></i>&nbsp;{{ __('Logout') }}</button>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </li>
                    @endguest

                    

                    
                </ul>

              </div>
            </div>
          </nav>

</div>
@endsection('navbar')


@section('contents')
<div class="container py-2">
    <div class="container"  style="background-color: #C1DAD6;">
        <div class="py-4 ms-4">
            <h3> Post Details</h3>
        </div>
    
        <div class="row" class="d-flex content-align-center">
            <div class="col-lg-12 py-3">
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
                                    <a href="{{route('editleaserpost',$leaserpost->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                </div>&nbsp;&nbsp;
                                <div>
                                    <a href="{{route('leaser-post')}}" class="btn btn-warning"><i class="fa fa-circle-left"></i> Go Back </a>
                                </div>        
                            </div>
                        </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection('contents')