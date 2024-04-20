@extends('layouts/admin')
@section('title', 'Profile Edit')
@section('content')
    <style>
        .custom-red {
            color: red;
        }

        .bg-transparent {
            border: none;
        }
    </style>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success">
                <span>{{ session('status') }}</span>
            </div>
        @endif
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Faculty Profile</h1>
        </div>
        <div class="row">
            <div class="col">
                <div class="card bg-transparent">
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-6">
                                    <div class="card shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                                        <div class="card-body">
                                            <h4>Profile Information</h4>
                                            <p>Update your account's profile information and email address.</p>
                                            <div class="col-12 mb-3">
                                                <label class="form-label">Faculty Id</label>
                                                <input type="text" class="form-control" name="name" value="">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" name="name" value="">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" name="name" value="">
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <!-- Save Button -->
                                                    <button type="submit" class="btn btn-primary w-25">Save</button>
                                                    <!-- End of First Section -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="card shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                                        <div class="card-body">
                                            <h4>Update Password</h4>
                                            <p>Update your account's profile Password.</p>

                                            <div class="col-12 mb-3">
                                                <label class="form-label">Current Password <span
                                                        class="custom-red">*</span></label>
                                                <input type="text" class="form-control" name="name" value="">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label">New Password <span
                                                        class="custom-red">*</span></label>
                                                <input type="text" class="form-control" name="name" value="">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label">Confirm Password <span
                                                        class="custom-red">*</span></label>
                                                <input type="email" class="form-control" name="name" value="">
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <!-- Save Button -->
                                                    <button type="submit" class="btn btn-primary w-25">Update</button>
                                                    <!-- End of First Section -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                {{-- <div class="col-6 mb-3">
                                    <label class="form-label">Faculty Id</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Course</label>
                                    <select class="form-control" name="course">
                                        <option value="BCA">BCA</option>
                                        <option value="MCA">MCA</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Teacher Guide</label>
                                    <input type="text" class="form-control" name="teacher_guide">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Group Members</label>
                                    <input type="text" class="form-control" name="group_members">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Project Topic</label>
                                    <input type="text" class="form-control" name="project_topic">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Year</label>
                                    <input type="text" class="form-control" name="year">
                                </div>
                                <div class="col-6 mb-3">
                                    <label class="form-label">Semester</label>
                                    <input type="text" class="form-control" name="semester">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!-- Save Button -->
                                    <button type="submit" class="btn btn-primary w-25">Save</button>
                                    <!-- End of First Section -->
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>



        {{-- <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Profile Information</h4>
                        <p>Update your account's profile information and email address.</p>
                        <form method="post" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')

                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-bj w-25" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4>Update Password</h4>
                        <p>Ensure your account is using a long, random password to stay secure.</p>
                        <form method="post" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control" name="current_password">
                                <div class="mt-2 text-danger">
                                    @if ($errors->updatePassword->has('current_password'))
                                        <span>{{ $errors->updatePassword->first('current_password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" name="password">
                                <div class="mt-2 text-danger">
                                    @if ($errors->updatePassword->has('password'))
                                        <span>{{ $errors->updatePassword->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-bj w-25" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
