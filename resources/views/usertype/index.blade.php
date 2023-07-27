@extends('layouts.admin')

@section('contents')

<div class="container py-3">
    <a href="{{route('usertype.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New UserType </a>
</div>

<div class="container py-3">  
    <table class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Name</td>
          
            <td> Actions </td>
        </tr>
        @foreach($usertypes as $type)
        <tr>
            <td>{{$type->id}}</td>
            <td>{{$type->type}}</td>
          
            <td class="d-flex content-align-center"> 
                  <a href="{{route('usertype.edit',$type->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit </a>
                  &nbsp;&nbsp;
                  <form action="{{route('usertype.destroy',$type->id)}}" method="post">
                    @csrf 
                    @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button>
                   </form>
            </td>
        </tr>

        @endforeach  
    </table>
</div>


@endsection('contents')
