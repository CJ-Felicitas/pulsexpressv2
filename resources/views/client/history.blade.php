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
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-file-import"></i>
                    <span>Submit Report</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/client/history">
                    <i class="fas fa-fw fa-clock"></i>
                    <span>History</span></a>
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
            <hr class="sidebar-divider d-none d-md-block">
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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    @php
                                        $user_data = session('user_data');
                                    @endphp
                                    @if ($user_data)
                                        {{ $user_data->username }}
                                    @endif
                                </span>
                                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">

                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="modal fade bd-example-modal-lg" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Complete Details</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="table-responsive px-2 mt-3">
                                    <table class="table table-bordered" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Province</th>
                                                <th>Municipality</th>
                                                <th>Male Count</th>
                                                <th>Female Count</th>
                                                <th>Total Budget Utilized</th>
                                                <th>Quarter</th>
                                            </tr>
                                        </thead>
                                        <tbody id="reportDetailsBody">
                                            <!-- Content will be dynamically loaded here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                                        <table class="table table-bordered" id="dataTable" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Program</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Report</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (session('client_history') as $report)
                                                    <tr>
                                                        <td>{{ $report->name }}</td>
                                                        <td>{{ $report->report_date }}</td>
                                                        <td>{{ $report->report_time_12hr }}</td>
                                                        <td><button class="btn btn-primary btn-block view-report" data-report-id="{{ $report->id }}" data-toggle="modal" data-target="#reportModal">
                                                            View Report Submitted
                                                        </button></td>
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
            <script>
                $(document).ready(function() {
                    $('.view-report').click(function() {
                        var reportId = $(this).data('report-id');

                        // Assuming you have a route like '/get-report-details/{reportId}' to fetch report details
                        var url = '/admin/get-report-details/' + reportId;

                        $.get(url, function(data) {
                            // Assuming data is a JSON object containing detailed report information
                            var tbody = $('#reportDetailsBody');
                            tbody.empty(); // Clear previous content

                            // Append new content based on the data received
                            var newRow = '<tr><td>' + data.province_name + '</td><td>' + data.municipality_name + '</td><td>' + data.male_count + '</td><td>' + data.female_count + '</td><td>' + data.total_budget_utilized + '</td><td>' + data.quarter + '</td></tr>';
                            tbody.append(newRow);
                        });
                    });
                });
            </script>

</body>

</html>