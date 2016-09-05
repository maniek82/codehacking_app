@extends('layouts.admin')


@section('content')

<div class="col-sm-5">
     {!! Form::model($category,['method'=>'PATCH', 'action'=>['AdminCategoriesController@update',$category->id],'files'=>true])!!}

 <!--<form name="myForm" class="form-horizontal contactForm" role="form" method="POST" action="/posts">-->
        {{csrf_field()}}
   
          <div class="form-group">
                {!!Form::label('name','Name:') !!} 
               {!! Form::text('name',null,['class'=>'form-control']) !!}
          </div>

          <div class="form-group">
            {!! Form::submit('UpdateCategory',['class'=>'btn btn-primary ']) !!}
          </div>

       {!! Form::close()!!}
</div>
@stop