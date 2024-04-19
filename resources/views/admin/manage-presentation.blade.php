@extends('layouts/admin')
@section('title', 'Manage Groups')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-5">
            <h3 class="text-bj mb-3 fw-bold">Manage Presentations</h3>
        </div>
        <div class="col-5 pe-0">
            <input type="search" class="form-control" placeholder="Search Presentation">
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-bj" data-toggle="modal" data-target="#addModal">Add Presentations
                +</button>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col card p-4 border-0 shadow rounded">
            <h4 class="text-bj fw-bold mb-3">Listed Presentations</h4>
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Progress Presentation l</td>
                        <td>Progress</td>
                        <td>
                            <div class="more-btn">
                                <button class="dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <button class="dropdown-item edit-btn" data-toggle="modal"
                                        data-target="#groupEditModal" data-group-id="">Edit</button>
                                    <button class="dropdown-item" data-toggle="modal" data-target="#deleteModal"
                                        data-group-id="">Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    <span class="mx-2"></span>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- group add modal start --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-bj">
                <h5 class="modal-title text-light fw-bold" id="addModalLabel">Add Presentation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add-group') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12 mb-3">
                            <label class="title form-label">Presentation Name</label>
                            <input type="text" name="group_name" class="form-control" required>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="title form-label">Type</label>
                            <select name="course" class="form-select">
                                <option value="" selected>Select Presentation from list</option>
                                <option value="MCA">Synopsis</option>
                                <option value="BCA">Progress</option>
                                <option value="BCA">Final</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-bj">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- group add modal end --}}

{{-- group edit modal start --}}
<div class="modal fade" id="groupEditModal" tabindex="-1" role="dialog" aria-labelledby="groupEditModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-bj">
                <h5 class="modal-title text-light fw-bold" id="groupEditModalLabel">Edit Group Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('add-group') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12 mb-3">
                            <label class="title form-label">Presentation Name</label>
                            <input type="text" name="group_name" class="form-control" required>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="title form-label">Type</label>
                            <select name="course" class="form-select">
                                <option value="" selected>Select Project from list</option>
                                <option value="MCA">Synopsis</option>
                                <option value="BCA">Progress</option>
                                <option value="BCA">Final</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-bj">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

 {{-- group delete modal Start --}}

 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    <div class="form-row mb-2">
                        <div class="col">
                            <div class="d-flex justify-content-center">
                                <i class="rounded-circle bi bi-exclamation-triangle-fill text-warning"
                                    style="font-size: 50px;"></i>
                            </div>
                            <h4 class="text-center text-dark">Delete Presentation</h6>
                                <p class="text-danger text-center">Are you sure you want to delete this Presentation ? This
                                    action cannot be undone.</p>
                                <input type="text" name="stid" id="stid" value="" hidden>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-secondary w-25 me-5"
                                        data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger w-25">Yes, delete !</button>
                                </div>
                        </div>
                        {{-- <div class="col">
                        </div> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

 {{-- group delete modal end --}}

@endsection
