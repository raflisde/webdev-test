@extends('layouts.page')

@section('title', 'Add New Movie')

@section('content')

<div class="d-flex justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h5>Add New Movie List</h5>
            </div>
            <div class="card-body">
                <form class="pt-3" action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Title</label>
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control form-control-border" placeholder="Title">
                                    </div>
                                    @error('title')
                                        <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="row">


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Category Movie</label>
                                        <select class="custom-select form-control-border" name="category_id" id="exampleSelectBorder">
                                            @foreach ($category as $ct)
                                            <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date Release:</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="date_release" value="{{ old('date_release') }}" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    @error('date_release')
                                        <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Description</label>
                                        <textarea name="description" id="summernote" cols="30" rows="10">{{ old('description') }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="file" class="custom-file-input" value="" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('file')
                                        <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>



                        <div class="d-flex justify-content-end me-3">
                            <a href="{{route('movies.index')}}" class="btn btn-info mx-3 ">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Data</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection


@push('script')
<script>
$(document).ready(function() {
  $('#summernote').summernote();
});
  </script>

<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>


<script>
    $('#reservationdate').datetimepicker({
        locale: 'id',
        format: 'Y-MM-DD'
    });
</script>

@endpush

