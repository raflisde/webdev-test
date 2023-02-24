@extends('layouts.page')

@section('title', 'Category-Movie')

@section('content')
<div class="justify-content-center">
         <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if ($message = Session::get ('message'))
                        <span class="alert alert-success">
                            <strong>Succeed</strong>
                            <p>{{ $message }}</p>
                        </span>
                        @endif
                        <div class="card-body">
                            <table id="categorytable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class=" text-center">#</th>
                                        <th class=" text-center">Category Name</th>
                                        <th class=" text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($category as $ct)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="text-center">{{ $ct->name }}</td>
                                        <td class="d-flex justify-content-center">

                                                <a class="btn btn-warning mx-2" href="{{ route('category-movie.edit', $ct->id )}}">Edit</a>
                                                @csrf
                                                <a href="#" class="btn btn-danger deletecategory" data-id="{{ $ct->id }}" data-name="{{ $ct->name }}"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form class="pt-3" action="{{ route('category-movie.store') }}" method="POST">
                                @csrf
                                <h5>Add New Data</h3>
                                <hr>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Category Name</label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-border" placeholder="Category Name">
                                    </div>
                                    @error('name')
                                    <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <br>
                                <div class="d-flex justify-content-end me-3">
                                    <button type="reset" class="btn btn-info mx-3 ">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection

@push('script')

<script>
    $('.deletecategory').click(function() {
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        Swal.fire({
            title: 'Yakin?',
            text: "delete Category with name [ " + name + " ]!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/category-movie/destroy/" + id + ""
                Swal.fire(
                    'Deleted!',
                    'Your data has been deleted.',
                    'success'
                )
            }
        })
    });

    $(function () {
      $("#categorytable").DataTable({
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
