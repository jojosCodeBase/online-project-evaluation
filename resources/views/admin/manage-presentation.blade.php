@extends('layouts/admin')
@section('title', 'Manage Presentations')
@section('content')
    <div class="container">
        @include('includes/alerts')
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
                        <tr>
                            <th>Presentation</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Venue</th>
                            <th>Project</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presentations as $presentation)
                            <tr>
                                <td>{{ $presentation->name }}</td>
                                <td>{{ $presentation->date }}</td>
                                <td>{{ $presentation->time }}</td>
                                <td>{{ $presentation->venue }}</td>
                                <td>{{ $presentation->project_name }}</td>
                                <td>
                                    @php
                                        $status = '';
                                        switch ($presentation->status) {
                                            case 0:
                                                $status = 'Tentative';
                                                $badgeClass = 'badge-warning';
                                                break;
                                            case 1:
                                                $status = 'Confirmed';
                                                $badgeClass = 'badge-success';
                                                break;
                                            case 2:
                                                $status = 'Cancelled';
                                                $badgeClass = 'badge-danger';
                                                break;
                                            default:
                                                $status = 'Unknown';
                                                $badgeClass = 'badge-secondary';
                                                break;
                                        }
                                    @endphp
                                    <span id="status" data-status="{{ $presentation->status }}"
                                        class="badge {{ $badgeClass }}">{{ $status }}</span>
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
                                                data-target="#groupEditModal" data-group-id="{{ $presentation->id }}"
                                                data-group-name="{{ $presentation->name }}"
                                                data-group-date="{{ $presentation->date }}"
                                                data-group-time="{{ $presentation->time }}"
                                                data-group-venue="{{ $presentation->venue }}"
                                                data-group-project="{{ $presentation->project_id }}"
                                                data-group-status="{{ $presentation->status }}">Edit</button>
                                            <button class="dropdown-item delete-btn" data-toggle="modal"
                                                data-target="#deleteModal"
                                                data-group-id="{{ $presentation->id }}">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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

    {{-- Add Presentation Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="addModalLabel">Add Presentation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.presentation.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <label class="title form-label">Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Time</label>
                                <input type="time" name="time" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Venue</label>
                                <input type="text" name="venue" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Presentation Name</label>
                                <input type="text" name="presentation" class="form-control" required>
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
                                <input type="checkbox" id="checkbox" name="send_email_notification">
                                <label for="checkbox" class="title form-label">Send Email Notification</label>
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
    {{-- Add Presentation Modal End --}}

    {{-- group edit modal start --}}
    <div class="modal fade" id="groupEditModal" tabindex="-1" role="dialog" aria-labelledby="groupEditModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="groupEditModalLabel">Edit Presentation Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editPresentationForm" action="{{ route('admin.presentation.update') }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Assuming you are using PUT method for updating -->
                    <input type="hidden" name="presentation_id" id="presentationId">
                    <!-- Hidden field to store presentation ID -->
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-12 mb-3">
                                <label class="title form-label">Date</label>
                                <input type="date" name="date" id="editDate" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Time</label>
                                <input type="time" name="time" id="editTime" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Venue</label>
                                <input type="text" name="venue" id="editVenue" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Presentation Name</label>
                                <input type="text" name="presentation_name" id="editPresentationName"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Status</label>
                                <select name="status" id="editStatus" class="form-select">
                                    <option value="" selected>Select status from list</option>
                                    <option value="0">Tentative</option>
                                    <option value="1">Confirmed</option>
                                    <option value="2">Postponed</option>
                                    <option value="3">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="title form-label">Project</label>
                                <select name="project_id" id="editProject" class="form-select">
                                    <option value="" selected>Select Project from list</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project['id'] }}">{{ $project['project_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="checkbox" id="editSendEmailNotification" name="send_email_notification">
                                <label for="editSendEmailNotification" class="title form-label">Send Email
                                    Notification</label>
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
                                    <p class="text-danger text-center">Are you sure you want to delete this Presentation ?
                                        This
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
@section('scripts')
    <script>
        $('.edit-btn').click(function() {
            var presentationId = $(this).data('group-id');
            var presentationName = $(this).data('group-name');
            var presentationDate = $(this).data('group-date');
            var presentationTime = $(this).data('group-time');
            var presentationVenue = $(this).data('group-venue');
            var presentationProject = $(this).data('group-project');
            var presentationStatus = $(this).data('group-status');

            $('#presentationId').val(presentationId);
            $('#editDate').val(presentationDate);
            $('#editTime').val(presentationTime);
            $('#editVenue').val(presentationVenue);
            $('#editPresentationName').val(presentationName);
            $('#editProject').val(presentationProject);
            $('#editStatus').val(presentationStatus);
        });
    </script>
@endsection
