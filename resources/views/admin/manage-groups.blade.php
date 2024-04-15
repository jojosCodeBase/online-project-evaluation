@extends('layouts/admin')
@section('title', 'Manage Franchises')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <h3 class="text-bj mb-3 fw-bold">Manage Groups</h3>
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
        <div class="row d-flex justify-content-end">
            <div class="col-3 d-flex justify-content-end pe-0">
                <input type="search" class="form-control" placeholder="Search group">
            </div>
            <div class="col-auto d-flex justify-content-end">
                <button type="button" class="btn btn-bj" data-toggle="modal" data-target="#addModal">Add Group +</button>
            </div>
        </div>
            {{-- <div class="col card p-4 border-0 shadow rounded">
                <h4 class="text-bj mb-3 fw-bold">Add Group</h4>
                <form action="{{ route('add-franchise') }}" class="needs-validation" method="POST" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Group Name</label>
                            <input type="text" name="franchise_name" class="form-control"
                                placeholder="Eg: Group 4" required>
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
            </div> --}}
        <!-- Assigned Groups -->
        <div class="row mt-4">
            <div class="col card p-4 border-0 shadow rounded">
                <h4 class="text-bj fw-bold mb-3">Listed Groups</h4>
                <table class="table">
                    <thead>
                        <th>Group Name</th>
                        <th>Course</th>
                        <th>Project Guide</th>
                        <th>Members</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Group 1</td>
                            <td>BCA</td>
                            <td>Dr. Ranjit Panigrahi</td>
                            <td>Member 1, Member 2, Memmber 3</td>
                            <td>
                                <div class="more-btn">
                                    <button class="dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item" data-toggle="modal" data-target="#editModalX">Edit</button>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#deleteModalX">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Group 5</td>
                            <td>BCA</td>
                            <td>Dr. Moumita Praminik</td>
                            <td>Member 1, Member 2, Memmber 3, Member 4</td>
                            <td>
                                <div class="more-btn">
                                    <button class="dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item" data-toggle="modal" data-target="#editModalX">Edit</button>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#deleteModalX">Delete</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Group 4</td>
                            <td>BCA</td>
                            <td>Dr. Krishna Vijay Kumar Singh</td>
                            <td>Member 1, Member 2, Memmber 3, Member 4</td>
                            <td>
                                <div class="more-btn">
                                    <button class="dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <button class="dropdown-item" data-toggle="modal" data-target="#editModal">Edit</button>
                                        <button class="dropdown-item" data-toggle="modal" data-target="#deleteModalX">Delete</button>
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
                        <span class="mx-2">{{ $franchises->links() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- group edit modal start --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="addModalLabel">Add Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('add-group') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <label class="title form-label">Group Name</label>
                                <input type="text" name="group_name" class="form-control" id="group_name" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Course</label>
                                <select name="course" id="course" class="form-select">
                                    <option value="" selected>Select course from list</option>
                                    <option value="MCA">MCA</option>
                                    <option value="BCA">BCA</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Project Guide</label>
                                <input type="text" name="guide" id="guide" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Members</label>
                                <input type="text" placeholder="Member 1" class="form-control" name="member[]" id="member">
                                <div id="members-container" class="mt-2">
                                    <!-- Members will be dynamically added here -->
                                </div>
                                <button class="btn btn-primary mt-2" id="add-member-btn">Add Member</button>
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
                                <input type="text" name="franchise_name" class="form-control" id="franchise_name" required>
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
    {{-- group edit modal end --}}

    {{-- group delete modal start --}}
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
    {{-- group delete modal end --}}
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        // Counter for dynamically created members input fields
        let memberCount = 1;

        // Add click event handler for the "Add Member" button
        $('#add-member-btn').click(function(){
            // Append a new input field for the member
            $('#members-container').append(`
                <input type="text" name="member${memberCount}" class="form-control mb-2" placeholder="Member ${memberCount + 1}" required>
            `);
            // Increment memberCount for next member
            memberCount++;
        });
    });
</script>
@endsection
