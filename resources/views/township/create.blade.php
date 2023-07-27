@extends('layouts.admin')

@section('contents')


<div class="container py-3">
<div class="row">
    <div class="col-lg-6 text-center p-5">
        <i class="fa fa-list" style="font-size:200px;color:orange;"></i>
    </div>
    <div class="col-lg-6">
        <form action="{{route('township.store')}}" method="post">
            @csrf
            
            <input type="text" name="town" class="form-control mb-3" placeholder="Enter Township">
         
            <button type="submit" class="form-control mb-3" name="submit"><i class="fa fa-save"></i> Save </button>
        </form>
    </div>
   </div>
  
    
</div>


@endsection('contents')