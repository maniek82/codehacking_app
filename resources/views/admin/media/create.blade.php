@extends('layouts.admin')

@section('styles')
  link:<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" type="text/css" />
@stop

@section('content')
<h1> Upload Media</h1>

 {!! Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store','class'=>'dropzone','files'=>true])!!}


       {!! Form::close()!!}
     

@stop


@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@stop