@extends('layouts.admin')

@section('contents')


<div class="container py-3">
<div class="row">
    <div class="col-lg-6 text-center p-5">
        <i class="fa fa-list" style="font-size:100px;color:orange;"></i>
    </div>
    <div class="col-lg-6">
        <form action="{{route('users.update',$users->id)}}" style="width:80%;" method="post">
            @csrf
            @method('PATCH')
            
            <select name="user_type" class="form-control mb-3">
                <option>-usertype-</option>
                @foreach( $usertypes as $usertype)
                <option value="{{$usertype->type}}"> {{$usertype->type}} </option>
               @endforeach
            </select>
         
            <button type="submit" class="form-control mb-3 bg-info" name="submit"><i class="fa fa-refresh"></i> switch </button>
        </form>
    </div>
   </div>
  
    
</div>


@endsection('contents')