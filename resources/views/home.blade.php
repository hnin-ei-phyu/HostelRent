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
                      <a class="nav-link active" aria-current="page" href="{{url('/home')}}">
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

@section('contents')
<div class="container rounded mb-5">
    <div class="container">
        <div class="row" style="background-color:#E3D3EA">         
            <div class="d-flex flex-column align-items-center text-center p-3 py-3">
                @if($user[0]->photo=="" || $user[0]->photo=="none")
                <img class="rounded-circle mt-5" width="150px" src="{{asset('images/userphoto.png')}}">
                @else
                <img class="rounded-circle mt-5" width="150px" src="{{asset('images')}}/{{$user[0]->photo}}">
                @endif
                <span class="font-weight-bold">{{$user[0]->name}}</span>
                <button type="submit" data-toggle="modal" data-target="#photoModal" class="btn btn-outline-dark mt-2 bg-info" data-mdb-ripple-color="dark" style="z-index: 1; color: white;">
                    Update Photo
                </button>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="background-color: #E3D3EA">
            <div class="p-3 py-5">
                <ul class="list-group list-group-flush">
                    <div class="row mb-3">
                        <li class="list-group-item  active">
                            <h4>About Me</h4>
                        </li>

                        <li class="list-group-item bg-light mb-0">
                            <div class="d-flex">
                                <div class="col-sm-3">
                                    <p class="mb-0">FullName</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user[0]->full_name}}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item bg-light mb-0">
                            <div class="d-flex">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user[0]->phone}}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item bg-light mb-0">
                            <div class="d-flex">
                                <div class="col-sm-3">
                                    <p class="mb-0">Birthday</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user[0]->birthday}}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item bg-light mb-0">
                            <div class="d-flex">
                                <div class="col-sm-3">
                                    <p class="mb-0">Country</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user[0]->country}}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item bg-light mb-0">
                            <div class="d-flex">
                                <div class="col-sm-3">
                                    <p class="mb-0">State</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user[0]->state}}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item bg-light mb-0">
                            <div class="d-flex">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user[0]->address}}</p>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item bg-light mb-0">
                            <div class="d-flex">
                                <div class="col-sm-3">
                                    <p class="mb-0">Career</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$user[0]->career}}</p>
                                </div>
                            </div>
                        </li>
                    </div>
                    <div class="d-flex">
                        <button type="submit" data-toggle="modal" data-target="#infoModal" class="btn btn-outline-dark mt-2 bg-info" data-mdb-ripple-color="dark" style="z-index: 1; color: white;">
                            <i class="fa fa-pencil"></i> Update Info
                        </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" data-toggle="modal" data-target="#passwordModal" class="btn btn-outline-dark mt-2 bg-info" data-mdb-ripple-color="dark" style="z-index: 1; color: white;">
                            <i class="fa fa-lock"></i> Change Password
                        </button>
                    </div>

                </ul>
            </div>
        </div>
    </div>

    <div class="container mb-3">
        <!--My Post-->
        <div class="row mb-5" style="background-color: #E3D3EA">
            
          <div class="ms-4 px-2 py-4 pt-2">
            <div class="row my-3">
                <div class="col-lg-4 pt-5">
                  <a href="{{route('userposts.create')}}" style="text-decoration:none" >
                    <div class="card p-4 text-center text-danger" style="width: 80%;">
                        <i class="nav-icon fas fa-home" style="font-size:100px"></i>
                        <div class="card-body">
                          <span style="font-weight: bolder; color: black;">Post Finding Rooms </span>
                        </div>
                    </div>
                  </a>
                </div>

                <div class="col-lg-8">
                  <div class="ms-5 py-2">
                      <h4><span>My  finding Post</span></h4>
                  </div>
                    <!--Accordion --> 
                  <div class="container-fluid bg-gray mb-5" id="accordion-style-1">
                      <div class="container">
                        <section>
                          <div class="row">
                            <div class="col-6">
                              <div class="accordion" id="accordionExample">
                              @foreach($userposts as $post)
                                <div class="card">

                                  <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{$post->id}}" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-list mr-3"></i>Posted Date : {{$post->post_date}} &nbsp;&nbsp;
                                      </button>
                                    </h5>
                                  </div>

                                  <div id="{{$post->id}}" class="collapse fade" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <p class="text-muted">  
                                          <ul class="list-group list-group-flush">
                                            <li class="list-group-item">User ID  : {{$post->user_id}}</li>
                                            <li class="list-group-item">Category : {{$post->category}}</li>
                                            <li class="list-group-item">RoomType : {{$post->room_type}}</li>
                                            <li class="list-group-item">Location : {{$post->location}}</li>
                                            <li class="list-group-item">Price : {{$post->price}}</li>
                                          </ul>
                                      </p>
                                    </div>
                                  </div>

                                </div>
                              @endforeach
                              </div>
                            </div>	
                          </div>
                        </section>
                      </div>
                    </div>
                  <!--accordion -->
                </div>

              </div>

        </div>
        <!--My post-->
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
