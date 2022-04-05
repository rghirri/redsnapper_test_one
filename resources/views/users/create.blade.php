@extends('layouts.app')

@section('content')

<div class="card card-default">
 <div class="card-header">
  {{ isset($user) ? 'Edit User' : 'Create User' }}
 </div>
 <div class="card-body">

  @if($errors->any())
  <div class="alert alert-danger">
   <ul class="list-group">
    @foreach($errors->all() as $error)
    <li class="list-group-item">
     {{ $error }}
    </li>
    @endforeach
   </ul>
  </div>

  @endif

  <form action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" method="POST">

   @csrf
   @if(isset($user))
   @method('PUT')
   @endif

   <div class="form-group">
    <label for="name">Name</label>
    <input type="text" id="name" class="form-control" name="name" value="{{ isset($user) ? $user->name : '' }}">
   </div>

   <div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" class="form-control" name="email" value="{{ isset($user) ? $user->email : '' }}">
   </div>

   <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" class="form-control" name="password">
   </div>

   <div class="form-group">
    <button class="btn btn-success">
     {{ isset($user) ? 'Update User' : 'Add User' }}
    </button>
   </div>

  </form>
 </div>
</div>

@endsection