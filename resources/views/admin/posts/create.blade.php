@extends('layouts.admin')


@section('content')
<h1>Create Post</h1>

 @include('includes.form_error') 
    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store','class'=>'form-horizontal','files'=>true])!!}

 <!--<form name="myForm" class="form-horizontal contactForm" role="form" method="POST" action="/posts">-->
        {{csrf_field()}}
   
          <div class="form-group">
              <div class="col-sm-2">
                  {!!Form::label('title','Title:') !!} 
              </div>
            
            <div class="col-sm-11">
               {!! Form::text('title',null,['class'=>'form-control']) !!}
            </div>
          
          </div>
          
           <div class="form-group">
              <div class="col-sm-2">
                  {!!Form::label('category_id','Category:') !!} 
              </div>
            
            <div class="col-sm-11">
               {!! Form::select('category_id',[''=>'Choose Category']+$categories,null,['class'=>'form-control']) !!}
            </div>
          
          </div>
          
            <div class="form-group">
              <div class="col-sm-2">
                  {!!Form::label('photo_id','Photo:') !!} 
              </div>
            
            <div class="col-sm-11">
               {!! Form::file('photo_id') !!}
            </div>
          
          </div>
          
            <div class="form-group">
              <div class="col-sm-2">
                  {!!Form::label('body','Description:') !!} 
              </div>
            
            <div class="col-sm-11">
               {!! Form::textarea('body',null,['class'=>'form-control','rows'=>5]) !!}
            </div>
          
          </div>
      
          <div class="form-group">
               <div class="col-sm-10">
                   {!! Form::submit('Create Post',['class'=>'btn btn-primary']) !!}
               </div>
          </div>

       {!! Form::close()!!}
     

@stop