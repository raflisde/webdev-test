@extends('layouts.page')

@section('title', 'Edit Category')

@section('content')

<div class="d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="pt-3" action="{{ route('category-movie.update', $category->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Category Name</label>
                                        <input type="text" name="name" value="{{ $category->name }}" class="form-control form-control-border" placeholder="Category Name">
                                    </div>
                                    @error('name')
                                        <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        <div class="d-flex justify-content-end me-3">
                            <a href="{{route('category-movie.index')}}" class="btn btn-info mx-3 ">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Data</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
