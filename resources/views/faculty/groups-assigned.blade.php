@extends('layouts/faculty')
@section('title', 'Group Assigned')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <h3 class="text-bj mb-3 fw-bold">Groups Assigned</h3>
        @if (session('success'))
            <div id="alertMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div id="alertMessage" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div id="alertMessage" class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
    <div class="container">
        {{-- <div class="row">
            <div class="col card p-4 border-0 shadow rounded">
                <h4 class="text-bj mb-3 fw-bold">List New Franchise</h4>
                <form action="{{ route('add-franchise') }}" class="needs-validation" method="POST" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Franchise Name</label>
                            <input type="text" name="franchise_name" class="form-control"
                                placeholder="Eg: Bisjhintus Ooty" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Franchise URL</label>
                            <input type="url" name="url" class="form-control"
                                placeholder="Eg: https://ooty.bisjhintus.com" required>
                        </div>
                        <div class="col d-flex align-items-end">
                            <button type="submit" class="btn btn-bj">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
        <!-- Assigned Groups -->
        <div class="row mt-4">
            <div class="col card p-4 border-0 shadow rounded">
                <h4 class="text-bj fw-bold">Listed Groups</h4>
                <table class="table">
                    <thead>
                        <th>Group Name</th>
                        <th>Course</th>
                        <th>Progress</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Group 4</td>
                            <td>MCA</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#progressViewModal"><i class="bi bi-eye-fill"></i></button>
                            </td>
                            <td>
                                <div class="more-btn">
                                    <button class="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item" data-toggle="modal" data-target="#XeditModal"
                                            >Edit</button>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#XdeleteModal"
                                            >Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Group 5</td>
                            <td>BCA</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#progressViewModal"><i class="bi bi-eye-fill"></i></button>
                            </td>
                            <td>
                                <div class="more-btn">
                                    <button class="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item" data-toggle="modal" data-target="#XeditModal"
                                            >Edit</button>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#XdeleteModal"
                                            >Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Group 11</td>
                            <td>BCA</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#progressViewModal"><i class="bi bi-eye-fill"></i></button>
                            </td>
                            <td>
                                <div class="more-btn">
                                    <button class="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item" data-toggle="modal" data-target="#XeditModal"
                                            >Edit</button>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#XdeleteModal"
                                            >Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- @foreach ($franchises as $f)
                            <tr>
                                <td>{{ $f['name'] }}</td>
                                <td><a href="{{ $f['url'] }}">{{ $f['url'] }}</a></td>
                                <td>
                                    <div class="more-btn">
                                        <button class="dropdown" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item" data-toggle="modal" data-target="#editModal"
                                                onclick="editFranchiseModal({{ $f['id'] }})">Edit</button>
                                            <button class="dropdown-item" data-toggle="modal" data-target="#deleteModal"
                                                onclick="deleteFranchiseModal({{ $f['id'] }})">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        {{-- <span class="mx-2">{{ $franchises->links() }}</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- franchise edit modal start --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="editModalLabel">Edit Franchise Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-franchise') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <label class="title form-label">Franchise Name</label>
                                <input type="text" name="franchise_name" class="form-control" id="franchise_name"
                                    required>
                                <input type="text" name="id" id="franchise_id" hidden>
                            </div>
                            <div class="col-12">
                                <label class="title form-label">Franchise URL</label>
                                <input type="text" name="url" id="franchise_url" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-bj">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- franchise edit modal end --}}
    {{-- franchise edit modal start --}}
    <div class="modal fade" id="progressViewModal" tabindex="-1" role="dialog" aria-labelledby="progressViewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="progressViewModalLabel">Progress Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-franchise') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <label class="title form-label">Last updated</label>
                                <input type="text" name="franchise_name" value="14-04-24" class="form-control" id="franchise_name"
                                    required reaadonly>
                                <input type="text" name="id" id="franchise_id" hidden>
                            </div>
                            <div class="col-12">
                                <label class="title form-label">Progress Remarks</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control">
1. Completed front end designs
2. Connectivity with database done
3. Login and registration working fine
4. Working on group creation and student assignment
                                </textarea>
                                {{-- <input type="text" name="url" id="franchise_url" class="form-control" required> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-bj">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- franchise delete modal start --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('delete-franchise') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        <div class="form-row mb-2">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <i class="rounded-circle bi bi-exclamation-triangle-fill text-warning"
                                        style="font-size: 50px;"></i>
                                </div>
                                <h4 class="text-center text-dark">Delete Franchise</h6>
                                    <p class="text-danger text-center">Are you sure you want to delete this franchise ? This
                                        action cannot be undone.</p>
                                    <input type="text" name="id" id="fid" value="" hidden>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary w-25 me-5"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger w-25">Yes, delete !</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- franchise delete modal end --}}
@endsection
