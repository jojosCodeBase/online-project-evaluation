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
        <div class="card border-0 shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="mb-3 fw-bold text-bj">Listed Students</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Group Number</th>
                                    <th>Student name</th>
                                    <th>Presentation</th>
                                    <th>Project</th>
                                    <th>Internal</th>
                                    <th>External</th>
                                    {{-- <th>Evaluate</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grouped as $studentId => $evaluations)
                                    <tr>
                                        @php
                                            $firstEvaluation = $evaluations->first();
                                            $student = $firstEvaluation->student;
                                            $studentName = $student->user->name ?? 'Unknown'; // Access user's name
                                        @endphp
                                        <td>{{ $studentId }}</td>
                                        <td>{{ $studentName }}</td>
                                        <td>{{ $averageTotals[$studentId] }}</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                @endforeach

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
