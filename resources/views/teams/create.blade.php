@extends('layouts.app')

@section('content')

<div class="card card-default">
 <div class="card-header">
  {{ isset($team) ? 'Edit Team' : 'Create Team' }}
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

  <form action="{{ isset($team) ? route('teams.update', $team->id) : route('teams.store') }}" method="POST">

   @csrf
   @if(isset($team))
   @method('PUT')
   @endif

   <div class="form-group">
    <label for="name">Name</label>
    <input type="text" id="name" class="form-control" name="name" value="{{ isset($team) ? $team->name : '' }}">
   </div>

   <div class="form-group">
    <button class="btn btn-success">
     {{ isset($team) ? 'Update Team' : 'Add Team' }}
    </button>
   </div>

  </form>

 </div>
</div>

@endsection