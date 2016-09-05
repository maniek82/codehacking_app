@extends('layouts.admin')


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
            <a style="display:block"class="btn btn-warning btn-xs" href="{{ route('admin.categories.edit',$category->id) }}">Edit</a>
            <a style="margin-top:15px;display:block"class="btn btn-danger btn-xs" href="{{ route('admin.categories.edit',$category->id) }}">Delete</a>
        </td>
     
      </tr>
      @endforeach
    @endif 
    </tbody>
  </table>
</div>
@stop