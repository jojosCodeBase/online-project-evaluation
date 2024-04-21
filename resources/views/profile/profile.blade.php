@extends('layouts/admin')
@section('title', 'Profile Edit')
@section('content')
    <style>
        .custom-red {
            color: red;
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
                <form method="post" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-6">
                            <div class="card shadow-sm p-3 mb-5 bg-body-tertiary rounded">
                                <div class="card-body">
                                    <h4>Profile Information</h4>
                                    <p>Update your account's profile information and email address.</p>
                                    <div class="col-12 mb-3 ps-0">
                                        <label class="form-label">Employee Id</label>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>
                                    <div class="col-12 mb-3 ps-0">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>
                                    <div class="col-12 mb-3 ps-0">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="name" value="">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <!-- Save Button -->
                                            <button type="submit" class="btn btn-primary btn-bj w-25">Save</button>
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

                                    <div class="col-12 mb-3 ps-0">
                                        <label class="form-label">Current Password <span class="custom-red">*</span></label>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>
                                    <div class="col-12 mb-3 ps-0">
                                        <label class="form-label">New Password <span class="custom-red">*</span></label>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>
                                    <div class="col-12 mb-3 ps-0">
                                        <label class="form-label">Confirm Password <span class="custom-red">*</span></label>
                                        <input type="email" class="form-control" name="name" value="">
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <!-- Save Button -->
                                            <button type="submit" class="btn btn-primary btn-bj w-25">Update</button>
                                            <!-- End of First Section -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
