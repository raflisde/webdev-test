@extends('layouts.page')

@section('title', 'List Movies')

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
                <a href="{{ route('movies.create') }}" class="btn btn-info btn-sm d-flex align-items-center">
                    <i class="fas fa-plus mx-1"></i>
                    Add Movie
                </a>
            </div>
        </div>

            <!-- /.card-header -->
            <div class="card-body">
                <table id="usertable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class=" text-center">#</th>
                            <th>Title</th>
                            <th class=" text-center">Category</th>
                            <th class=" text-center">Date Release</th>
                            <th class=" text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($movies as $mv)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>
                                <a href="{{route('movies.show', $mv->id) }}">
                                    {{ $mv->title }}
                                </a>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-info">
                                    {{ $mv->category->name }}
                                </span>
                            </td>
                            <td class="text-center">{{ $mv->date_release }}</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-warning mx-2" href="{{ route('movies.edit', $mv->id )}}">Edit</a>
                                @csrf
                                <a href="#" class="btn btn-danger deletemovie" data-id="{{ $mv->id }}" data-name="{{ $mv->title }}"><i class="fas fa-trash"></i></a>
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
    $('.deletemovie').click(function() {
        var id = $(this).attr('data-id');
        var title = $(this).attr('data-name');
        Swal.fire({
            title: 'Yakin?',
            text: "Delete Movie with title [ " + title + " ]!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/movies/destroy/" + id + ""
                Swal.fire(
                    'Deleted!',
                    'Your data has been deleted.',
                    'success'
                )
            }
        })
    });

    $(function () {
      $("#movietable").DataTable({
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



