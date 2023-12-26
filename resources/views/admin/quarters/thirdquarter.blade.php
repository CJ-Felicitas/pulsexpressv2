<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

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
            <li class="nav-item active">
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
            <li class="nav-item">
                <a class="nav-link" href="/admin/accountsettings">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Account Settings</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/admin/target">
                    <i class="fas fa-fw fa-bullseye"></i>
                    <span>Set Target</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/history">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>History</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/variance">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Variance</span></a>
            </li>
            <!-- Nav Item - Tables -->


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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    {{--  --}}


                    <!-- Content Row -->
                    <div class="row">


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-md-2 mb-4">
                            <a href="/admin/dashboard/firstquarter" style="text-decoration: none;">
                                <div class="card border-left-primary shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            1st Quarter
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 mb-4">
                            <a href="/admin/dashboard/secondquarter" style="text-decoration: none;">
                                <div class="card border-left-secondary shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            2nd Quarter
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 mb-4">
                            <a href="/admin/dashboard/thirdquarter" style="text-decoration: none;">
                                <div class="card bg-success text-white shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            3rd Quarter
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 mb-4">
                            <a href="/admin/dashboard/fourthquarter" style="text-decoration: none;">
                                <div class="card border-left-info shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            4th Quarter
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 mb-4">
                            <a href="/admin/dashboard/firstsemester" style="text-decoration: none;">
                                <div class="card border-left-danger shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            1st Semester
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2 mb-4">
                            <a href="/admin/dashboard/secondsemester" style="text-decoration: none;">
                                <div class="card border-left-dark shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            2nd Semester
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pantawid Pamilyang Pilipino Program
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Province</th>
                                                    <th>Male Count</th>
                                                    <th>Female Count</th>
                                                    <th>Total Physical Count</th>
                                                    <th>Total Fund Allocation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('data3')['fourps'] as $data)
                                                <tr>
                                                    <td>{{ $data->province_id }}</td>
                                                    <td>{{ $data->total_male_count }}</td>
                                                    <td>{{ $data->total_female_count }}</td>
                                                    <td>{{ $data->total_physical_count }}</td>
                                                    <td>{{ $data->total_budget_utilized }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Sustainable Livelihood Program</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Province</th>

                                                    <th>Male Count</th>
                                                    <th>Female Count</th>
                                                    <th>Total Physical Count</th>
                                                    <th>Total Fund Allocation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('data3')['slp'] as $data)
                                                <tr>
                                                    <td>{{ $data->province_id }}</td>

                                                    <td>{{ $data->total_male_count }}</td>
                                                    <td>{{ $data->total_female_count }}</td>
                                                    <td>{{ $data->total_physical_count }}</td>
                                                    <td>{{ $data->total_budget_utilized }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Kapit Bisig Laban sa Kahirapan</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Province</th>

                                                    <th>Male Count</th>
                                                    <th>Female Count</th>
                                                    <th>Total Physical Count</th>
                                                    <th>Total Fund Allocation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('data3')['kalahi'] as $data)
                                                <tr>
                                                    <td>{{ $data->province_id }}</td>

                                                    <td>{{ $data->total_male_count }}</td>
                                                    <td>{{ $data->total_female_count }}</td>
                                                    <td>{{ $data->total_physical_count }}</td>
                                                    <td>{{ $data->total_budget_utilized }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Social Pension Program</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Province</th>

                                                    <th>Male Count</th>
                                                    <th>Female Count</th>
                                                    <th>Total Physical Count</th>
                                                    <th>Total Fund Allocation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('data3')['spp'] as $data)
                                                <tr>
                                                    <td>{{ $data->province_id }}</td>

                                                    <td>{{ $data->total_male_count }}</td>
                                                    <td>{{ $data->total_female_count }}</td>
                                                    <td>{{ $data->total_physical_count }}</td>
                                                    <td>{{ $data->total_budget_utilized }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Supplementary Feeding Program</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Province</th>

                                                    <th>Male Count</th>
                                                    <th>Female Count</th>
                                                    <th>Total Physical Count</th>
                                                    <th>Total Fund Allocation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('data3')['sfp'] as $data)
                                                <tr>
                                                    <td>{{ $data->province_id }}</td>

                                                    <td>{{ $data->total_male_count }}</td>
                                                    <td>{{ $data->total_female_count }}</td>
                                                    <td>{{ $data->total_physical_count }}</td>
                                                    <td>{{ $data->total_budget_utilized }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Disaster Risk and Reduction
                                        Management</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Province</th>

                                                    <th>Male Count</th>
                                                    <th>Female Count</th>
                                                    <th>Total Physical Count</th>
                                                    <th>Total Fund Allocation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('data3')['drrm'] as $data)
                                                <tr>
                                                    <td>{{ $data->province_id }}</td>

                                                    <td>{{ $data->total_male_count }}</td>
                                                    <td>{{ $data->total_female_count }}</td>
                                                    <td>{{ $data->total_physical_count }}</td>
                                                    <td>{{ $data->total_budget_utilized }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Centenarrian Program</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Province</th>

                                                    <th>Male Count</th>
                                                    <th>Female Count</th>
                                                    <th>Total Physical Count</th>
                                                    <th>Total Fund Allocation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('data3')['centenarrian'] as $data)
                                                <tr>
                                                    <td>{{ $data->province_id }}</td>

                                                    <td>{{ $data->total_male_count }}</td>
                                                    <td>{{ $data->total_female_count }}</td>
                                                    <td>{{ $data->total_physical_count }}</td>
                                                    <td>{{ $data->total_budget_utilized }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Assistance to Individual in Crisis
                                        Situation</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Province</th>

                                                    <th>Male Count</th>
                                                    <th>Female Count</th>
                                                    <th>Total Physical Count</th>
                                                    <th>Total Fund Allocation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('data3')['aics'] as $data)
                                                <tr>
                                                    <td>{{ $data->province_id }}</td>

                                                    <td>{{ $data->total_male_count }}</td>
                                                    <td>{{ $data->total_female_count }}</td>
                                                    <td>{{ $data->total_physical_count }}</td>
                                                    <td>{{ $data->total_budget_utilized }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
