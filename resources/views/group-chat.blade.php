@extends('layouts/student')
@section('title', 'Dashboard')
@section('content')
<style>
    .badge{
        font-weight: bold;
        padding: 10px;
        font-size: 14px;
    }
    .success-badge{
        color: green;
        border: 1px solid green;
    }
    .warning-badge{
        color: rgb(224, 179, 31);
        border: 1px solid rgb(207, 125, 18);
    }
    .danger-badge{
        color: red;
        border: 1px solid red;
    }
</style>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Group Chat</h1>
        </div>
        <h4>This feature will be available soon !</h4>

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
    </div>
    {{-- @foreach($franchise as $f)
        <tr>
            <td>{{ $f['name'] }}</td>
            <td><a href="{{ $f['url'] }}">{{ $f['url'] }}</a></td>
        </tr>
    @endforeach --}}
@endsection
