@extends('layouts/faculty')
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
            <h1 class="h3 mb-0 text-gray-800">Faculty Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-bj text-uppercase">
                                    Groups Assigned
                                </div>
                                <div class="h4 mb-0 mt-2 fw-bold text-gray-800">5</div>
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
                                    Projects Evaluated
                                </div>
                                <div class="h4 mb-0 mt-2 fw-bold text-gray-800">15</div>
                            </div>
                            <div class="col-auto">
                                {{-- <i class="fas fa-check fa-2x text-bj"></i> --}}
                                <i class="fas fa-file fa-2x text-bj"></i>
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
                                    Teacher Guide
                                </div>
                                <div class="h4 mb-0 mt-2 fw-bold text-gray-800">Parimala Tamang</div>
                            </div>
                            <div class="col-auto">
                                {{-- <i class="fas fa-check fa-2x text-bj"></i> --}}
                                {{-- <i class="fas fa-file fa-2x text-bj"></i> --}}
                                <i class="bi bi-person-standing-dress fa-2x text-bj"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Listed Franchises -->
    <div class="container-fluid">
        <div class="row">
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
                                @foreach ($presentations as $presentation)
                                    <tr>
                                        <td>{{ $presentation->date }}</td>
                                        <td>{{ $presentation->time }}</td>
                                        <td>{{ $presentation->venue }}</td>
                                        <td>{{ $presentation->presentation }}</td>
                                        <td>{{ $presentation->project }}</td>
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
                                            <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $franchise->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
