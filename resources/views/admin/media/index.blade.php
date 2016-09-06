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
        <td><img src="{{ $photo->file }}" alt=""></td>
     
        <td>{{ $photo->created_at ? $photo->created_at->diffForHumans() :'No date'}}</td>
        <td>
            <a style="display:block"class="btn btn-warning btn-xs" href="{{ route('admin.categories.edit',$photo->id) }}">Edit</a>
           
        </td>
     
      </tr>
      @endforeach
   
    </tbody>
  </table>
   @endif 
@stop