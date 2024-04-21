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
                                @foreach ($presentations as $presentation)
                                    <tr>
                                        <td>{{ $presentation->name }}</td>
                                        <td>{{ $presentation->date }}</td>
                                        @if ($presentation->allow_file_upload)
                                            @php
                                                $document = $documents
                                                    ->where('presentation_id', $presentation->id)
                                                    ->first();
                                            @endphp
                                            @if ($document)
                                                <td>Document Uploaded <br> Uploaded by: {{ $document->uploaded_by }}</td>
                                                <td class="text-center">
                                                    @if($document->status == 0)
                                                        <span class="badge badge-primary">Submitted</span>
                                                    @elseif($document->status == 1)
                                                        <span class="badge badge-success">Viewed</span>
                                                    @elseif($document->status == 2)
                                                        <button class="view-btn btn btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop">View</button>
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Teacher Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet neque earum ipsam iusto, officiis
                        reprehenderit incidunt similique accusamus quo nostrum!</p>
                    <span class="badge bg-success p-2">Accepted</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Begin Page Content -->
    {{-- <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
        </div> --}}

    <!-- Content Row -->
    {{-- <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-bj text-uppercase">
                                    Listed Students
                                </div>
                                <div class="h4 mb-0 mt-2 fw-bold text-gray-800">{{ $count }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-graduation-cap fa-2x text-bj"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-bj text-uppercase">
                                    Listed Faculties
                                </div>
                                <div class="h4 mb-0 mt-2 fw-bold text-gray-800">{{ $count }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-bj"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-bj text-uppercase">
                                    Projects Evaluated
                                </div>
                                <div class="h4 mb-0 mt-2 fw-bold text-gray-800">{{ $count }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-bj"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    <!-- Listed Franchises -->
    {{-- <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h4 class="text-bj fw-bold">Upcoming Presentations</h4>
                        <table class="table">
                            <thead>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Venue</th>
                                <th>Presentation</th>
                                <th>Course</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>16-04-2024</td>
                                    <td>09:30 AM</td>
                                    <td>CA LAB</td>
                                    <td>Progress Presentation II</td>
                                    <td>BCA</td>
                                    <td>
                                        <span class="badge success-badge">Confirmed</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>24-04-2024</td>
                                    <td>09:30 AM</td>
                                    <td>CA LAB</td>
                                    <td>Progress Presentation III</td>
                                    <td>BCA</td>
                                    <td>
                                        <span class="badge warning-badge">Tentative</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>21-04-2024</td>
                                    <td>02:30 AM</td>
                                    <td>CA LAB</td>
                                    <td>Progress Presentation II</td>
                                    <td>MCA</td>
                                    <td>
                                        <span class="badge warning-badge">Tentative</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{ $franchise->links() }}
                    </div>
                </div>
            </div>
        </div> --}}
    {{-- </div> --}}
    {{-- @foreach ($franchise as $f)
        <tr>
            <td>{{ $f['name'] }}</td>
            <td><a href="{{ $f['url'] }}">{{ $f['url'] }}</a></td>
        </tr>
    @endforeach --}}
@endsection
