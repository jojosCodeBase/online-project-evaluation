@extends('layouts/faculty')
@section('title', 'Evaluate Marks')
@section('content')
    <div class="container-fluid">
        <h4 class="mb-3 fw-bold text-bj">Teacher Portal</h4>
    </div>
    @include('includes/alerts')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-3 fw-bold text-bj">Listed Groups</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Group Number</th>
                                    <th>Presentation Type</th>
                                    <th>Date</th>
                                    <th>View Report</th>
                                    <th>Evaluate</th>
                                    <th>Feedback</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Progress Presentation 1</td>
                                    <td>2024-03-17</td>
                                    <td>
                                        <button type="button" class="btn btn-bj"><i class="bi bi-eye-fill"></i></button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-bj"><i class="bi bi-eye-fill" data-toggle="modal"
                                            data-target="#marks"></i></button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-bj" data-toggle="modal"
                                            data-target="#remark"><i class="bi bi-pencil-fill"></i></button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-bj">Save</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Feedback modal start --}}
    <div class="modal fade" id="remark" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="viewModalLabel">Remark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <div class="row"> --}}
                        <form action="">
                            {{-- <div class="col-12"> --}}
                                    {{-- <label class="title form-label">Project Name</label> --}}
                                   <textarea name="" id="" cols="66" rows="10" placeholder="Give Feedback"></textarea>
                            {{-- </div> --}}
                        </form>
                    {{-- </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border-0" data-dismiss="modal"
                        style="color: blue;">Close</button>
                        <button type="submit" class="btn btn-bj">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Feedback modal end --}}

    {{-- Marks modal start --}}
    <div class="modal fade" id="marks" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-bj">
                    <h5 class="modal-title text-light fw-bold" id="viewModalLabel">Mark</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12 mb-3">
                            <label class="title form-label">Student 1</label>
                            <input type="text" name="project_name" class="form-control" class="form-control" id="numberInput" oninput="validateInput(event)" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="title form-label">Student 2</label>
                            <input type="text" name="course" class="form-control" class="form-control" id="numberInput" oninput="validateInput(event)" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="title form-label">Student 3</label>
                            <input type="text" name="course" class="form-control" class="form-control" id="numberInput" oninput="validateInput(event)"  required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="title form-label">Student 4</label>
                            <input type="text" name="course" class="form-control" id="numberInput" oninput="validateInput(event)" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border-0" data-dismiss="modal"
                        style="color: blue;">Close</button>
                        <button type="submit" class="btn btn-bj">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Marks modal end --}}   

@endsection
