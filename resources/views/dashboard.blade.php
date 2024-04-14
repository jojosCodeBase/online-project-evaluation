@extends('layouts/admin')
@section('title', 'Dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
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
        </div>

        <!-- Listed Franchises -->
        <div class="row">
            <div class="col">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h4 class="text-bj fw-bold">Listed Franchises</h4>
                        <table class="table">
                            <thead>
                                <th>Franchise Name</th>
                                <th>Franchise URL</th>
                            </thead>
                            <tbody>
                                @foreach($franchise as $f)
                                    <tr>
                                        <td>{{ $f['name'] }}</td>
                                        <td><a href="{{ $f['url'] }}">{{ $f['url'] }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $franchise->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
