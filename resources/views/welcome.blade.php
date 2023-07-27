@extends('layouts.master')

@section('navbar')
<div class="container mt-3 ">    
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-secondary">
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
                      <button class="btn btn-outline-dark bg-light" data-mdb-ripple-color="dark" style="z-index: 1;"><i class="fa fa-user-circle"></i>{{Auth::user()->name}} </button>
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

<div class="container">
    <div class="d-flex justify-content-end">
        {{$leaserposts->links()}}
    </div>
</div>

 
<div class="container py-4"> 
    <div class="row" class="d-flex content-align-center">
        <!--Search Bar--> 
        <div class="col-lg-3 py-4">
            <form action="{{route('front.search')}}" method="post">
            @csrf
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-warning">
                     Choose Category
                </li>
                <li class="list-group-item">
                    <select name="category" class="form-control mb-3">
                        <option>-Select Category-</option>
                        @foreach( $categories as $cat)
                        <option value="{{$cat->name}}"> {{$cat->name}} </option>
                        @endforeach
                    </select>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-warning">
                        Choose Room Type
                    </li>
                    <li class="list-group-item">
                        <input type="radio" name="roomtype" value="single room"> Single Room <br>
                    </li>
                    <li class="list-group-item">
                        <input type="radio" name="roomtype" value="double room"> Double Room <br>
                    </li>
                    <li class="list-group-item">
                        <input type="radio" name="roomtype" value="family room"> Family Room <br>
                    </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-warning">
                     Select Township
                </li>
                <li class="list-group-item">
                    <select name="township" class="form-control mb-3">
                        <option>-Select Towship-</option>
                        @foreach( $townships as $town)
                        <option value="{{$town->township}}"> {{$town->township}} </option>
                        @endforeach
                    </select>
                </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-warning">
                        Price Range
                    </li>
                    <li class="list-group-item">
                        <select name="price" class="form-control mb-3">
                            <option value="">Price From</option>
                            <option value="30000">30000</option>
                            <option value="40000">40000</option>
                            <option value="50000">50000</option>
                            <option value="60000">60000</option>
                            <option value="70000">70000</option>
                            <option value="80000">80000</option>
                            <option value="90000">90000</option>
                        </select>
                    </li>
                    <li class="list-group-item">
                        <select name="price" class="form-control mb-3">
                            <option value="">Price To</option>
                            <option value="100000">100000</option>
                            <option value="200000">200000</option>
                            <option value="300000">300000</option>
                            <option value="400000">400000</option>
                            <option value="500000">500000</option>
                            <option value="600000">600000</option>
                            <option value="700000">700000</option>
                        </select>
                    </li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <button type="submit" class="btn btn-primary form-control"> <i class="fa fa-search"></i> Search Now </button>
                </li>
                    
            </ul>
            </form>
        </div>
        <!--Search Bar-->

        <div class="col-lg-9">
            <div class="row">
                @foreach($leaserposts as $leaserpost)
                <div class="col-lg-4 p-4">
                    <div class="card" style="width: 100%;">
                        <img src="{{asset('images')}}/{{$leaserpost->photo1}}" class="card-img-top" style="width:235px; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{$leaserpost->category}}</h5>
                            <p class="card-text">Room Type :{{$leaserpost->roomtype}}</p>
                            <p class="card-text">Price :{{$leaserpost->price}}</p>
                            <p class="card-text">Posted Date :{{$leaserpost->post_date}}</p>
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
    </div>
</div>



<!-- Leaser List -->
<div class="container">
    <h1>All Leasers List</h1>
    <div class="text-center p-3"><button class="btn btn-secondary btn-sm toggle-all"><i class="fa fa-th" aria-hidden="true"></i> Show All</button></div>
    <div id="infinite_carousel" class="d-flex align-items-center">
        <div class="p-3 control"><i class="fa fa-2x text-muted fa-chevron-left"></i></div>
        <div class="row w-100 flex-nowrap" style="overflow: hidden;">
            @foreach($users as $user)
            @if($user->user_type=="leaser")
            <div class="col col-sm-4 col-md-3 col-xl-3 text-center py-3">
                <div class="card border-top border-bottom border-1">
                    <div class="d-flex justify-content-center p-3">
                        @if($user->photo=="" || $user->photo=="none")
                        <img src="{{asset('images/userphoto.png')}}" class="rounded-circle" width="100px">
                        @else
                        <img src="{{asset('images')}}/{{$user->photo}}" class="rounded-circle" width="100px">
                        @endif
                    </div>
                    <div class="justify-content-center">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$user->name}}</li>
                            <li class="list-group-item"><i class="fa fa-phone"></i> : {{$user->phone}}</li>
                            <li class="list-group-item">{{$user->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            @endforeach
        </div>
        <div class="p-3 control"><i class="fa fa-2x text-muted fa-chevron-right"></i></div>
    </div>
</div>
<!-- Leaser List -->
@endsection('contents')


