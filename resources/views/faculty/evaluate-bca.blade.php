@extends('layouts/faculty')
@section('title', 'Listed BCA Students')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        @if (session('success'))
            <div id="alertMessage" class="alert alert-success">
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div id="alertMessage" class="alert alert-danger">
                <span>{{ session('error') }}</span>
            </div>
        @endif
        @if ($errors->any())
            <div id="alertMessage" class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
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

    {{-- student info edit modal start --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="editModalLabel">Edit Student Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-student') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-xl-3">
                                <label class="title form-label">Name</label>
                                <input type="text" name="stu_name" class="form-control" id="edit-name" required>
                            </div>
                            <div class="col-xl-3">
                                <label class="title form-label">Enroll No</label>
                                <input type="text" class="form-control" id="edit-enroll-no" name="regno" required>
                            </div>
                            <div class="col-xl-3">
                                <label class="title form-label">Rank</label>
                                <input class="form-control" type="text" id="edit-rank" name="stu_rank" required>
                            </div>
                            <div class="col-xl-3">
                                <label class="title form-label">Total Marks</label>
                                <input class="form-control" type="text" id="edit-marks" name="marks">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3">
                                <label class="title form-label">Exam Name</label>
                                <input class="form-control" type="text" id="edit-exam" name="exam_name">
                            </div>
                            <div class="col-xl-3">
                                <label class="title form-label">Exam Month and Year</label>
                                <input class="form-control" type="text" id="edit-exam-date" name="month_year">
                            </div>
                            <div class="col-xl-3">
                                <label class="title form-label">Studying Since</label>
                                <input class="form-control" type="text" id="edit-since" name="since">
                            </div>
                            <div class="col-xl-3">
                                <label class="title form-label">Origin State</label>
                                <select name="state" id="edit-state" class="form-select" required>
                                    <option value="">Select state from list</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and
                                        Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Ladakh">Ladakh</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-3">
                                <label class="title form-label">Placement</label>
                                <input class="form-control" type="text" id="edit-placement" name="placement">
                            </div>
                            <div class="col-xl-3">
                                <label class="title form-label">Category</label>
                                <select name="category" id="edit-category-select" class="form-select"></select>
                            </div>
                            <div class="col-xl-3">
                                <label class="title form-label">Mode of learning</label>
                                <select name="mode" id="edit-mode" class="form-select" required>
                                    <option value="" disabled>Select mode of learning</option>
                                    <option value="on">Online</option>
                                    <option value="of">Offline</option>
                                </select>
                            </div>
                            <div class="col-xl-3">
                                <label class="title form-label">Franchise Name</label>
                                <input class="form-control" type="text" id="edit-franchise" name="franchise"
                                    readonly>
                                <select class="form-select" name="franchise" id="edit-franchise-select"></select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-xl-6">
                                <label class="title form-label">Comments</label>
                                <textarea class="form-control" name="student_review" id="edit-comments" cols="30" rows="3"></textarea>
                            </div>
                            <div class="col-xl-2">
                                <span class="title">Rating</span>
                                <select name="rating" id="edit-rating" class="form-select" required>
                                    <option value="1.0">1 star</option>
                                    <option value="1.5">1.5 star</option>
                                    <option value="2.0">2 star</option>
                                    <option value="2.5">2.5 star</option>
                                    <option value="3.0">3 star</option>
                                    <option value="3.5">3.5 star</option>
                                    <option value="4.0">4 star</option>
                                    <option value="4.5">4.5 star</option>
                                    <option value="5.0">5 star</option>
                                </select>
                            </div>
                            <div class="col-xl-4">
                                <label class="title form-label">Student Image</label>
                                <div>
                                    <img src="" alt="student-image" id="student-image-edit" class="img-fluid"
                                        width="150" height="150">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="offset-6 col-xl-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="keep_profile_image" type="checkbox"
                                        id="keep_profile_image" checked>
                                    <label class="form-check-label" for="flexCheckDefault">Keep current profile
                                        image</label>
                                </div>
                                <div class="form-group mt-3" id="edit-profile-image-input" style="display: none;">
                                    <input type="file" name="profile_image" class="form-control">
                                </div>
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
    {{-- student info edit modal end --}}

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
    <script>
        var assetPath = "{{ asset('assets/profile_images') }}";
    </script>
@endsection
