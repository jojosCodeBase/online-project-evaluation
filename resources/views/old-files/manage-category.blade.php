@extends('layouts/admin')
@section('title', 'Manage Exam Category')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <h3 class="text-bj mb-3 fw-bold">Manage Exam Category</h3>
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
        <div class="row mb-4">
            <div class="col card p-4 border-0 shadow rounded">
                <h4 class="text-bj mb-3 fw-bold">Add Exam Category</h4>
                <form action="{{ route('add-exam-category') }}" class="needs-validation" method="POST" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Category Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Eg: JEE, NEET, CAT"
                                required>
                        </div>
                        <div class="col d-flex align-items-end">
                            <button type="submit" class="btn btn-bj">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col card p-4 border-0 shadow rounded">
                <h4 class="text-bj mb-3 fw-bold">Listed Exam Categories</h4>
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($categories as $c)
                            <tr>
                                <td>{{ $c['name'] }}</td>
                                <td>{{ $c['created_at'] }}</td>
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
                                                onclick="editCategoryModal({{ $c['id'] }})">Edit</button>
                                            <button class="dropdown-item" data-toggle="modal" data-target="#deleteModal"
                                                onclick="deleteCategoryModal({{ $c['id'] }})">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <span class="mx-2">{{ $categories->links() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- category edit modal start --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="editModalLabel">Edit Category Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('update-exam-category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="title form-label">Category Name</label>
                                <input type="text" name="id" id="category_id" style="display: none;">
                                <input type="text" name="name" class="form-control" id="category_name" required>
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
    {{-- category edit modal end --}}

    {{-- category delete modal start --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('exam-category-delete') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        <div class="form-row mb-2">
                            <div class="col">
                                <div class="d-flex justify-content-center">
                                    <i class="rounded-circle bi bi-exclamation-triangle-fill text-warning"
                                        style="font-size: 50px;"></i>
                                </div>
                                <h4 class="text-center text-dark">Delete Exam Category</h6>
                                    <p class="text-danger text-center">Are you sure you want to delete this category ? This
                                        action cannot be undone.</p>
                                    <input type="text" name="id" id="ctg_id" value="" hidden>
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
    {{-- category delete modal end --}}
@endsection
