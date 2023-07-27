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
                    <a class="nav-link active" aria-current="page" href="{{route('leaser-post')}}"span style="color: white;">My Ad Rooms &nbsp; |</span></a>
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

<div class="container py-3">
<div class="py-4" style="background-color: #C1DAD6;">

    <div class="py-4 ms-5">
        <h3> Add New Room</h3>
    </div>
<div class="row">
    <div class="col-lg-4 text-center">
        <img src="{{asset('images/hr1.png')}}" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
    </div>
    <div class="col-lg-8">
        <form action="{{route('leaserposts.store')}}" style="width: 80%;" method="post" enctype="multipart/form-data">
            @csrf
            

            @php 
              $email=Auth::user()->email;
              $name=Auth::user()->name;
            @endphp
                    
                    
            <input type="text" name="leasername" value="{{$name}}" class="form-control mb-3" readonly>
            <input type="text" name="leaseremail" value="{{$email}}" class="form-control mb-3" readonly>
            <select name="category" class="form-control mb-3">
                <option>--Category--</option>
                @foreach( $categories as $cat)
                <option value="{{$cat->name}}"> {{$cat->name}} </option>
               @endforeach
            </select>

            <input type="text" name="roomtype" class="form-control mb-3" placeholder="Enter RoomType">
            <input type="text" name="room_area" class="form-control mb-3" placeholder="Enter Room Area">
            <select name="township" class="form-control mb-3">
                <option>-Township-</option>
                @foreach( $townships as $town)
                <option value="{{$town->township}}"> {{$town->township}} </option>
               @endforeach
            </select>

            <input type="text" name="address" class="form-control mb-3" placeholder="Enter Address">
            <input type="text" name="price" class="form-control mb-3" placeholder="Enter Price">
            <input type="text" name="facilities" class="form-control mb-3" placeholder="Enter Facilities">
            <textarea type="text" name="description" class="form-control mb-3" placeholder="Enter Dedcription"></textarea>
            <input type="text" name="phone" class="form-control mb-3" placeholder="Enter Phone that can Contact You">
            <input type="file" name="one" class="form-control mb-3">
            <input type="file" name="two" class="form-control mb-3">
            <input type="file" name="three" class="form-control mb-3">
            <input type="file" name="four" class="form-control mb-3">
         
            <button type="submit" class="form-control mb-3 btn btn-success" name="submit"><i class="fa fa-save"></i> Save </button>
            <a href="{{route('leaser-home')}}" class="">
              <div class="form-control mb-3 btn btn-warning">
                <i class="fa fa-caret-left"></i> Go Back 
              </div>
            </a>
        </form>
    </div>
   </div>
</div>   
</div>


@endsection('contents')