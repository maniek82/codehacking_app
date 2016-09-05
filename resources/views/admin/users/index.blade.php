@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_user'))
 <p class="alert alert-danger">{{session('deleted_user') }}</p>
@endif
<h2>Users</h2>
<table class="table table-hover table-bordered">
    <thead >
      <tr class="info">
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        @if($users)
        @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <!--<td><img height="50"src="/images/{{$user->photo ? $user->photo->file : 'No user photo'}}"></td>--> 
        <!--z photo class accessor funckcji mozemy zrobic to bardziej dynamiczne-->
         <td><img height="50"src="{{$user->photo ? $user->photo->file : 'http://placehold.it/50x50'}}"></td>
        <td>{{$user->name}} <a class="btn btn-warning btn-xs" href="{{ route('admin.users.edit',$user->id) }}">Edit</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
        <td>
         {{ $user->is_active ==1 ? 'Active' : 'Not Active'}}
        </td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
@endsection