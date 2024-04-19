@extends('layouts/faculty')
@section('title', 'Listed BCA Students')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
       @include('includes/alerts')
        <div class="container card p-4">
            <h4 class="mb-3 fw-bold text-bj">Listed BCA Students</h4>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead>
                            <th>Date</th>
                            <th>Reg no</th>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Presentation</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>17-03-24</td>
                                <td>202116036</td>
                                <td>Ritik Roshan</td>
                                <td>Group 10</td>
                                <td>Progress Presentation I</td>
                                <td>
                                    <div class="more-btn">
                                        <button class="dropdown" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item view-button" data-toggle="modal"
                                                data-target="#viewModal">View</button>
                                            <button class="dropdown-item" data-toggle="modal"
                                                data-target="#editModal">Edit</button>
                                            <button class="dropdown-item" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>17-03-24</td>
                                <td>202116030</td>
                                <td>Moyuk Rudra</td>
                                <td>Group 5</td>
                                <td>Progress Presentation I</td>
                                <td>
                                    <div class="more-btn">
                                        <button class="dropdown" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item view-button" data-toggle="modal"
                                                data-target="#viewModal">View</button>
                                            <button class="dropdown-item" data-toggle="modal"
                                                data-target="#editModal">Edit</button>
                                            <button class="dropdown-item" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>17-03-24</td>
                                <td>202116030</td>
                                <td>Sujal Adhikari</td>
                                <td>Group 11</td>
                                <td>Progress Presentation I</td>
                                <td>
                                    <div class="more-btn">
                                        <button class="dropdown" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item view-button" data-toggle="modal"
                                                data-target="#viewModal">View</button>
                                            <button class="dropdown-item" data-toggle="modal"
                                                data-target="#editModal">Edit</button>
                                            <button class="dropdown-item" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>17-03-24</td>
                                <td>202116033</td>
                                <td>Kunsang Moktan</td>
                                <td>Group 4</td>
                                <td>Progress Presentation I</td>
                                <td>
                                    <div class="more-btn">
                                        <button class="dropdown" type="button" id="dropdownMenuButton"
                                            data-toggle="dropdown">
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <button class="dropdown-item view-button" data-toggle="modal"
                                                data-target="#viewModal">View</button>
                                            <button class="dropdown-item" data-toggle="modal"
                                                data-target="#editModal">Edit</button>
                                            <button class="dropdown-item" data-toggle="modal"
                                                data-target="#deleteModal">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            {{-- @foreach ($students as $s)
                                <tr>
                                    <td>{{ $s['name'] }}</td>
                                    <td>{{ $s['regno'] }}</td>
                                    <td>{{ $s['rank'] }}</td>
                                    <td>{{ $s['total_marks'] }}</td>
                                    <td>{{ $s['exam_name'] }}</td>
                                    <td>{{ $s['mode'] == 'of' ? 'Offline' : 'Online' }}</td>
                                    <td>{{ $s['franchise'] }}</td>
                                    <td>
                                        <div class="more-btn">
                                            <button class="dropdown" type="button" id="dropdownMenuButton"
                                                data-toggle="dropdown">
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <button class="dropdown-item view-button" data-toggle="modal"
                                                    data-target="#viewModal"
                                                    onclick="viewModalInit({{ $s['id'] }})">View</button>
                                                <button class="dropdown-item" data-toggle="modal" data-target="#editModal"
                                                    onclick="editModal({{ $s['id'] }})">Edit</button>
                                                <button class="dropdown-item" data-toggle="modal" data-target="#deleteModal"
                                                    onclick="deleteModal({{ $s['id'] }})">Delete</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            {{-- <span class="mx-2">{{ $students->links() }}</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- student info modal start --}}
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="viewModalLabel">Student Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-xl-3">
                            <span class="title">Name</span>
                            <div id="name" class="value"></div>
                        </div>
                        <div class="col-xl-3">
                            <span class="title">Enroll No</span>
                            <div id="enroll-no" class="value"></div>
                        </div>
                        <div class="col-xl-3">
                            <span class="title">Rank</span>
                            <div id="rank" class="value"></div>
                        </div>
                        <div class="col-xl-3">
                            <span class="title">Total Marks</span>
                            <div id="marks" class="value"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xl-3">
                            <span class="title">Exam Name</span>
                            <div id="exam" class="value"></div>
                        </div>
                        <div class="col-xl-3">
                            <span class="title">Exam Month and Year</span>
                            <div id="exam-date" class="value"></div>
                        </div>
                        <div class="col-xl-3">
                            <span class="title">Studying Since</span>
                            <div id="since" class="value"></div>
                        </div>
                        <div class="col">
                            <span class="title">Origin State</span>
                            <div id="state" class="value"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xl-3">
                            <span class="title">Placement</span>
                            <div id="placement" class="value"></div>
                        </div>
                        <div class="col-xl-3">
                            <span class="title">Category</span>
                            <div id="category" class="value"></div>
                        </div>
                        <div class="col-xl-3">
                            <span class="title">Mode of learning</span>
                            <div id="mode" class="value"></div>
                        </div>
                        <div class="col-xl-3">
                            <span class="title">Franchise Name</span>
                            <div id="franchise" class="value"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-xl-6">
                            <span class="title">Comments</span>
                            <div id="comments" class="value"></div>
                        </div>
                        <div class="col-xl-2">
                            <span class="title">Rating</span>
                            <div id="rating" class="value"></div>
                        </div>
                        <div class="col-xl-4">
                            <span class="title">Student Image</span>
                            <div>
                                <img src="" alt="student-image" class="img-fluid" id="student-image-view"
                                    width="150" height="150">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border-0" data-dismiss="modal"
                        style="color: blue;">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- student info modal end --}}


    {{-- student info delete modal start --}}
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
                                <h4 class="text-center text-dark">Delete Student Details</h6>
                                    <p class="text-danger text-center">Are you sure you want to delete this student ? This
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
    {{-- student info delete modal end --}}
@endsection
