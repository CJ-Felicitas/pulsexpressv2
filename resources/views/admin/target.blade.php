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
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Account Settings</span></a>
            </li>
            <li class="nav-item active">
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
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Cover Page Settings</span></a>
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
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Target has been applied !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card shadow mb-4 mt-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">
                                        Set Target <span class="text-secondary">(asterisk <span
                                                class="text-danger">*</span> indicates required field )</span>
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <form action="/admin/applytarget" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="">Physical Count Target <span
                                                                    class="text-danger">*</span> </label>
                                                            <input name="physical_target" type="text"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">Budget Target <span
                                                                    class="text-danger">*</span> </label>
                                                            <input name="budget_target" type="text"
                                                                class="form-control">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">Quarter<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <select name="quarter" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                                <option value="" disabled selected>Select Quarter
                                                                </option>
                                                                <option value="1">1st Quarter</option>
                                                                <option value="2">2nd Quarter</option>
                                                                <option value="3">3rd Quarter</option>
                                                                <option value="4">4th Quarter</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="row my-2">
                                                        <div class="col-md-12">
                                                            <label for="">Program <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <select name="program" class="form-control"
                                                                id="exampleFormControlSelect1">
                                                                <option value="" disabled selected>Select Program
                                                                </option>
                                                                <option value="1">Pantawid Pamilyang Pilipino
                                                                    Program</option>
                                                                <option value="2">Sustainable Livelihood Program
                                                                </option>
                                                                <option value="4">Kapit Bisig Laban sa Kahirapan
                                                                </option>
                                                                <option value="5">Social Pension Program</option>
                                                                <option value="6">Supplementary Feeding Program
                                                                </option>
                                                                <option value="7">Disaster Risk and Reduction
                                                                    Management</option>
                                                                <option value="3">Centenarrian Program</option>
                                                                <option value="8">Assistance to Individuals in
                                                                    Crisis Situation
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 text-right mt-3">
                                                            <button type="submit" class="btn btn-primary">Set
                                                                Target</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
                            <div>
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Pantawid Pamilyang Pilipino
                                            Program</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Quarter</th>
                                                        <th>Physical Target</th>
                                                        <th>Budget Target</th>
                                                        <th>Last Updated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $target_data = session('target_data');
                                                    @endphp
                                                    @if ($target_data)
                                                        @foreach ($target_data['fourps'] as $row)
                                                            <tr>
                                                                <td>{{ $row->quarter_id }}</td>
                                                                <td>{{ $row->physical_target }}</td>
                                                                <td>{{ $row->budget_target }}</td>
                                                                <td>{{ $row->updated_at }}</td>

                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Sustainable Livelihood Program
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Quarter</th>
                                                        <th>Physical Target</th>
                                                        <th>Budget Target</th>
                                                        <th>Last Updated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $target_data = session('target_data');
                                                    @endphp
                                                    @if ($target_data)
                                                        @foreach ($target_data['slp'] as $row)
                                                            <tr>
                                                                <td>{{ $row->quarter_id }}</td>
                                                                <td>{{ $row->physical_target }}</td>
                                                                <td>{{ $row->budget_target }}</td>
                                                                <td>{{ $row->updated_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Kapit Bisig Laban sa Kahirapan
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Quarter</th>
                                                        <th>Physical Target</th>
                                                        <th>Budget Target</th>
                                                        <th>Last Updated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $target_data = session('target_data');
                                                    @endphp
                                                    @if ($target_data)
                                                        @foreach ($target_data['kalahi'] as $row)
                                                            <tr>
                                                                <td>{{ $row->quarter_id }}</td>
                                                                <td>{{ $row->physical_target }}</td>
                                                                <td>{{ $row->budget_target }}</td>
                                                                <td>{{ $row->updated_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Social Pension Program</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Quarter</th>
                                                        <th>Physical Target</th>
                                                        <th>Budget Target</th>
                                                        <th>Last Updated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $target_data = session('target_data');
                                                    @endphp
                                                    @if ($target_data)
                                                        @foreach ($target_data['spp'] as $row)
                                                            <tr>
                                                                <td>{{ $row->quarter_id }}</td>
                                                                <td>{{ $row->physical_target }}</td>
                                                                <td>{{ $row->budget_target }}</td>
                                                                <td>{{ $row->updated_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Supplementary Feeding Program
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Quarter</th>
                                                        <th>Physical Target</th>
                                                        <th>Budget Target</th>
                                                        <th>Last Updated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $target_data = session('target_data');
                                                    @endphp
                                                    @if ($target_data)
                                                        @foreach ($target_data['slp'] as $row)
                                                            <tr>
                                                                <td>{{ $row->quarter_id }}</td>
                                                                <td>{{ $row->physical_target }}</td>
                                                                <td>{{ $row->budget_target }}</td>
                                                                <td>{{ $row->updated_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Disaster Risk Reduction
                                            Management</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Quarter</th>
                                                        <th>Physical Target</th>
                                                        <th>Budget Target</th>
                                                        <th>Last Updated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $target_data = session('target_data');
                                                    @endphp
                                                    @if ($target_data)
                                                        @foreach ($target_data['drrm'] as $row)
                                                            <tr>
                                                                <td>{{ $row->quarter_id }}</td>
                                                                <td>{{ $row->physical_target }}</td>
                                                                <td>{{ $row->budget_target }}</td>
                                                                <td>{{ $row->updated_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Centenarrian Program</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Quarter</th>
                                                        <th>Physical Target</th>
                                                        <th>Budget Target</th>
                                                        <th>Last Updated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $target_data = session('target_data');
                                                    @endphp
                                                    @if ($target_data)
                                                        @foreach ($target_data['centenarrian'] as $row)
                                                            <tr>
                                                                <td>{{ $row->quarter_id }}</td>
                                                                <td>{{ $row->physical_target }}</td>
                                                                <td>{{ $row->budget_target }}</td>
                                                                <td>{{ $row->updated_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Assistance to Individual in
                                            Crisis Situation</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Quarter</th>
                                                        <th>Physical Target</th>
                                                        <th>Budget Target</th>
                                                        <th>Last Updated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $target_data = session('target_data');
                                                    @endphp
                                                    @if ($target_data)
                                                        @foreach ($target_data['aics'] as $row)
                                                            <tr>
                                                                <td>{{ $row->quarter_id }}</td>
                                                                <td>{{ $row->physical_target }}</td>
                                                                <td>{{ $row->budget_target }}</td>
                                                                <td>{{ $row->updated_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Content Wrapper -->
                {{-- end main  --}}

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
