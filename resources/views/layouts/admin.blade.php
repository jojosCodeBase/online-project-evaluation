<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | Online Project Evaluation Portal</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/images/headerlogo.png') }}" rel="icon" type="image">
    <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('assets/admin/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Jost', sans-serif;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-custom sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="border" style="background-color: #fff">
                <a class="sidebar-brand d-flex align-items-center justify-content-center"
                    href="{{ route('dashboard') }}">
                    <img src="{{ asset('assets/images/smitlogo.png') }}" alt="" class="img-fluid">
                </a>
            </div>

            <!-- Divider -->

            <!-- Heading -->
            <div class="sidebar-heading mb-2 mt-3">MAIN MENU</div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item px-0 div-center mb-2 {{ request()->url() == route('dashboard') ? 'active' : ''}}">
                <a class="nav-link d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i class="bi bi-house-fill pr-3 fs-6 pe-2"></i>
                    <span class="fs-6">Dashboard</span>
                </a>
            </li>
            {{-- <li class="nav-item px-0 div-center mb-2 {{ request()->url() == route('add') ? 'active' : ''}}">
                <a class="nav-link d-flex align-items-center" href="{{ route('add') }}">
                    <i class="bi bi-person-fill-up fs-6 pe-2"></i>
                    <span class="fs-6">Add Student</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item px-0 div-center mb-2 {{ request()->url() == route('add') ? 'active' : ''}}">
                <a class="nav-link d-flex align-items-center" href="{{ route('add') }}">
                    <i class="bi bi-person-fill-up fs-6 pe-2"></i>
                    <span class="fs-6">Add Faculty</span>
                </a>
            </li> --}}
            <li class="nav-item px-0 div-center mb-2 {{ request()->url() == route('show.MCA') ? 'active' : ''}}">
                <a class="nav-link d-flex align-items-center" href="{{ route('show.MCA') }}">
                    <i class="bi bi-clipboard2-check-fill fs-6 pe-2"></i>
                    <span class="fs-6">Evaluate MCA Students</span>
                </a>
            </li>
            <li class="nav-item px-0 div-center mb-2 {{ request()->url() == route('show.BCA') ? 'active' : ''}}">
                <a class="nav-link d-flex align-items-center" href="{{ route('show.BCA') }}">
                    <i class="bi bi-clipboard2-check-fill fs-6 pe-2"></i>
                    <span class="fs-6">Evaluate BCA Students</span>
                </a>
            </li>
            {{-- <li class="nav-item px-0 div-center mb-2 {{ request()->url() == route('franchise-view') ? 'active' : ''}}">
                <a class="nav-link d-flex align-items-center" href="{{ route('franchise-view') }}">
                    <i class="bi bi-building-fill-add fs-6 pe-2"></i>
                    <span class="fs-6">Manage Franchise</span>
                </a>
            </li>
            <li class="nav-item px-0 div-center mb-2 {{ request()->url() == route('manage-category') ? 'active' : ''}}">
                <a class="nav-link d-flex align-items-center" href="{{ route('manage-category') }}">
                    <i class="bi bi-clipboard2-check-fill fs-6 pe-2"></i>
                    <span class="fs-6">Manage Exam Category</span>
                </a>
            </li> --}}
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small text-dark">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('assets/images/avatar.jpg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item px-3" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item px-3">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                @yield('content')

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="odalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="odalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @yield('scripts')
</body>

</html>
