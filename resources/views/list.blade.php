@extends('layouts/admin')
@section('title', 'List New Student')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        @if (session('success'))
            <div id="alertMessage" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div id="alertMessage" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div id="alertMessage" class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="container card p-4 border-0 shadow rounded">
            <h4 class="text-bj mb-3 fw-bold">List New Student</h4>
            <div class="row">
                <div class="col">
                    <form action="{{ route('list-student') }}" class="needs-validation" method="POST" enctype="multipart/form-data" novalidate >
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Student Name</label>
                                <input type="text" name="stu_name" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter student name
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Student Rank</label>
                                <input type="text" name="stu_rank" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter student rank
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Total Marks Scored</label>
                                <input type="text" name="marks" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter total marks
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Name of Exam</label>
                                <input type="text" name="exam_name" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter name of exam
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label class="form-label">Exam Month and Year</label>
                                <input type="text" name="month_year" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter exam month and year
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Studying Since</label>
                                <input type="text" name="since" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter studying since
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Student Enrollment Number</label>
                                <input type="text" name="regno" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter student enrollment number
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Origin State</label>
                                <select name="state" class="form-select" required>
                                    <option value="">Select state from list</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Ladakh">Ladakh</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="West Bengal">West Bengal</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select state
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label class="form-label">Placement</label>
                                <input type="text" name="placement" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please enter placement after course
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-select" required>
                                    <option value="" disabled selected>Select exam category</option>
                                    @foreach ($categories as $c)
                                        <option value="{{ $c['id'] }}">{{ $c['name'] }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please enter course category
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Mode of learning</label>
                                <select name="mode" id="mode" class="form-select" required>
                                    <option value="">Select mode of learning</option>
                                    <option value="on">Online</option>
                                    <option value="of">Offline</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select mode of learning
                                </div>
                            </div>
                            <div class="col" id="franchiseSelect" style="display: none;">
                                <label class="form-label">Select franchise</label>
                                <select name="franchise" id="franchise-list" class="form-select">
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <label class="form-label">Student Profile Photo</label>
                                <input type="file" name="profile" class="form-control" accept="image/*" required>
                                <div class="invalid-feedback">
                                    Please enter student profile photo
                                </div>
                            </div>
                            <div class="col-3">
                                <label class="form-label">Student Rating</label>
                                <select name="rating" id="rating" class="form-select" required>
                                    <option value="" selected disabled>Select rating from list</option>
                                    <option value="1.0">1 star</option>
                                    <option value="1.5">1.5 star</option>
                                    <option value="2.0">2 star</option>
                                    <option value="2.5">2.5 star</option>
                                    <option value="3.0">3 star</option>
                                    <option value="3.5">3.5 star</option>
                                    <option value="4.0">4 star</option>
                                    <option value="4.5">4.5 star</option>
                                    <option value="5.0">5 star</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select rating
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Student Review (Max 200 chars)</label>
                                <textarea name="student_review" id="student_review" cols="30" rows="3" class="form-control" required></textarea>
                                <span  class="text-muted"><span id="remaining-chars">0</span>/200</span>
                                <div class="invalid-feedback">
                                    Please enter student review
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col d-flex justify-content-center">
                                <button type="submit" class="btn btn-bj w-25">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
