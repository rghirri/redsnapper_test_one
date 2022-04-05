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
    <th>Role</th>
    <th>Team Count</th>
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
     <td>
      {{ $user->role }}
     </td>
     <td>
      {{ $user->teams->count() }}
     </td>
     <td>
      <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-sm text-white">
       Edit
      </a>
      <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $user->id }})">
       Delete
      </button>
     </td>
    </tr>

    @endforeach
   </tbody>
  </table>

  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">

    <form action="" method="POST" id="deleteUserForm">

     @csrf
     @method('DELETE')

     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <div class="modal-body">
       <p class="text-center text-bold">Are you sure you want to delete user?</p>
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
function handleDelete(id) {

 var form = document.getElementById('deleteUserForm');

 form.action = '/user/' + id

 $('#deleteModal').modal('show')

 // console.log('deleting', form)

}
</script>


@endsection