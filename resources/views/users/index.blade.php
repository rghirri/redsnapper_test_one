@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">

 <a href="{{ route('user.create') }}" class="btn btn-success float-right">
  Add User
 </a>

</div>


<div class="card card-default">
 <div class="card-header">
  Users
 </div>
 <div class="card-body">
  <table class="table">
   <thead>
    <th>Name</th>
    <th>Email</th>
    <th></th>
   </thead>
   <tbody>
    @foreach($users as $user)

    <tr>
     <td>
      {{ $user->name }}
     </td>
     <td>
      {{ $user->email }}
     </td>
    </tr>

    @endforeach
   </tbody>
  </table>
 </div>
</div>

@endsection