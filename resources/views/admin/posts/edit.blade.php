@extends('layouts.admin')


@section('content')
<h1>Edit Post</h1>
<div class="row">
 @include('includes.form_error') 
 </div>
 <div class="row">
     <div class="col-sm-3">
         <img src="{{$post->photo->file}}" alt="" class="img-responsive">
     </div>
     <div class="col-sm-8">
         
    
    {!! Form::model($post,['method'=>'PATCH', 'action'=>['AdminPostsController@update',$post->id],'files'=>true])!!}

 <!--<form name="myForm" class="form-horizontal contactForm" role="form" method="POST" action="/posts">-->
        {{csrf_field()}}
   
          <div class="form-group">
          
                  {!!Form::label('title','Title:') !!} 
          
            
           
               {!! Form::text('title',null,['class'=>'form-control']) !!}
         
          
          </div>
          
           <div class="form-group">
             
                  {!!Form::label('category_id','Category:') !!} 
             
            
           
               {!! Form::select('category_id',[''=>'Choose Category']+$categories,null,['class'=>'form-control']) !!}
            
          
          </div>
          
            <div class="form-group">
            
                  {!!Form::label('photo_id','Photo:') !!} 
            
               {!! Form::file('photo_id') !!}
         
          
          </div>
          
            <div class="form-group">
              
                  {!!Form::label('body','Description:') !!} 
            
               {!! Form::textarea('body',null,['class'=>'form-control','rows'=>5]) !!}
           
          
          </div>
      
          <div class="form-group">
               
                   {!! Form::submit('Update Post',['class'=>'btn btn-warning col-md-4']) !!}
              
          </div>

       {!! Form::close()!!}
       <div class="col-md-4"></div>
       <!--DELETE FORM-->
         {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy',$post->id]])!!}
    
                {{csrf_field()}}
                   <div class="form-group">
                          
                     {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-md-4']) !!}
                          
                 </div>
 
         
        {!! Form::close()!!}
     </div>
  </div>   

@stop