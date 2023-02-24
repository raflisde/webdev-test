@extends('layouts.page')

@section('title', 'Users Management')

@section('content')

<div class="col-md-12">
    <div class="card">
        @if ($message = Session::get ('message'))
        <span class="alert alert-success">
          <strong>Succeed</strong>
          <p>{{ $message }}</p>
        </span>
        @endif
        <div class="card-header">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('users.create') }}" class="btn btn-info btn-sm d-flex align-items-center">
                    <i class="fas fa-user-plus mx-1"></i>
                    Add User
                </a>
            </div>
        </div>

            <!-- /.card-header -->
            <div class="card-body">

                @if ($message = Session::get ('user_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>{{ $message }}
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
                @endif
                <table id="usertable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($user as $us)

                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $us->name }}</td>
                            <td>
                                {{ $us->email }}
                            </td>
                            <td class="text-center">
                                @if ($us->role == '1')
                                Admin
                                @elseif($us->role == '2')
                                User
                                @endif
                            </td>
                            <td class="d-flex justify-content-center">
                                {{-- @if (Auth::user()->role == 1) --}}
                                <a class="btn btn-warning mx-2" href="{{ route('users.edit', $us->id )}}">Edit</a>
                                @csrf
                                <a href="#" class="btn btn-danger deleteuser" data-id="{{ $us->id }}" data-name="{{ $us->email }}"><i class="fas fa-trash"></i></a>
                                {{-- @else
                                 <a href="">--</a>
                                @endif --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    </div>
</div>
@endsection

@push('script')

<script>
    $('.deleteuser').click(function() {
        var id = $(this).attr('data-id');
        var email = $(this).attr('data-name');
        Swal.fire({
            title: 'Yakin?',
            text: "Delete user with email [ " + email + " ]!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/users/destroy/" + id + ""
                Swal.fire(
                    'Deleted!',
                    'Your data has been deleted.',
                    'success'
                )
            }
        })
    });

    $(function () {
      $("#usertable").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endpush



