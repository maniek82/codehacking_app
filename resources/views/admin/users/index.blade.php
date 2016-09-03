@extends('layouts.admin')

@section('content')


<h2>Users</h2>
<table class="table table-hover table-bordered">
    <thead >
      <tr class="info">
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        @if($users)
        @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
@endsection