@extends('layouts/student')
@section('title', 'Dashboard')
@section('content')
    <style>
        .badge {
            font-weight: bold;
            padding: 10px;
            font-size: 14px;
        }

        .success-badge {
            color: green;
            border: 1px solid green;
        }

        .warning-badge {
            color: rgb(224, 179, 31);
            border: 1px solid rgb(207, 125, 18);
        }

        .danger-badge {
            color: red;
            border: 1px solid red;
        }
    </style>
    <div class="container">
        @include('includes/alerts')
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="text-center">Document Upload</h4>
                        {{-- @dump($documents) --}}
                        <table class="table table-striped table-bordered">
                            <thead class="bg-primary text-light">
                                <tr>
                                    <th>Presentation Type</th>
                                    <th>Date</th>
                                    <th colspan="3">Upload File</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @dump($feedback) --}}
                                @foreach ($presentations as $presentation)
                                    <tr>
                                        <td>{{ $presentation->name }}</td>
                                        <td>{{ $presentation->date }}</td>
                                        @if ($presentation->allow_file_upload)
                                            @php
                                                $document = $documents
                                                    ->where('presentation_id', $presentation->id)
                                                    ->first();
                                                $comment = $feedback
                                                    ->where('presentation_id', $presentation->id)
                                                    ->pluck('comments')
                                                    ->first();
                                                // dd($comment);
                                            @endphp
                                            @if ($document)
                                                <td>Document Uploaded <br> Uploaded by: {{ $document->uploaded_by }}</td>
                                                <td class="text-center">
                                                    @if ($document->status == 0)
                                                        <span class="badge badge-primary">Submitted</span>
                                                    @elseif($document->status == 1)
                                                        <button type="button" class="view-btn btn btn-success"
                                                            data-toggle="modal" data-target="#feedBackModal"
                                                            data-feedback="{{ $comment }}">View</button>
                                                        {{-- @elseif($document->status == 2)
                                                    <span class="badge badge-success">Viewed</span> --}}
                                                    @endif
                                                </td>
                                            @else
                                                <form action="{{ route('upload.document') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input class="form-control" type="text" name="presentation_id"
                                                        value="{{ $presentation->id }}" hidden>
                                                    <td><input class="form-control" type="file" name="file"
                                                            accept=".pdf" required></td>
                                                    <td class="text-center"><button type="submit"
                                                            class="btn btn-primary">Upload</button></td>
                                                </form>
                                                <td></td> <!-- Empty column as placeholder -->
                                            @endif
                                        @else
                                            <td colspan="4" class="text-danger">Not accepting files</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="feedBackModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Teacher Feedback</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="feedback"></p>
                    {{-- <span class="badge bg-success p-2">Accepted</span> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '.view-btn', function() {
            $('#feedback').text($(this).data('feedback')); // Use text() instead of txt
            $('#feedBackModal').show(); // Add '#' to the selector
        });
    </script>
@endsection
