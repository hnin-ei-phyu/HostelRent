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
                    <a class="nav-link active" aria-current="page" href="/"><span style="color: white;"> Home &nbsp; |</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span style="color: white;"> Contact Us |</span> </a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="{{asset('/viewpost')}}"><span style="color: white;"> All Finding Posts | </span> </a>
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
                      <a class="nav-link active" aria-current="page" href="{{url('home')}}">
                      <button class="btn btn-outline-dark bg-light" data-mdb-ripple-color="dark" style="z-index: 1;"><i class="fa fa-user-circle"></i>{{Auth::user()->name}}</button>
                      </a>
                    </li>
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

@section('header')
<div class="container mb-3">
  <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="5000">
        <img class="d-block w-100" src="{{asset('images/h.png')}}" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="4000">
        <img class="d-block w-100" src="{{asset('images/h1.png')}}" alt="...">
      </div>
    </div>
  </div>
</div>
@endsection('header')


@section('contents')
<div class="container mb-3">
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
                <li class="list-group-item">Address: {{$leaserpost->address}}</li>
                <li class="list-group-item"> <span style="color: dark; font-weight: 800;">Township  : {{$leaserpost->township}} </span></li>
                <li class="list-group-item">Facilities: {{$leaserpost->facilities}}</li>
                <li class="list-group-item">Description: {{$leaserpost->description}}</li>
                <li class="list-group-item">Posted Date: {{$leaserpost->post_date}}</li>
            </ul>
       </div>
       <div class="d-flex justify-content-end">
            <div>
                <a href="/" class="btn btn-info"><i class="fa fa-circle-left"></i> Go Back </a>
            </div>&nbsp;&nbsp;
            <div>
                <button type="submit" data-toggle="modal" data-target="#callModal" class="btn btn-outline-dark bg-warning" data-mdb-ripple-color="dark" style="z-index: 1; color: black; border-color: yellow;">
                    <i class="fa fa-phone"></i>&nbsp;&nbsp;Call
                </button>
                <!--Phone Modal -->
                <div class="modal fade" id="callModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <img src="{{asset('images/cc.png')}}" style="width:465px;">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="p-4">
                                <h4><span style="">Please Contact This Number</span></h4>
                            </div>
                        
                            <div class="p-4">
                                <h4><i class="fa fa-phone"></i>&nbsp;&nbsp; : &nbsp;&nbsp;{{$leaserpost->phone}}</h4>
                            </div>
                            <div class="modal-footer py-4">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End of Phone Modal -->
            </div>
            
        </div>

    </div>
</div>

<div class="container"><hr></div>

<!-- comment --> 
<div class="container my-4">
    <h4>Display Comments</h4>
  
    @include('leaserposts.commentsDisplay', ['comments' => $leaserpost->comments, 'leaserpost_id' => $leaserpost->id])
    <hr>
    <h4>Add comment</h4>
    <form method="post" action="{{ route('comments.store'   ) }}">
    @csrf
    <div class="form-group">
        <textarea class="form-control" name="body"></textarea>
        <input type="hidden" name="leaserpost_id" value="{{ $leaserpost->id }}" />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Add Comment" />
    </div>
    </form>
</div>
<!-- comment --> 

<!-- slider for more items -->
<div class="container my-4">
<div class="ms-4 mb-4  pt-4"><h2 style="color: rgb(19, 19, 94);">Find More Similar Hostels</h2></div>
<div class="conatainer">
    <div class="row">
                @foreach($leaserposts as $leaserpost)
                <div class="col-lg-3 p-4">
                    <div class="card" style="width: 100%;">
                        <img src="{{asset('images')}}/{{$leaserpost->photo1}}" class="card-img-top" style="width:235px; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{$leaserpost->category}}</h5>
                            <p class="card-text">Room Type :{{$leaserpost->roomtype}}</p>
                            <p class="card-text">Price :{{$leaserpost->price}}</p>
                            <div class="d-flex">
                                <div>
                                    <button type="submit" data-toggle="modal" data-target="#{{$leaserpost->id}}" class="btn btn-outline-dark bg-warning" data-mdb-ripple-color="dark" style="z-index: 1; color: black; border-color: yellow;">
                                        <i class="fa fa-phone"></i>&nbsp;&nbsp;Call
                                    </button>
                                    <!--Call Modal -->
                                        <div class="modal fade" id="{{$leaserpost->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <img src="{{asset('images/cc.png')}}" style="width:465px;">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="p-4">
                                                        <h4><span style="">Please Contact This Number</span></h4>
                                                    </div>
                                                    
                                                    <div class="p-4">
                                                        <h4><i class="fa fa-phone"></i>&nbsp;&nbsp; : &nbsp;&nbsp; {{$leaserpost->phone}}</h4>
                                                    </div>
                                                    <div class="modal-footer py-4">
                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!--End of Call Modal -->
                                </div>&nbsp;&nbsp;&nbsp;
                                <div>
                                    <a href="{{route('front.show',$leaserpost->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i>Details</a>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                @endforeach
    </div>
</div>


<!-- slider for more items -->
</div>
</div>


@endsection('contents')