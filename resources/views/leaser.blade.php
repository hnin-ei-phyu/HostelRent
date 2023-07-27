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
                    <a class="nav-link active" aria-current="page" href="{{route('leaser-home')}}"><span style="color: white;">Leaser{{Auth::user()->name}} <i class="fa fa-home"></i> |</span></a>
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
<div class="container">
    <div class="row">
      <div class="col col-lg-12 col-xl-12">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                @if($user[0]->photo=="" || $user[0]->photo=="none")
                <img src="{{asset('images/userphoto.png')}}" alt="Generic placeholder image" class="img-fluid" style="width: 200px; z-index: 1">
                @else
                <img src="{{asset('images')}}/{{$user[0]->photo}}" alt="Generic placeholder image" class="img-fluid" style="width: 200px; z-index: 1">
                @endif

                <button type="submit" data-toggle="modal" data-target="#photoModal" class="btn btn-outline-dark mt-2 bg-info" data-mdb-ripple-color="dark" style="z-index: 1; color: white;">
                    Update Photo
                </button>
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h5>{{$user[0]->name}}</h5>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <div class="m-3"><p class="lead fw-normal mb-1">Personal Information</p></div>
              <div class="p-4" style="background-color: #f8f9fa;">
                    <div class="d-flex">
                        <div class="col-sm-1">
                            <p class="mb-0">FullName</p>
                        </div>
                        <div class="col-sm-1">
                            <p class="text-muted mb-0">:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="text-muted mb-0">{{$user[0]->full_name}}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-sm-1">
                            <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-1">
                            <p class="text-muted mb-0">:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="text-muted mb-0">{{$user[0]->phone}}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-sm-1">
                            <p class="mb-0">Birthday</p>
                        </div>
                        <div class="col-sm-1">
                            <p class="text-muted mb-0">:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="text-muted mb-0">{{$user[0]->birthday}}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-sm-1">
                            <p class="mb-0">Country</p>
                        </div>
                        <div class="col-sm-1">
                            <p class="text-muted mb-0">:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="text-muted mb-0">{{$user[0]->country}}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-sm-1">
                            <p class="mb-0">State</p>
                        </div>
                        <div class="col-sm-1">
                            <p class="text-muted mb-0">:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="text-muted mb-0">{{$user[0]->state}}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-sm-1">
                            <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-1">
                            <p class="text-muted mb-0">:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="text-muted mb-0">{{$user[0]->address}}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-sm-1">
                            <p class="mb-0">Career</p>
                        </div>
                        <div class="col-sm-1">
                            <p class="text-muted mb-0">:</p>
                        </div>
                        <div class="col-sm-10">
                            <p class="text-muted mb-0">{{$user[0]->career}}</p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <button type="submit" data-toggle="modal" data-target="#infoModal" class="btn btn-outline-dark mt-2 bg-info" data-mdb-ripple-color="dark" style="z-index: 1; color: white;">
                            <i class="fa fa-pencil"></i> Update Info
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" data-toggle="modal" data-target="#passwordModal" class="btn btn-outline-dark mt-2 bg-info" data-mdb-ripple-color="dark" style="z-index: 1; color: white;">
                            <i class="fa fa-lock"></i> Change Password
                        </button>
                    </div>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">My Activities</p>
              <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
            </div>
            <div class="row my-3">
              <div class="col-lg-4">
                <a href="{{route('leaserposts.create')}}" style="text-decoration:none" >
                  <div class="card p-4 text-center text-danger" style="width: 80%;">
                      <i class="nav-icon fas fa-home" style="font-size:100px"></i>
                      <div class="card-body">
                        <span style="font-weight: bolder; color: black;">Add New Rooms </span>
                      </div>
                  </div>
                </a>
              </div>

              <div class="col-lg-4">
                <a href="{{route('leaser-post')}}" style="text-decoration:none" >
                  <div class="card p-4 text-center text-info" style="width: 80%;">
                      <i class="nav-icon fas fa-building" style="font-size:100px"></i>
                      <div class="card-body">
                        <span style="font-weight: bolder; color: black;"> My Ad Posts </span>
                      </div>
                  </div>
                </a>
              </div>
              
              <div class="col-lg-4">
                
            </div>


            <div class="row g-2">
              
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>

<!--Photo Modal -->
<div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Your Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('users.update',$user[0]->id)}}" method="post" enctype="multipart/form-data">
        @csrf 
        @method('PATCH')
            <div class="modal-body">
                <input type="file" name="user_photo" class="form-control mb-3">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
      </form>
    </div>
  </div>
</div>
<!--End of Photo Modal -->

<!--Info Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Your Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('users.update',$user[0]->id)}}" method="post">
        @csrf 
        @method('PATCH')
        <div class="modal-body">
            <label>Name</label><input type="text" class="form-control mb-3" name="newname" value="{{$user[0]->name}}">
            <label>Full Name</label><input type="text" class="form-control mb-3" name="newfull_name" value="{{$user[0]->full_name}}">
            <label>Phone</label><input type="text" class="form-control mb-3" name="newphone" value="{{$user[0]->phone}}">
            <label>Birthday</label><input type="text" class="form-control mb-3" name="newbirthday" value="{{$user[0]->birthday}}">
            <label>Country</label><input type="text" class="form-control mb-3" name="newcountry" value="{{$user[0]->country}}">
            <label>State/Region</label><input type="text" class="form-control mb-3" name="newstate" value="{{$user[0]->state}}">
            <label>Address</label><input type="text" class="form-control mb-3" name="newaddress" value="{{$user[0]->address}}">
            <label>Career</label><input type="text" class="form-control mb-3" name="newcareer" value="{{$user[0]->career}}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--End of Info Modal -->


<!--Password Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.update',$user[0]->id)}}" method="post">
          @csrf
          @method('PATCH')
          <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
              <div class="col-md-6">
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
              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
          </div>

      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--Password Modal -->
@endsection('contents')
