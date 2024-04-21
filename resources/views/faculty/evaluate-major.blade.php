@extends('layouts/faculty')
@section('title', 'Evaluate Marks')
@section('content')
    <div class="container-fluid">
        <h4 class="mb-3 fw-bold text-bj">Evaluate Major Project</h4>
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
                                    <th>Project</th>
                                    <th>Date</th>
                                    <th>View Report</th>
                                    <th>Evaluate</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dump($documents) --}}
                                {{-- @for ($i = 0; $i < $totalDocuments; $i++)
                                    @php
                                        $document = $documents[$i];
                                    @endphp
                                    <tr>
                                        <td>{{ $document->group_name }}</td>
                                        <!-- Assuming you have a 'name' column in the 'presentations' table -->
                                        <td>{{ $document->presentation_name }}</td> <!-- Changed to presentation_name -->
                                        <td>{{ $document->project_name }}</td>
                                        <td>{{ $document->date }}</td>
                                        <td>
                                            <a href="{{ asset('uploads') . '/' . $document->file_url }}" class="btn btn-bj"
                                                target="_blank"><i class="bi bi-eye-fill"></i></a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-bj" data-target="#evaluate"
                                                data-toggle="modal"><i class="bi bi-pencil-fill"></i></button>
                                        </td>
                                    </tr>
                                @endfor --}}
                                {{-- @dump($documents) --}}
                                @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $document->group->group_name }}</td>
                                        <td>{{ $document->presentation->name }}</td>
                                        <td>{{ $document->presentation->project->project_name }}</td>
                                        {{-- <td>{{ $presentation->date }}</td> --}}
                                        <td>{{ $document->presentation->date }}</td>
                                        <td>
                                            <a href="{{ asset('uploads'). '/' .$document->file_url }}" class="btn btn-bj" target="_blank"><i class="bi bi-eye-fill"></i></a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-bj" data-target="#evaluate" data-toggle="modal"><i class="bi bi-pencil-fill"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Marks modal start --}}
    <div class="modal fade" id="evaluate" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
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
                            <input type="text" name="project_name" class="form-control" class="form-control"
                                id="numberInput" oninput="validateInput(event)" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="title form-label">Student 2</label>
                            <input type="text" name="course" class="form-control" class="form-control" id="numberInput"
                                oninput="validateInput(event)" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="title form-label">Student 3</label>
                            <input type="text" name="course" class="form-control" class="form-control" id="numberInput"
                                oninput="validateInput(event)" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="title form-label">Student 4</label>
                            <input type="text" name="course" class="form-control" id="numberInput"
                                oninput="validateInput(event)" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="title form-label">Feedback</label>
                            <textarea name="" id="" cols="66" rows="10" placeholder="Give Feedback"></textarea>
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
