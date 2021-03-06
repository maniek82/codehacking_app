@extends('layouts.blog-post')

@section('content')

   <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$post->title}}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans() }}</p>

                <hr>

                <!-- Preview Image -->
                <img height="30" src="{{$post->photo->file }}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{$post->body }}</p>

                <hr>
 @if(Session::has('comment_message'))
    {{ session('comment_message') }}
 @endif
                <!-- Blog Comments -->
@if(Auth::check())
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                     
                     {!! Form::open(['method'=>'POST', 'action'=>'PostCommentController@store']) !!}
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                     {{csrf_field()}}
                            <div class="form-group">
                               {!!Form::label('body','Title:') !!} 
                                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Create comment',['class'=> 'btn btn-primary']) !!}
                            </div>

                {!! Form::close()!!}
               </div>
        @endif
                <hr>

                <!-- Posted Comments -->

<!--@if( count($comments) >0)-->
@foreach($comments as $comment)
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="30"class="media-object img-responsive" src="{{$comment->photo }}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans() }}</small>
                        </h4>
                       <p> {{$comment->body }}</p>
                        
                        @if(count($comment->replies) > 0)
                        @foreach($comment->replies as $reply)
                  
                  @if($reply->is_active == 1)
                          <!-- Nested Comment -->
                        <div  id="nested-comment"class="media ">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{$reply->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$reply->author }}
                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                </h4>
                               <p>{{$reply->body}}</p>
                            </div>
                     
                       <div class="comment-reply-container">
                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                        <div class="comment-reply col-sm-6">
                            <!--Reply commnet form-->
                               {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply'])!!}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                               <div class="form-group">
                             {!! Form::label('body','Body:' ) !!}
                             {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                             </div>
                             <div class="form-group">
                             {!! Form::submit("Submit",['class'=>'btn btn-primary']) !!}
                             </div>
                           {!! Form::close()!!}
                            <!--end of reply form-->
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                     </div>
                      @endif
                      @endforeach
                     @else 
                     <p>No Replies</p>
                     
                     @endif
                     
                        
                   
                    </div>
                </div>
               
    @endforeach
<!--@endif-->
           
@endsection

@section('scripts')
<script>
    $('.comment-reply-container .toggle-reply').click(function() {
        $(this).next().slideToggle('slow')
    });
</script>

@endsection