@extends('layouts.admin')

@section('content')

    <h1>Create User</h1>
     @include('includes.form_error') 
    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store','class'=>'form-horizontal','files'=>true])!!}

 <!--<form name="myForm" class="form-horizontal contactForm" role="form" method="POST" action="/posts">-->
        {{csrf_field()}}
   
          <div class="form-group">
              <div class="col-sm-2">
                  {!!Form::label('name','Name:') !!} 
              </div>
            
            <div class="col-sm-11">
               {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
          
          </div>
          
           <div class="form-group">
              <div class="col-sm-2">
                  {!!Form::label('email','Email') !!} 
              </div>
            
            <div class="col-sm-11">
               {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>
          
          </div>
          
            <div class="form-group">
              <div class="col-sm-2">
                  {!!Form::label('role_id','Role:') !!} 
              </div>
            
            <div class="col-sm-11">
               {!! Form::select('role_id',[''=>'Choose Options']+$roles,null,['class'=>'form-control']) !!}
            </div>
          
          </div>
          
            <div class="form-group">
              <div class="col-sm-2">
                  {!!Form::label('is_active','Status:') !!} 
              </div>
            
            <div class="col-sm-11">
               {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control']) !!}
            </div>
          
          </div>
          
          <div class="form-group">
              <div class="col-sm-2">
                  {!!Form::label('password','Password:') !!} 
              </div>
            
            <div class="col-sm-11">
               {!! Form::password('password',['class'=>'form-control']) !!}
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
               <div class="col-sm-10">
                   {!! Form::submit('Add User',['class'=>'btn btn-info']) !!}
               </div>
          </div>

       {!! Form::close()!!}
     
     
      
       
@endsection