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

@section('contents')
<div class="container py-3">
        <div class="card border-top border-bottom border-1" style="border-color: rgb(19, 19, 94) !important;">
        <div class="ms-4 mb-4  pt-4"><h4 style="color: rgb(19, 19, 94);">Tell us what kind of Hostle are you looking for!</h4></div>
        <hr>
            <div class="d-flex justify-content-center">
                <div class="col-lg-6 p-4">
                    <form action="{{route('userposts.store')}}" method="post">
                    @csrf 

                    @php 
                        $email=Auth::user()->email;
                        $name=Auth::user()->name;
                        $photo=Auth::user()->photo;
                    @endphp
                    
                    <label for="">Please upload your photo</label><input type="file" name="userphoto" value="{{$photo}}" class="form-control mb-3" readonly>
                    <input type="text" name="username" value="{{$name}}" class="form-control mb-3" readonly>
                    <input type="text" name="useremail" value="{{$email}}" class="form-control mb-3" readonly>
                    <select name="category" class="form-control mb-3">
                        <option>--Category--</option>

                        @foreach( $categories as $cat)
                        <option value="{{$cat->name}}"> {{$cat->name}} </option>

                    @endforeach
                    </select>

                    <input type="text" name="room_type" class="form-control mb-3" placeholder="Enter RoomType">
                    <select name="township" class="form-control mb-3">
                        <option>-Township-</option>

                        @foreach( $townships as $town)
                        <option value="{{$town->township}}"> {{$town->township}} </option>

                    @endforeach
                    </select>

                    <input type="text" name="price" class="form-control mb-3" placeholder="Enter Your Affordable Price">
                    <input type="text" name="phone" class="form-control mb-3" placeholder="Enter Your Phone">
                     
                    <button type="submit" class="form-control mb-3" name="submit"><i class="fa fa-save"></i> Post </button>
                                
                    </form>

                    <a href="{{route('home')}}" class="btn btn-warning"><i class="fa fa-circle-right"></i> Go Back </a>
                </div>
            </div>
        </div>
</div>

@endsection('contents')
