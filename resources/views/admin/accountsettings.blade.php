<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Account Settings</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-2">

            <!-- Heading -->
            <div class="sidebar-heading">
                Overview
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/dashboard/firstquarter">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>General Overview</span></a>
            </li>



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-map-pin"></i>
                    <span>Provinces</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/admin/provinces/davaodeoro/firstquarter">Davao De Oro</a>

                        <a class="collapse-item" href="/admin/provinces/davaooccidental">Davao Occidental</a>

                        <a class="collapse-item" href="/admin/provinces/davaooriental">Davao Oriental</a>

                        <a class="collapse-item" href="/admin/provinces/davaodelsur">Davao Del Sur</a>

                        <a class="collapse-item" href="/admin/provinces/davaodelnorte">Davao Del Norte</a>

                        <a class="collapse-item" href="/admin/provinces/davaocity">Davao City</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/quicksearch">
                    <i class="fas fa-fw fa-search"></i>
                    <span>Quick Search</span></a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                System Settings
            </div>



            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Account Settings</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/target">
                    <i class="fas fa-fw fa-bullseye"></i>
                    <span>Set Target</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/admin/history">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>History</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <span class="mr-2 d-none d-lg-inline text-gray-600">Department of Social Welfare and Development |
                        Harmonized Planning Monitoring and Evaluation (HPMES)</span>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <button type="button" data-target="#logoutModal" data-toggle="modal"
                            class="btn btn-danger">Logout</button>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-12">
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            @if (session('account_message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('account_message') }}
                            </div>
                        @endif

                        @if (session('password_unmatched'))
                        <div class="alert alert-success" role="alert">
                            {{ session('password_unmatched') }}
                        </div>
                    @endif

                            <div class="card shadow mb-4 mt-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Account Settings</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <form action="/admin/editaccount" method="post">
                                                                <label for="">First Name</label>
                                                                <input type="text" class="form-control"
                                                                    name="first_name"
                                                                    value="{{ session('first_name') }}">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="">Middle Name</label>
                                                            <input type="text" class="form-control"
                                                                name="middle_name"
                                                                value="{{ session('middle_name') }}">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="">Last Name</label>
                                                            <input type="text" class="form-control"
                                                                name="last_name" value="{{ session('last_name') }}">
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-md-4">
                                                            <label for="">Email</label>
                                                            <input type="text" class="form-control" name="email"
                                                                value="{{ session('email') }}">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="">Username</label>
                                                            <input type="text" class="form-control"
                                                                name="username" value="{{ session('username') }}">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="">Account Type</label>
                                                            <input type="text" disabled class="form-control"
                                                                value="{{ session('account_type') }}">
                                                        </div>
                                                    </div>

                                                    <div class="row justify-content-end mt-3">
                                                        <div class="col-md-3 text-right">
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal" data-target="#editpassword">Edit
                                                                Password</button>
                                                            <button type="button" class="btn btn-success"
                                                                data-toggle="modal"
                                                                data-target="#editaccount">Update</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="modal fade" id="editaccount" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are
                                                                you sure you want to save the changes?</h5>
                                                            <button class="close" type="button"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label class=""
                                                                        for="">Password</label>
                                                                    <input type="password" name="password"
                                                                        class="form-control" value="">
                                                                    <label class="mt-2" for="">Confirm
                                                                        Passsword</label>
                                                                    <input type="password" name="confirm_password"
                                                                        class="form-control" value="">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>

                                                            <input type="text" hidden name="fourthquarter"
                                                                value="4" id="">
                                                            <button class="btn btn-warning"
                                                                type="submit">Update</button>
                                                            @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                    {{-- <a class="btn btn-primary" href="/logout">Logout</a> --}}
                </div>
            </div>
        </div>
    </div>


    {{-- set password modal --}}
    <div class="modal fade" id="editpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/editpassword" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" name="currentpassword" class="form-control mt-2"
                                    placeholder="Current Password">
                                <input type="text" name="newpassword" class="form-control mt-2"
                                    placeholder="New Password">
                                <input type="text" name="confirmpassword" class="form-control mt-2"
                                    placeholder="Confirm New Password">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    @csrf
                    <input type="text" hidden name="fourthquarter" value="4" id="">
                    <button class="btn btn-warning" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end of the edit password modal --}}


    {{-- start of the edit account but not password --}}

    {{-- end of the edit account but not password --}}




    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages -->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>


    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>


</body>

</html>
