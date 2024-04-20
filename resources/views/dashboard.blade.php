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
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Student Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-bj text-uppercase">
                                    Upcoming Presentation
                                </div>
                                <div class="h5 mb-0 mt-2 fw-bold text-gray-800">16-04-2024</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-bj"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-bj text-uppercase">
                                    Upcoming Presentation
                                </div>
                                <div class="h4 mb-0 mt-2 fw-bold text-gray-800">{{ $count }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-bj"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-bj text-uppercase">
                                    Projects Submitted
                                </div>
                                <div class="h4 mb-0 mt-2 fw-bold text-gray-800">2</div>
                            </div>
                            <div class="col-auto">
                                {{-- <i class="fas fa-check fa-2x text-bj"></i> --}}
                                <i class="fas fa-file fa-2x text-bj"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Listed Franchises -->
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h4 class="text-bj fw-bold">Upcoming Presentations</h4>
                        <table class="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Presentation</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Venue</th>
                                        <th>Project</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($presentations as $presentation)
                                        <tr>
                                            <td>{{ $presentation->name }}</td>
                                            <td>{{ $presentation->date }}</td>
                                            <td>{{ $presentation->time }}</td>
                                            <td>{{ $presentation->venue }}</td>
                                            <td>{{ $presentation->project_name }}</td>
                                            <td>
                                                @php
                                                    $status = '';
                                                    switch ($presentation->status) {
                                                        case 0:
                                                            $status = 'Tentative';
                                                            $badgeClass = 'badge-warning';
                                                            break;
                                                        case 1:
                                                            $status = 'Confirmed';
                                                            $badgeClass = 'badge-success';
                                                            break;
                                                        case 2:
                                                            $status = 'Cancelled';
                                                            $badgeClass = 'badge-danger';
                                                            break;
                                                        default:
                                                            $status = 'Unknown';
                                                            $badgeClass = 'badge-secondary';
                                                            break;
                                                    }
                                                @endphp
                                                <span id="status" data-status="{{ $presentation->status }}"
                                                    class="badge {{ $badgeClass }}">{{ $status }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </table>
                        {{-- {{ $franchise->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
