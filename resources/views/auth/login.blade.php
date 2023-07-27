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
               
                <div class="card-header">  {{ __('Login') }}</div>
              


                <div class="card-body" style="background-image: url('images/bg3.png');">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end"> &nbsp; </label>
                              <div class="col-md-6">
                                <a class="ml-1 btn btn-primary" href="{{ route('facebook.login') }}" style="margin-top: 0px !important;background: #4c6ef5;color: #ffffff;padding: 5px;border-radius:3px;" id="btn-fblogin">
                                <i class="fa-brands fa-square-facebook"></i> Login with Facebook
                                </a>
                            </div>
                       </div>

                        
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"> &nbsp; </label>
                          <div class="col-md-6">
                            <a href="{{ url('auth/google') }}">
                            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                            </a>
                          </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="hidden" name="user_type" value="user">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-light" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="col-md-6 offset-md-4 mt-2">
                                <a class="btn btn-light"  aria-current="page"  href="{{route('register')}}" style="text-decoration:none;">
                                <strong><i class="fa fa-plus"></i> Register </strong>
                                </a>
                        </div>
                        </div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('contents')
