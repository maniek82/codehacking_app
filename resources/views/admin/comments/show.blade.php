@extends('layouts.admin')
<style>
  .block {
        display:block;
        margin-top:1px;
        padding:2px 12px;
        
    }
    .edit {
        padding: 2px 20px;
    }
</style>

@section('content')
<h3>Comments for:<b>{{$post->title }}</b></h3>
 @if( $comments)
<table class="table table-hover table-bordered">
    <thead >
      <tr class="info">
        <th>Id</th>
         <th>Author</th>
        <th>Email</th>
        <th>Body</th>
       
        <th>Post</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($comments as $comment)
      <tr>
        <td>{{ $comment->id }}</td>
        <td>{{ $comment->author }}</td>
        <td>{{ $comment->email }}</td>
        <td>{{ $comment->body }}</td>
        <td> <a href="{{ route('home.post',$comment->post->id) }}">View Post</a></td>
        <td>{{ $comment->created_at->diffForHumans()}}</td>
        <td>{{ $comment->updated_at->diffForHumans()}}</td>
        <td>
           @if ($comment->is_active == 1)
              {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentController@update',$comment->id]])!!}
              <input type="hidden" name="is_active" value="0">
              {!! Form::submit('Un-approve',['class'=>'btn btn-success btn-xs block']) !!}
              {!! Form::close()!!}
            @else 
            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentController@update',$comment->id]])!!}
              <input type="hidden" name="is_active" value="1">
              {!! Form::submit('Approve',['class'=>'btn btn-info btn-xs block']) !!}
              {!! Form::close()!!}
            
           @endif
              
          
              {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentController@destroy',$comment->id]])!!}
              {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs block']) !!}
              {!! Form::close()!!}
           
        </td>
     
      </tr>
@endforeach
  
    </tbody>
  </table>

   @else 
   <h1 class="text-center">No Comments</h1>
      @endif 
@stop