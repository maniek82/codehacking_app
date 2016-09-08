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
<h3>replies</h3>
 @if( $replies)
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
       @foreach ($replies as $reply)
      <tr>
        <td>{{ $reply->id }}</td>
        <td>{{ $reply->author }}</td>
        <td>{{ $reply->email }}</td>
        <td>{{ $reply->body }}</td>
        <td> <a href="{{ route('home.post',$reply->comment->post->id) }}">View Post</a></td>
        <td>{{ $reply->created_at->diffForHumans()}}</td>
        <td>{{ $reply->updated_at->diffForHumans()}}</td>
        <td>
           @if ($reply->is_active == 1)
              {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]])!!}
              <input type="hidden" name="is_active" value="0">
              {!! Form::submit('Un-approve',['class'=>'btn btn-success btn-xs block']) !!}
              {!! Form::close()!!}
            @else 
            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update',$reply->id]])!!}
              <input type="hidden" name="is_active" value="1">
              {!! Form::submit('Approve',['class'=>'btn btn-info btn-xs block']) !!}
              {!! Form::close()!!}
            
           @endif
              
          
              {!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy',$reply->id]])!!}
              {!! Form::submit('Delete',['class'=>'btn btn-danger btn-xs block']) !!}
              {!! Form::close()!!}
           
        </td>
     
      </tr>
@endforeach
  
    </tbody>
  </table>

   @else 
   <h1 class="text-center">No replies</h1>
      @endif 
@stop