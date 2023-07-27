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
                      <button class="btn btn-outline-dark bg-light" data-mdb-ripple-color="dark" style="z-index: 1;"><i class="fa fa-user-circle"></i>User Account </button>
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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body py-4" style="background-image: url('images/bg3.png');">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                            <div class="col-md-5">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                            <div class="col-md-5">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                              @error('email')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                            <div class="col-md-5">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                            <div class="col-md-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <input type="hidden" name="user_type" value="user">
                        <div class="row mb-3">
                            <div class="col-md-5 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>

                    <div class="row mb-3">
                      <div class="col-md-5 offset-md-4">
                            <span style="color: white;">Already has an account?</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-5 offset-md-4">
                            <a  aria-current="page"  href="{{route('login')}}" style="text-decoration:none; color: white;">
                                <strong><i class="fa fa-sign-in"></i> Login </strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('contents')
