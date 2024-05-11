@extends('layouts/admin')
@section('title', 'Evaluations')
<style>
    tbody input {
        width: 100%;
    }
</style>
@section('content')
    <div class="container-fluid">
        <h4 class="mb-3 fw-bold text-bj">Evaluations</h4>
    </div>
    <div class="container-fluid">
        @include('includes/alerts')
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
                                    <th>Presentation</th>
                                    <th>Project</th>
                                    <th>Date</th>
                                    <th>Internal</th>
                                    <th>External</th>
                                    {{-- <th>Evaluate</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dump($evaluations) --}}
                                @if ($evaluations->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">No evaluations uploaded</td>
                                    </tr>
                                @else
                                    @foreach ($evaluations as $document)
                                        <tr>
                                            <td>{{ $document->group_id }}</td>
                                            <td>{{ $document->presentation_id }}</td>
                                            <td>Mini Project</td>
                                            {{-- <td>{{ $document->presentation->project->project_name }}</td> --}}
                                            <td>{{ $document->created_at }}</td>
                                            <td>{{ $document->total }}</td>
                                            <td>NA</td>
                                            {{-- <td>
                                                <a href="{{ asset('uploads') . '/' . $document->file_url }}"
                                                    class="btn btn-bj" target="_blank"><i class="bi bi-eye-fill"></i></a>
                                            </td> --}}
                                            {{-- <td>
                                                <button type="button" class="btn btn-bj evaluate-btn"
                                                    data-target="#evaluateModal" data-toggle="modal"
                                                    data-document-id="{{ $document->id }}"
                                                    data-group-id={{ $document->group->id }}
                                                    data-presentation-id="{{ $document->presentation->id }}"><i
                                                        class="bi bi-pencil-fill"></i></button>
                                            </td>
                                            <td style="display: none;">
                                                <ul>
                                                    @foreach ($document->group->members as $member)
                                                        <li data-student-id="{{ $member->student->regno }}">
                                                            {{ $member->student->user->name }}</li>
                                                    @endforeach
                                                </ul>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="evaluateModal" tabindex="-1" role="dialog" aria-labelledby="evaluateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog-lg" role="document">
            <form action="{{ route('student.evaluate') }}" method="POST">
                @csrf
                <input type="text" id="evaluate_presentation_id" name="presentation_id" hidden>
                <input type="text" id="evaluate_group_id" name="group_id" hidden>
                <div class="modal-content">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>Student Name</th>
                            <th>Presentation Content (10)</th>
                            <th>Presentation Skill (10)</th>
                            <th>Report Content (10)</th>
                            <th>Viva Voice (10)</th>
                            <th>Progress (10)</th>
                            <th>Total (50)</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div class="p-3">
                        <label for="" class="form-label">Remarks</label>
                        <textarea name="remarks" id="" cols="30" rows="10" class="form-control" placeholder="Enter remarks"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- Add your evaluate button here if needed -->
                        <button type="submit" class="btn btn-bj">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
