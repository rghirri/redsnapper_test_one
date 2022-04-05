@extends('layouts.app')

@section('content')

<div class="card card-default">
 <div class="card-header">
  Create User
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

  <form action="{{ route('user.store') }}" method="POST">

   @csrf


   <div class="form-group">
    <label for="name">Name</label>
    <input type="text" id="name" class="form-control" name="name">
   </div>

   <div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" class="form-control" name="email">
   </div>

   <div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" class="form-control" name="password">
   </div>

   <div class="form-group">
    <button class="btn btn-success">
     Add User
    </button>
   </div>

  </form>
 </div>
</div>

@endsection