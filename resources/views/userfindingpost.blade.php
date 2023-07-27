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
@section('contents')
<!--search bar-->
<div class="container  pt-4">
    <div class="row">
        <div class="col"> {{$userposts->links()}} </div>
        <div class="col d-flex justify-content-end">
            <form action="{{route('search-userfindingpost')}}" method="post">
                @csrf
                <input type="text" name="search" placeholder="eg.#02982 or name">
                <button type="submit"><i class="fa fa-search"></i> Search </button>
            </form>
        </div>
    </div>
</div>
<!--search bar-->

<div class="container">
<div class="row my-4">
@foreach($userposts as $post)
<div class="col-lg-3">
    <div class="card border-top border-bottom border-1" style="border-color: rgb(19, 19, 94) !important;">
        <div class="d-flex justify-content-center my-3">
            <img class="rounded-circle" width="150px" src="{{asset('images')}}/{{$post->userphoto}}">
        </div>
        <div class="ms-3 mb-3">
            <p class="mb-0"><strong> User ID  :  {{$post->user_id}}</strong></p>
            <p class="mb-0"><strong> User Name  :  {{$post->username}}</strong></p>
            <p class="mb-0"><strong> User Email  :  {{$post->useremail}}</strong></p>
            <p class="mb-0"><strong> Phone  : {{$post->phone}}</strong></p>      
            <p class="lead fw-bold mb-0" style="color: #1e3f66;">I'm looking for </p>
            <p class="mb-0"><strong> Category  : {{$post->category}}</strong></p>
            <p class="mb-0"><strong> Room Type  : {{$post->room_type}}</strong></p>
            <p class="mb-0"><strong> Affordable Price  : {{$post->price}}</strong></p>
            <p class="mb-0"><strong> Prefer Area  : {{$post->location}}</strong></p>
            <p class="mb-0"><strong> Posted Date  : {{$post->post_date}}</strong></p>
        </div>
   
    </div>
</div>
@endforeach
</div>
</div>

<div class="container mt-5">
    {{$userposts->links()}}
</div>
@endsection('contents')