@extends('layouts.admin')


@section('content')
<h1 style="margin-bottom:50px;">Categories</h1>
<div class="col-sm-12">
     {!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',$category->id],'files'=>true])!!}

 <!--<form name="myForm" class="form-horizontal contactForm" role="form" method="POST" action="/posts">-->
        {{csrf_field()}}
   
          <div class="form-group">
                {!!Form::label('name','Name:') !!} 
               {!! Form::text('name',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            {!! Form::submit('UpdateCategory',['class'=>'btn btn-primary col-sm-5 ']) !!}
          </div>

       {!! Form::close()!!}
       
       <div class="col-sm-2"></div>
       
         {!! Form::open(['method'=>'DELETE', 'action'=>['AdminCategoriesController@destroy',$category->id]])!!}

 <!--<form name="myForm" class="form-horizontal contactForm" role="form" method="POST" action="/posts">-->
        {{csrf_field()}}

          <div class="form-group">
            {!! Form::submit('Delete Category',['class'=>'btn btn-danger col-sm-5 ']) !!}
          </div>

       {!! Form::close()!!}

</div>

   

@stop

