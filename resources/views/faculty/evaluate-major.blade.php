@extends('layouts/faculty')
@section('title', 'Evaluate Marks')
@section('content')
    <div class="container-fluid">
        <h4 class="mb-3 fw-bold text-bj">Evaluate Major Project</h4>
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
                                {{-- @dump($document) --}}
                                @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $document->group->group_name }}</td>
                                        <td>{{ $document->presentation->name }}</td>
                                        <td>{{ $document->presentation->project->project_name }}</td>
                                        <td>{{ $document->presentation->date }}</td>
                                        <td>
                                            <a href="{{ asset('uploads') . '/' . $document->file_url }}" class="btn btn-bj"
                                                target="_blank"><i class="bi bi-eye-fill"></i></a>
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
                        <tr>
                            <td>Ritik Roshan</td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                        </tr>
                        <tr>
                            <td>Ayush Bhetwal</td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                        </tr>
                        <tr>
                            <td>Aman Kumar Saini</td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                        </tr>
                        <tr>
                            <td>Rohan Majhi</td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                            <td><input type="number"></td>
                        </tr>
                    </tbody>
                </table> 
                <div class="p-3">
                    <label for="" class="form-label">Remarks</label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Enter remarks"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- Add your evaluate button here if needed -->
                    <button type="submit" class="btn btn-bj">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="evaluateModal" tabindex="-1" role="dialog" aria-labelledby="evaluateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('student.evaluate') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <input type="text" id="presentation_id" name="presentation_id" hidden>
                    <div class="modal-header">
                        <h5 class="modal-title" id="evaluateModalLabel">Evaluate Students</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul id="studentList"></ul> <!-- Placeholder for student names -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- Add your evaluate button here if needed -->
                        <button type="submit" class="btn btn-bj">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}

    {{-- Marks modal start --}}
    <div class="modal fade" id="evaluatex" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var evaluateButtons = document.querySelectorAll('.evaluate-btn');
            evaluateButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var row = this.closest('tr'); // Find the closest <tr> parent element
                    var groupId = $(this).data('group-id');

                    $('#presentation_id').val($(this).data('presentation-id'));

                    // alert(groupId);
                    var hiddenTd = row.querySelector(
                        'td[style="display: none;"]'
                    ); // Select the hidden <td> containing the student names

                    // Check if hidden <td> is found
                    if (hiddenTd !== null) {
                        var studentsUl = hiddenTd.querySelector('ul');
                        var students = studentsUl.querySelectorAll('li');

                        var modal = document.getElementById('evaluateModal');
                        var studentList = modal.querySelector('.modal-body');
                        // Check if student names are found

                        studentList.innerHTML = '';

                        if (students.length > 0) {
                            students.forEach(function(student) {
                                var studentId = student.getAttribute('data-student-id');
                                var label = document.createElement('label');
                                label.textContent = student.textContent;
                                label.classList.add('form-label');
                                var input = document.createElement('input');
                                var groupIdInput = document.createElement('input');
                                groupIdInput.type = 'number';
                                groupIdInput.value = groupId;
                                groupIdInput.name = 'groupId';
                                groupIdInput.hidden = true;

                                input.type = 'number';
                                input.placeholder = 'Enter marks'
                                input.name = 'marks[' + studentId + ']';
                                input.classList.add('form-control');
                                input.classList.add('mb-2');
                                studentList.appendChild(label);
                                studentList.appendChild(input);
                                studentList.appendChild(groupIdInput);
                            });
                            var label = document.createElement('label');
                            label.textContent = 'Remarks';
                            label.classList.add('form-label');
                            var text_area = document.createElement('textarea');
                            text_area.classList.add('form-control');
                            text_area.name = 'remarks';
                            studentList.appendChild(label);
                            studentList.appendChild(text_area);
                        } else {
                            console.error('No students found for the selected document.');
                        }
                    } else {
                        console.error('Hidden <td> not found for the selected document.');
                    }
                });
            });
        });
    </script>

    {{-- <script>
     document.addEventListener('DOMContentLoaded', function() {
        var evaluateButtons = document.querySelectorAll('.evaluate-btn');
        evaluateButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var row = this.closest('tr'); // Find the closest <tr> parent element
                var hiddenTd = row.querySelector('td[style="display: none;"]'); // Select the hidden <td> containing the student names

                // Get the modal and student list element
                var modal = document.getElementById('evaluateModal');
                var studentList = modal.querySelector('.modal-body ul');

                // Check if hidden <td> is found
                if (hiddenTd !== null) {
                    var studentsUl = hiddenTd.querySelector('ul');
                    var students = studentsUl.querySelectorAll('li');

                    // Clear previous content
                    studentList.innerHTML = '';

                    // Populate modal with student names
                    if (students.length > 0) {
                        students.forEach(function(student) {
                            var li = document.createElement('li');
                            li.textContent = student.textContent;
                            studentList.appendChild(li);
                        });
                    } else {
                        studentList.innerHTML = 'No students found for the selected document.';
                    }

                    // Show the modal
                    $('#evaluateModal').modal('show');
                } else {
                    console.error('Hidden <td> not found for the selected document.');
                }
            });
        });
    });
   </script> --}}




@endsection
