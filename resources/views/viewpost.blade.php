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
                      <a class="nav-link active" aria-current="page" href="{{route('home')}}">
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
        <img class="d-block w-100" src="{{asset('images/h2.png')}}" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="4000">
        <img class="d-block w-100" src="{{asset('images/h1.png')}}" alt="...">
      </div>
    </div>
  </div>
</div>
@endsection('header')


@section('contents')
<!--search bar-->
<div class="container">
    <div class="row">
        <div class="col"> {{$userposts->links()}} </div>
        <div class="col d-flex justify-content-end">
            <form action="{{route('userposts.find')}}" method="post">
                @csrf
                <input type="text" name="search" placeholder="eg.#02982 or name">
                <button type="submit"><i class="fa fa-search"></i> Search </button>
            </form>
        </div>
    </div>
</div>
<!--search bar-->

<div class="container">
    @foreach($userposts as $post)
    <div class="row my-4">
    <div class="card border-top border-bottom border-1" style="border-color: rgb(19, 19, 94) !important;">
    <div class="row my-3">
        <div class="col-lg-3"><img class="rounded-circle" width="150px" src="{{asset('images')}}/{{$post->userphoto}}"></div>
        <div class="col-lg-5 mt-2">
            <p class="mb-0"><strong> User ID  :  {{$post->user_id}}</strong></p>
            <p class="mb-0"><strong> User Name  :  {{$post->username}}</strong></p>
            <p class="mb-0"><strong> User Email  :  {{$post->useremail}}</strong></p>
            <p class="mb-0"><strong> Phone  : {{$post->phone}}</strong></p>
            <p class="mb-0"><strong> Posted Date  : {{$post->post_date}}</strong></p>
        </div>
        <div class="col-lg-4">
            <p class="lead fw-bold mb-3" style="color: #1e3f66;">I'm looking for </p>
            <p class="mb-0"><strong> Category  : {{$post->category}}</strong></p>
            <p class="mb-0"><strong> Room Type  : {{$post->room_type}}</strong></p>
            <p class="mb-0"><strong> Affordable Price  : {{$post->price}}</strong></p>
            <p class="mb-0"><strong> Prefer Area  : {{$post->location}}</strong></p>
        </div>
    </div>
   
</div>

</div>
@endforeach
    
</div>

<div class="container mt-5">
    {{$userposts->links()}}
</div>


@endsection('contents')
