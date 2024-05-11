@extends('layouts/admin')
@section('title', 'Manage Groups')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        @include('includes/alerts')
    </div>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <h3 class="text-bj mb-3 fw-bold">Manage Groups</h3>
            </div>
            <div class="col-5 pe-0">
                <input type="search" class="form-control" placeholder="Search group">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-bj" data-toggle="modal" data-target="#addModal">Add Group +</button>
            </div>
        </div>

        <!-- Assigned Groups -->
        <div class="row mt-4">
            <div class="col card p-4 border-0 shadow rounded">
                <h4 class="text-bj fw-bold mb-3">Listed Groups</h4>
                <table class="table">
                    <thead>
                        <th>Group Name</th>
                        <th>Project</th>
                        <th>Project Guide</th>
                        <th>Members</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->group_name }}</td>
                                <td>{{ $group->project->project_name }}</td>
                                <td>{{ $group->guide->name }}</td>
                                <td>
                                    @foreach ($group->members as $member)
                                        {{ $member->student->user->name }}
                                        @if (!$loop->last)
                                            , <!-- Add a comma if it's not the last member -->
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <div class="more-btn">
                                        <button class="dropdown" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item edit-btn" data-toggle="modal"
                                                data-target="#groupEditModal"
                                                data-group-id="{{ $group->id }}">Edit</button>
                                            <button class="dropdown-item" data-toggle="modal" data-target="#deleteModal"
                                                data-group-id="{{ $group->id }}">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <span class="mx-2">{{ $groups->links() }}</span>
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
                    <h5 class="modal-title text-light fw-bold" id="addModalLabel">Add Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('add-group') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <label class="title form-label">Group Name</label>
                                <input type="text" name="group_name" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Project</label>
                                <select name="project" class="form-select">
                                    <option value="" selected>Select Project from list</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project['id'] }}">{{ $project['project_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Project Guide</label>
                                <select name="guide" class="form-select">
                                    <option value="" selected>Select project guide list</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty['id'] }}">{{ $faculty['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Project Topic</label>
                                <input type="text" name="topic" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Members Regno</label>
                                <input type="text" placeholder="Member 1" class="form-control" name="member[]"
                                    id="member">
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
                <form action="{{ route('update-group') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <label class="title form-label">Group Name</label>
                                <input type="text" name="group_name" class="form-control" id="group_name" required>
                                <input type="text" name="id" id="group_id" hidden>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Project</label>
                                <select name="project" id="project" class="form-select">
                                    <option value="" selected>Select Project from list</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project['id'] }}">{{ $project['project_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Guide</label>
                                <select name="guide" id="guide" class="form-select">
                                    <option value="" selected>Select project guide list</option>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty['id'] }}">{{ $faculty['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Project Topic</label>
                                <input type="text" name="topic" id="topic" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Members</label>
                                <div id="member_list"></div>
                            </div>
                            <!-- Add additional fields for other group details if needed -->
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
                {{-- <form action="{{ route('delete-group') }}" method="POST"> --}}
                <form action="" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        <div class="form-row mb-2">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <i class="rounded-circle bi bi-exclamation-triangle-fill text-warning"
                                        style="font-size: 50px;"></i>
                                </div>
                                <h4 class="text-center text-dark">Delete Group</h6>
                                    <p class="text-danger text-center">Are you sure you want to delete this franchise ?
                                        This
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
        $(document).ready(function() {
            // Counter for dynamically created members input fields
            let memberCount = 1;

            // Add click event handler for the "Add Member" button
            $('#add-member-btn').click(function() {
                // Append a new input field for the member
                $('#members-container').append(`
                <input type="text" name="member[]" class="form-control mb-2" placeholder="Member ${memberCount + 1}" required>
            `);
                // Increment memberCount for next member
                memberCount++;
            });

            $('.edit-btn').click(function() {
                var groupId = $(this).data('group-id');
                $.ajax({
                    url: '/admin/groupInfo/' + groupId,
                    type: 'GET',
                    success: function(response) {
                        // console.log(response);
                        // console.log(response.members[0].student.user);
                        // console.log(response.members[0].student.user.name);
                        $('#group_name').val(response.group_name);
                        $('#project').val(response.project.id);
                        $('#guide').val(response.guide.id);
                        $('#group_id').val(response.id);
                        $('#topic').val(response.topic);

                        // Clear previous member list
                        $('#member_list').empty();

                        // Add members dynamically to the modal
                        var memberList = $('#member_list');

                        $.each(response.members, function(index, member) {
                            console.log(member.student.user.name);
                            memberList.append(
                                '<input type="text" class="form-control mb-2" value="' +
                                member.student.regno + '" name="member[]">');
                        });


                        // Show the edit modal
                        $('#groupEditModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Handle error
                    }
                });
            });

            $('.delete-btn').click(function(){
                var groupId = $(this).data('group-id');
                alert(groupId);
            });
        });
    </script>
@endsection
