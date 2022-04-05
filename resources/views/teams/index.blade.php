@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">

 <a href="{{ route('teams.create') }}" class="btn btn-success float-right">
  Create Team
 </a>

</div>

<div class="card card-default">
 <div class="card-header">
  Teams
 </div>
 <div class="card-body">
  <table class="table">
   <thead>
    <th>Name</th>
    <th>User</th>
    <th></th>
   </thead>
   <tbody>
    @foreach($teams as $team)

    <tr>
     <td>
      {{ $team->name }}
     </td>
     <td>
      {{ $team->user->name }}
     </td>
     <td>
      <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-info btn-sm text-white">
       Edit
      </a>
      <button class="btn btn-danger btn-sm" onclick="handleTeamDelete({{ $team->id }})">
       Delete
      </button>
     </td>
    </tr>

    @endforeach
   </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="deleteTeamModal" tabindex="-1" role="dialog" aria-labelledby="deleteTeamModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">

    <form action="" method="POST" id="deleteTeamForm">

     @csrf
     @method('DELETE')

     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="deleteTeamModalLabel">Delete Team</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <div class="modal-body">
       <p class="text-center text-bold">Are you sure you want to delete team?</p>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
       <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </div>
     </div>
    </form>

   </div>
  </div>

 </div>
</div>

@endsection

@section('scripts')

<script>
function handleTeamDelete(id) {

 var form = document.getElementById('deleteTeamForm');

 form.action = '/teams/' + id

 $('#deleteTeamModal').modal('show')

}
</script>

@endsection