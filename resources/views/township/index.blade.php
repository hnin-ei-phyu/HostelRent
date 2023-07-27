@extends('layouts.admin')

@section('contents')

<div class="container py-3">
    <a href="{{route('township.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Township </a>

</div>

<div class="container py-3">
    
    <table class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Township</td>
          
            <td> Actions </td>
        </tr>
        @foreach($townships as $town)
        <tr>
            <td>{{$town->id}}</td>
            <td>{{$town->township}}</td>
          
            <td class="d-flex content-align-center"> 
                  <a href="{{route('township.edit',$town->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit </a>
                  &nbsp;&nbsp;
                  <form action="{{route('township.destroy',$town->id)}}" method="post">
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
