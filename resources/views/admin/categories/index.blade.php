@extends('layouts.admin')

@section('styles')
<style>
    .block {
        display:block;
        margin-top:10px;
        padding:2px 12px;
        
    }
    .edit {
        padding: 1px 19px;
    }
</style>
@stop
@section('content')

<h1 style="margin-bottom:50px;">Categories</h1>
<div class="col-sm-5">
     {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store','files'=>true])!!}

 <!--<form name="myForm" class="form-horizontal contactForm" role="form" method="POST" action="/posts">-->
        {{csrf_field()}}
   
          <div class="form-group">
                {!!Form::label('name','Name:') !!} 
               {!! Form::text('name',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            {!! Form::submit('Create Category',['class'=>'btn btn-primary ']) !!}
          </div>

       {!! Form::close()!!}
</div>

<div class="col-sm-7">
    <table class="table table-hover table-bordered">
    <thead >
      <tr class="info">
        <th>Id</th>
         <th>Name</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if($categories)
        @foreach($categories as $category)
      <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>

        <td>{{ $category->created_at ? $category->created_at->diffForHumans() :'No date entered'}}</td>
        <td>{{ $category->updated_at ? $category->updated_at->diffForHumans() : 'No date entered'}}</td>
        <td>
            <a class="btn btn-warning btn-xs edit" href="{{ route('admin.categories.edit',$category->id) }}">Edit</a>
            
            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy',$category->id]])!!}
              {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger block']) !!}
              {!! Form::close()!!}
     
      </tr>
      @endforeach
    @endif 
    </tbody>
  </table>
</div>
@stop