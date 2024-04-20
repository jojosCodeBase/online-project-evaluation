@extends('layouts/admin')
@section('title', 'Manage Project')
@section('content')
    <div class="container">
        @include('includes/alerts')
        <div class="row">
            <div class="col-5">
                <h3 class="text-bj mb-3 fw-bold">Manage Project</h3>
            </div>
            <div class="col-5 pe-0">
                <input type="search" class="form-control" placeholder="Search Project">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-bj" data-toggle="modal" data-target="#addModal">Add Project +</button>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col card p-4 border-0 shadow rounded">
                <h4 class="text-bj fw-bold mb-3">Listed Project</h4>
                <table class="table">
                    <thead>
                        <th>Project Name</th>
                        <th>Course</th>
                        <th>Project Co-ordinator</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->project_name }}</td>
                                <td>{{ $project->course }}</td>
                                <td>{{ $project->coordinator_name }}</td>
                                <td>
                                    <button type="button" class="edit-btn btn btn-bj" data-toggle="modal"
                                        data-target="#projectEditModal" data-project-id="{{ $project->id }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </button>
                                    <button type="button" class="delete-btn btn btn-bj" data-toggle="modal" data-target="#projectDeleteModal"
                                        data-project-id="{{ $project->id }}">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <span class="mx-2">{{ $projects->links() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- project add modal start --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="addModalLabel">Add Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.project.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <label class="title form-label">Project Name</label>
                                <input type="text" name="project_name" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Course</label>
                                <input type="text" name="course" class="form-control" required>
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
    {{-- project add modal end --}}

    {{-- delete project modal Start --}}
    <div class="modal fade" id="projectDeleteModal" tabindex="-1" role="dialog" aria-labelledby="projectDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.project.delete') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        <div class="form-row mb-2">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <i class="rounded-circle bi bi-exclamation-triangle-fill text-warning"
                                        style="font-size: 50px;"></i>
                                </div>
                                <h4 class="text-center text-dark">Delete Project</h6>
                                    <p class="text-danger text-center">Are you sure you want to delete this Project ? This
                                        action cannot be undone.</p>
                                    <input type="text" name="id" value="" hidden>
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
    {{-- delete project modal end --}}

    {{-- edit project modal start --}}
    <div class="modal fade" id="projectEditModal" tabindex="-1" role="dialog" aria-labelledby="projectEditModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="projectEditModalLabel">Edit Group Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.project.update') }}" method="POST">
                    @csrf
                    <input type="text" name="id" hidden>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <label class="title form-label">Project Name</label>
                                <input type="text" name="project_name" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Course</label>
                                <input type="text" name="course" class="form-control" required>
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
    {{-- Edit Project modal End --}}

@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.edit-btn').click(function() {
                var projectId = $(this).data('project-id');
                // Send AJAX request to fetch project data
                $.ajax({
                    url: '/admin/projects/' + projectId, // Endpoint to fetch project details
                    type: 'GET',
                    success: function(response) {
                        console.log(response);
                        // Populate modal fields with project data
                        $('#projectEditModal input[name="id"]').val(response
                            .id);
                        $('#projectEditModal input[name="project_name"]').val(response
                            .project_name);
                        $('#projectEditModal input[name="course"]').val(response.course);

                        // Show the modal
                        $('#projectEditModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('.delete-btn').click(function() {
                var projectId = $(this).data('project-id');
                $('#projectDeleteModal input[name="id"]').val(projectId);
            });
        });
    </script>

@endsection
