@extends('layouts.admin')

@section('contents')
       
<div class="container" style="margin-top: 50px;">
    <div class="row">

      <div class="col lg-4">
        <div class="card p-4 text-center text-dark" style="width: 80%;">
        <i class="nav-icon fas fa-user" style="font-size:100px"></i>
          <div class="card-body">
          <a href="{{route('usertype.index')}}" class="btn btn-secondary"> UserType </a>
          </div>
        </div>
      </div>
      
      <div class="col lg-4">
        <div class="card p-4 text-center text-secondary" style="width: 80%;">
        <i class="nav-icon fas fa-users" style="font-size:100px"></i>
          <div class="card-body">
          <a href="{{route('users.index')}}" class="btn btn-secondary"> Users </a>
          </div>
        </div>
      </div>

      <div class="col lg-4">
        <div class="card p-4 text-center text-danger" style="width: 80%;">
        <i class="nav-icon fas fa-map-marker-alt" style="font-size:100px"></i>
          <div class="card-body">
          <a href="{{route('township.index')}}" class="btn btn-secondary"> Township </a>
          </div>
        </div>
      </div>

      <div class="col lg-4">
        <div class="card p-4 text-center text-primary" style="width: 80%;">
        <i class="nav-icon fas fa-th" style="font-size:100px"></i>
          <div class="card-body">
          <a href="{{route('category.index')}}" class="btn btn-secondary"> Category </a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row py-4">
      <div class="col lg-4">
        <div class="card p-4 text-center text-success" style="width: 80%;">
        <i class="nav-icon fas fa-building" style="font-size:100px"></i>
          <div class="card-body">
          <a href="{{route('rooms.index')}}" class="btn btn-secondary"> Rooms </a>
          </div>
        </div>
      </div>

      <div class="col lg-4">
        <div class="card p-4 text-center text-info" style="width: 80%;">
        <i class="nav-icon fas fa-home" style="font-size:100px"></i>
          <div class="card-body">
          <a href="#" class="btn btn-secondary"> Leaserposts </a>
          </div>
        </div>
      </div>

      <div class="col lg-4">
        <div class="card p-4 text-center text-warning" style="width: 80%;">
        <i class="nav-icon fas fa-chart-pie" style="font-size:100px"></i>
          <div class="card-body">
          <a href="{{route('userposts.index')}}" class="btn btn-secondary"> Usersposts </a>
          </div>
        </div>
      </div>

      <div class="col lg-4">
        <div class="card p-4 text-center text-dark" style="width: 80%;">
        <i class="nav-icon fa fa-lock" style="font-size:100px"></i>
          <div class="card-body">
            <a href="{{ route('logout') }}" class="btn btn-secondary">
              {{ __('Logout') }}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </a>
          </div>
        </div>
      </div>
    </div>

</div>

@endsection('contents')