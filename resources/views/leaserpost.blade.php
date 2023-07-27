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
        <div class="py-4">
            <h3>My  Advertisment Posts</h3>
        </div>
    
        <div class="row" class="d-flex content-align-center">
        <div class="col-lg-12 py-3">
            <div class="row">
                @foreach($leaserposts as $leaserpost)
                <div class="col-lg-3 p-3">
                    <div class="card" style="width: 100%;">
                        <img src="{{asset('images')}}/{{$leaserpost->photo1}}" class="card-img-top" style="width:242px; height: auto;">
                        <div class="card-body">
                            <h5 class="card-title">{{$leaserpost->category}}</h5>
                            <p class="card-text">Room Type :{{$leaserpost->roomtype}}</p>
                            <p class="card-text">Price :{{$leaserpost->price}}</p>
                            <p class="card-text">Posted Date :{{$leaserpost->post_date}}</p>
                            <div class="d-flex">
                                <div>
                                    <a href="{{route('detailleaserpost',$leaserpost->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
                                </div>&nbsp;&nbsp;
                                <div>
                                    <form action="{{route('leaserposts.destroy',$leaserpost->id)}}" method="post">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button>
                                    </form>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                @endforeach
                <div class="d-flex justify-content-end">
                    <a href="{{route('leaser-home')}}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>



@endsection('contents')