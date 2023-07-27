@extends('layouts.admin')

@section('contents')


<div class="container py-3">
<div class="row">
    <div class="col-lg-6 text-center p-5">
        <i class="fa fa-user" style="font-size:100px;color:orange;"></i>
    </div>
    <div class="col-lg-6">
        <form action="{{route('usertype.update',$usertype->id)}}" method="post">
            @csrf
            @method('PATCH')
            
            <input type="text" name="type" class="form-control mb-3" value="{{$usertype->type}}">
         
            <button type="submit" class="form-control mb-3" name="submit"><i class="fa fa-refresh"></i> Update </button>
        </form>
    </div>
   </div>
  
    
</div>


@endsection('contents')