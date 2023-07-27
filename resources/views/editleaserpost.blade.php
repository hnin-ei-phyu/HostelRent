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
        <div class="py-4 ms-4">
            <h3> Edit Post</h3>
        </div>
    
        <div class="row">
            <div class="col-lg-4 text-center">
                <img src="{{asset('images/hr.png')}}" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-lg-8">
                <form action="{{route('leaserposts.update',$leaserpost->id)}}" style="width: 80%;" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <table>
                        <tr><input type="text" name="roomtype" class="form-control mb-3" value="{{$leaserpost->roomtype}}"></tr>
                        <tr><input type="text" name="room_area" class="form-control mb-3" value="{{$leaserpost->room_area}}"></tr>
                        <tr><input type="text" name="address" class="form-control mb-3" value="{{$leaserpost->address}}"></tr>
                        <tr><input type="text" name="price" class="form-control mb-3" value="{{$leaserpost->price}}"></tr>
                        <tr><input type="text" name="facilities" class="form-control mb-3" value="{{$leaserpost->facilities}}"></tr>
                        <tr><input type="text" name="description" class="form-control mb-3" value="{{$leaserpost->description}}"></tr>
                        <tr><input type="text" name="phone" class="form-control mb-3" value="{{$leaserpost->phone}}"></tr>
                    
                        <tr>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item "><label> Current Photo 1</label></li>
                                    <li class="list-group-item"><img src="{{asset('images')}}/{{$leaserpost->photo1}}" class="img-thumbnail" style="width: 50px; height: auto"></li>
                                    <li class="list-group-item"><label> New Photo </label></li>
                                </ul>
                                <input type="hidden" name="currphoto1" value="{{$leaserpost->photo1}}" class="form-control mb-3">
                                <input type="file" name="newphoto1" class="form-control mb-3">
                            </td>
                        
                        
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item "><label> Current Photo 2</label></li>
                                    <li class="list-group-item"><img src="{{asset('images')}}/{{$leaserpost->photo2}}" class="img-thumbnail" style="width: 50px; height: auto"></li>
                                    <li class="list-group-item"><label> New Photo </label></li>
                                </ul>
                                <input type="hidden" name="currphoto2" value="{{$leaserpost->photo2}}" class="form-control mb-3">
                                <input type="file" name="newphoto2" class="form-control mb-3">
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item "><label> Current Photo 3</label></li>
                                    <li class="list-group-item"><img src="{{asset('images')}}/{{$leaserpost->photo3}}" class="img-thumbnail" style="width: 50px; height: auto"></li>
                                    <li class="list-group-item"><label> New Photo </label></li>
                                </ul>
                                <input type="hidden" name="currphoto3" value="{{$leaserpost->photo3}}" class="form-control mb-3">
                                <input type="file" name="newphoto3" class="form-control mb-3">
                            </td>

                            <td>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item "><label> Current Photo 4</label></li>
                                    <li class="list-group-item"><img src="{{asset('images')}}/{{$leaserpost->photo4}}" class="img-thumbnail" style="width: 50px; height: auto"></li>
                                    <li class="list-group-item"><label> New Photo </label></li>
                                </ul>
                                <input type="hidden" name="currphoto4" value="{{$leaserpost->photo4}}" class="form-control mb-3">
                                <input type="file" name="newphoto4" class="form-control mb-3">
                            </td>
                        </tr>
                    </table>
                
                    <button type="submit" class="form-control mb-3 btn btn-success" name="submit"><i class="fa fa-refresh"></i> Update </button>
                    <a href="{{route('detailleaserpost',$leaserpost->id)}}" class="">
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