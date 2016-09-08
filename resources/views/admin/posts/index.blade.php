@extends('layouts.admin')
@section('styles')
<style>
  .block {
        display:block;
        margin-top:10px;
        padding:2px 12px;
        
    }
    .edit {
        padding: 2px 20px;
    }
    .btn-info {
        margin-bottom: 5px;
        padding: 2px 16px;
    }
</style>

@stop

@section('content')
<h1>Posts</h1>
<table class="table table-hover table-bordered">
    <thead >
      <tr class="info">
        <th>Id</th>
         <th>Photo</th>
        <th>Owner</th>
        <th>Category Id</th>
        <th>Title</th>
        <th>Body</th>
        <th>Comments</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if($posts)
        @foreach($posts as $post)
      <tr>
        <td>{{ $post->id }}</td>
         <td><a href="{{route('home.post',$post->id)}}"><img height="60"src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50x50'}}" alt=""></a></td>
        <td>{{ $post->user->name }}</td>
        <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
         <td>{{ $post->title}}</td>
         <td>{{ str_limit($post->body, 20) }}</td>
         <td><a href="{{ route('admin.comments.show',$post->id) }}">View</a></td>
        <td>{{ $post->created_at->diffForHumans()}}</td>
        <td>{{ $post->updated_at->diffForHumans()}}</td>
        <td>
              <a class="btn btn-xs btn-info " href="{{ route('home.post',$post->id) }}">View</a>
               <a class="btn btn-warning btn-xs edit" href="{{ route('admin.posts.edit',$post->id) }}">Edit</a>
          
              {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy',$post->id]])!!}
              {!! Form::submit('Delete',['class'=>'btn btn-danger block ']) !!}
              {!! Form::close()!!}
           
        </td>
     
      </tr>
      @endforeach
    @endif 
    </tbody>
  </table>

@stop