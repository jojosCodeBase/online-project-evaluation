@extends('layouts/faculty')
@section('title', 'Evaluate Marks')
@section('content')
    <div class="container-fluid">
        <h4 class="mb-3 fw-bold text-bj">Evaluate Minor Project</h4>
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
                                    <th>Presentation Type</th>
                                    <th>Project</th>
                                    <th>Date</th>
                                    <th>View Report</th>
                                    <th>Evaluate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($documents->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">No documents uploaded</td>
                                    </tr>
                                @else
                                    @foreach ($documents as $document)
                                        <tr>
                                            <td>{{ $document->group->group_name }}</td>
                                            <td>{{ $document->presentation->name }}</td>
                                            <td>{{ $document->presentation->project->project_name }}</td>
                                            <td>{{ $document->presentation->date }}</td>
                                            <td>
                                                <a href="{{ asset('uploads') . '/' . $document->file_url }}"
                                                    class="btn btn-bj" target="_blank"><i class="bi bi-eye-fill"></i></a>
                                            </td>
                                            <td>
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
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{--
                        <table class="table table-bordered">
                            <tbody>
                                @foreach ($documents as $d)
                                    <tr>
                                        @foreach ($d->group->members as $m)
                                            <td>{{ $m->student->user->name }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
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
@section('scripts')
    <script>
        // $(document).ready(function() {
        $('.evaluate-btn').on('click', function() {
            var row = $(this).closest('tr'); // Find the closest <tr> parent element
            var groupId = $(this).data('group-id');

            $('#evaluate_presentation_id').val($(this).data('presentation-id'));
            $('#evaluate_group_id').val(groupId);

            $.ajax({
                url: '/faculty/get-group-members/' + groupId,
                type: 'GET',
                success: function(response) {
                    // Process the response here
                    console.log(response); // Example: Display members in console
                    var tbody = $('tbody'); // Get the tbody element
                    tbody.empty(); // Clear existing content
                    $.each(response, function(index, member) {
                        // Access and display regno and name attributes
                        console.log(member.group_id);
                        console.log(member.student.regno);
                        console.log(member.student.user.name);

                        // Create a new table row
                        var newRow = $('<tr>');

                        // Populate the row with member attributes
                        newRow.append($('<td>').text(member.student.user.name));

                        // Loop to create and append input fields
                        for (var i = 0; i < 6; i++) {
                            var input = $('<input>').attr({
                                'type': 'number',
                                'name': 'marks[' + member.student.user.id + '][]',
                                'class': 'restrictMarksInput',
                                'id': 'input_' + index + '_' +
                                    i, // Unique id for each input
                            });

                            // Make the last input readonly
                            if (i === 5) {
                                input.prop('readonly', true);
                            } else {
                                // Add input event listener to calculate total for this row
                                input.on('input', function() {
                                    total = 0;
                                    newRow.find('input[type=number]').not(':last').each(
                                        function() {
                                            total += parseInt($(this).val()) || 0;
                                        });
                                    newRow.find('input[type=number]:last').val(total);
                                });
                            }

                            // Append the input field to the table cell
                            newRow.append($('<td>').append(input));
                        }

                        // Append the new row to the tbody
                        tbody.append(newRow);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error); // Log any errors
                }
            });
        });

        // Bind input event to calculate total when inputs change
        $(document).on('input', 'input[type=number]', calculateTotal);
        // });
    </script>
@endsection
