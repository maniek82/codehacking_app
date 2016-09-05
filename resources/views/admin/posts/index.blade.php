@extends('layouts.admin')


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
        <th>Created</th>
        <th>Updated</th>
        </tr>
    </thead>
    <tbody>
        @if($posts)
        @foreach($posts as $post)
      <tr>
        <td>{{ $post->id }}</td>
         <td><img height="60"src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/50x50'}}" alt=""></td>
        <td>{{ $post->user->name }}</td>
        <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
         <td>{{ $post->title}}</td>
         <td>{{ trim(substr($post->body, 0, 31))."..."}}</td>
        <td>{{ $post->created_at->diffForHumans()}}</td>
        <td>{{ $post->updated_at->diffForHumans()}}</td>
      </tr>
      @endforeach
    @endif 
    </tbody>
  </table>

@stop