@extends('layouts.admin')

@section('contents')

<div class="container py-3">
    <a href="{{route('category.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Category </a>
</div>

<!--search bar-->
<div class="container py-3">
    <div class="row" class="d-flex content-align-center">
        <div class="col"> {{$categories->links()}} </div>
        <div class="col d-flex justify-content-end">
            <form action="{{route('category.search')}}" method="post">
                @csrf
                <input type="text" name="search" id="">
                <button><i class="fa fa-search"></i> Search </button>
            </form>
         </div>
    </div>
</div>
<!--search bar-->

<div class="container py-3">  
    <table class="table table-striped">
        <tr>
            <td>Id</td>
            <td>Name</td>
          
            <td> Actions </td>
        </tr>
        @foreach($categories as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
          
            <td class="d-flex content-align-center"> 
                  <a href="{{route('category.edit',$cat->id)}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit </a>
                  &nbsp;&nbsp;
                  <form action="{{route('category.destroy',$cat->id)}}" method="post">
                    @csrf 
                    @method('DELETE')
                      <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete </button>
                   </form>
            </td>
        </tr>

        @endforeach  
    </table>
</div>

<div class="container">
    {{$categories->links()}}
</div>

@endsection('contents')
