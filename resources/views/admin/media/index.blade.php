@extends('layouts.admin')


@section('content')
<h1>Media</h1>
@if($photos)
<div class="col-sm-7">
    <table class="table table-hover table-bordered">
    <thead >
      <tr class="info">
        <th>Id</th>
         <th>Name</th>
        <th>Created</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
       
        @foreach($photos as $photo)
      <tr>
        <td>{{ $photo->id }}</td>
        <td><img height="50"src="{{ $photo->file }}" alt=""></td>
     
        <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() :'No date'}}</td>
        <td>
             {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediaController@destroy',$photo->id]])!!}
              {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
              {!! Form::close()!!}
        </td>
     
      </tr>
      @endforeach
   
    </tbody>
  </table>
   @endif 
@stop