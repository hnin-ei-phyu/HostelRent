@extends('layouts.admin')

@section('contents')


<div class="container py-3">
<div class="row">
    <div class="col-lg-6 text-center p-5">
        <i class="fa fa-list" style="font-size:100px;color:orange;"></i>
    </div>
    <div class="col-lg-6">
        <form action="{{route('township.update',$township->id)}}" method="post">
            @csrf
            @method('PATCH')
            
            <input type="text" name="township" class="form-control mb-3" value="{{$township->township}}">
         
            <button type="submit" class="form-control mb-3" name="submit"><i class="fa fa-refresh"></i> Update </button>
        </form>
    </div>
   </div>
  
    
</div>


@endsection('contents')