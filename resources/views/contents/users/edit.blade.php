@extends('layouts.page')

@section('title', 'Edit Users')

@section('content')

<div class="d-flex justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form class="pt-3" action="{{ route('users.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Fullname</label>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control form-control-border" placeholder="Fullname">
                                    </div>
                                    @error('name')
                                        <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleSelectBorder">Role</label>
                                        <select class="custom-select form-control-border" name="role" id="exampleSelectBorder">
                                        <option value="1" {{ $user->role == '1' ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ $user->role == '2' ? 'selected' : '' }}>Users</option>
                                        </select>
                                    </div>
                                    @error('role')
                                        <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Email Address</label>
                                        <input type="email" value="{{ $user->email }}" name="email" class="form-control form-control-border" placeholder="Email Address">
                                    </div>
                                    @error('email')
                                        <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputBorder">Password</label>
                                        <input type="password" name="password" class="form-control form-control-border" placeholder="Password">
                                        <span class="alert text-danger text-sm">Let password empty if you did't change password</span>
                                    </div>
                                    @error('password')
                                        <span class="alert text-danger text-sm">*{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        <div class="d-flex justify-content-end me-3">
                            <a href="{{route('users.index')}}" class="btn btn-info mx-3 ">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Data</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
